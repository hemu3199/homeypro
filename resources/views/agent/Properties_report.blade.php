@extends("agent.layouts.app")
@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('title', 'Employee List')
@section  ("content")
<div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container1 dasboard-container1">

 <div class="row">
            <div class="col-xl-12 col-md-12 col-lg-12">
                <div class="card">
                    @if(session('message'))   
  <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
   @elseif(session('error'))
   <div class="alert alert-success" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
@endif
                    <div class="card-header  border-0">
                        <h4 class="card-title">Properties Report List</h4>
                        
                            <!--<a class="btn btn-primary btn-icon" href="http://127.0.0.1:8000/product/pdf"  style="margin-left: 10px; size: 40px;">
                                               <i class="feather feather-download" data-bs-toggle="tooltip"
                                                   data-original-title="#"> Export to PDF</i>
                                           </a>-->
                        <p>Total Intrested Properties: <b>{{$totalproperties_intrestedreport}}</b></p>
                        
                    </div>
                    <div class="card-body">
                        <div class="dashboard-search-listing">
                                        <input type="text" onkeyup="search()" id="search-item-table" placeholder="Search" value="">

                                        <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                        <div class="table-responsive">
                            <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0 w-5">S.No</th>
                                        <th class="border-bottom-0 w-10">Property Name</th>
                                        <th class="border-bottom-0 w-10">user name</th>
                                        <th class="border-bottom-0">Property Status</th>
                                        <!--<th class="border-bottom-0"></th>-->
                                        <!--<th class="border-bottom-0">Action</th>-->
                                        <th class="border-bottom-0">Application Status</th>
                                        <th class="border-bottom-0">Application Sent Date</th>
                                        <th class="border-bottom-0">Remarks</th>
                                          <th class="border-bottom-0">View Application</th>
                                        <!--<th class="border-bottom-0">Price</th>
                                        <th class="border-bottom-0">Date</th>
                                        <th class="border-bottom-0">Agent Id</th>
                                        <th class="border-bottom-0">Actions</th>
                                        <th class="border-bottom-0">View Details</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($totalproperties_report as $key => $row)
                                    <tr>
                                     
                                         <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('agent.properties_details',$row->property_id)}}">{{DB::table('homeyproperties')->where(['property_id' => $row->property_id])->pluck('name')->first();}}</a></td>
                                        <td>{{DB::table('users')->where(['user_id' => $row->user_id])->pluck('name')->first();}}</td>
                                        @php
                                        $status=DB::table('homeyproperties')->where(['property_id' => $row->property_id])->first();
                                        @endphp
                                        @if($status->status == 0)
                                        
                                        <td><a class="tablebtn" style="background-color:green">Active</a></td>
                                        @else
                                        @if($status->status == 1 && $status->property_deleted == 0)
                                        
                                        <td><a class="tablebtn" style="background-color:orange">Inactive</a></td>
                                        @else
                                        
                                        <td><a class="tablebtn" style="background-color:red">Deleted</a></td>
                                        @endif
                                        @endif
                                         <!--<td>{{$row->property_type}}</td>-->
                                           @php
                                        $applied = DB::table('application')->where('user_id', '=', $row->user_id)->where('property_id', '=', $row->property_id)->where('agent_id',Auth::guard('agent')->user()->agent_id)->first();
                                        @endphp
                                        <td>
                                        @if (!empty($applied))
                                        @if ($applied->application_status == 1)
                                        <a class="tablebtn color-bg" style="color:#fff; background:black; border: 2px solid black;">Application Submitted</a>
                                        @elseif ($applied->application_status == 2)
                                        <a href="#" class="tablebtn" style="color:#fff; background:black; border: 2px solid black;">Rejected</a>
                                        @else
                                        <a href="#" class="tablebtn " style="color:#fff; background:orange;">Pending</a>
                                        @endif
                                        @else
                                        <a href="{{ route('agent.application', ['id' => $row->user_id, 'property_id' => $row->property_id]) }}"
                                        class="tablebtn color-bg" role="button" aria-pressed="true">Send Application</a>
                                        @endif
                                        </td>
                                    <!--   <td>-->
                                    <!--         <a href=""-->
                                    <!--          class="btn btn-primary" role="button" aria-pressed="true">Send Application</a>-->
                                    <!--</td>-->
                                    <!--@php-->
                                    <!--$applied=  DB::table('application')->where('user_id','=',$row->user_id)->where('property_id','=',$row->property_id)->pluck('application_status')->first();-->
                                    <!--@endphp-->
                                    
                            <!--@if ($applied == '1')-->
                            <!--<td><a class="btn btn-base" style="color:#fff; background:black; border: 2px solid black;">Application Submited</a></td>-->
                            <!--@else-->
                            <!--<td><a href="#"-->
                            <!--class="btn btn-base"-->
                            <!--style="color:#fff; background:black; border: 2px solid black;">-->
                            <!--Null-->
                            <!--</a></td>-->
                            <!--@endif-->

                                         <td>{{ \Carbon\Carbon::parse(DB::table('application')->where(['user_id' => $row->user_id])->where(['property_id' => $row->property_id])->pluck('created_at')->first())->format('d-m-Y') }}
                                        </td>
                                                                                 <td>@if(!empty($applied->remarks))
                                                                                 {{$applied->remarks}}
                                                                                 @else
                                                                                 @endif
                                                                                     </td>
                                                                                 <td>
                                            <a href="{{ route('agent.viewapplication', ['id' => $row->user_id, 'property_id' => $row->property_id]) }}"
                                               class="tablebtn color-bg" role="button" aria-pressed="true"><i class="fa fa-eye"></i></a>
                                        </td>

                                        <!--<td>{{DB::table('agents')->where(['id' => $row->agent_id])->pluck('name')->first();}}</td>-->
                                       <!-- <td>{{$row->price}}</td>
                                        <td>{{$row->created_at}}</td>
                                        <td>{{DB::table('agents')->where(['id' => $row->agent_id])->pluck('name')->first();}}</td>
                                        
                                        <td>edit</td>
                                        <td><a href="{{ route('admin.properties_details')}}">View Details</a></td>-->
                                      
                                    </tr>
                                    @endforeach
                                
                                </tbody>
                            
                            </table>
                            <nav aria-label="Page navigation"></nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         </div>
                    <!-- dashboard-footer -->
                    <div class="dashboard-footer">
                        <div class="dashboard-footer-links fl-wrap">
                            <!--<span>Helpfull Links:</span>-->
                            <!--<ul>-->
                            <!--    <li><a href="about.html">About  </a></li>-->
                            <!--    <li><a href="blog.html">Blog</a></li>-->
                            <!--    <li><a href="pricing.html">Pricing Plans</a></li>-->
                            <!--    <li><a href="contacts.html">Contacts</a></li>-->
                            <!--    <li><a href="help.html">Help Center</a></li>-->
                            <!--</ul>-->
                        </div>
                        <a href="#main" class="dashbord-totop  custom-scroll-link"><i class="fas fa-caret-up"></i></a>
                    </div>
                    <!-- dashboard-footer end -->               
    </div>
     <script type="text/javascript">
                        function search() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search-item-table");
    filter = input.value.toUpperCase();
    table = document.getElementsByClassName("table")[0]; // Assuming there's only one table
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Change index to match the column you want to search (0-indexed)
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
                    </script>
        @endsection