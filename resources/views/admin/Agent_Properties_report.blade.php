@extends("admin.layouts.app")
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
                        <h4 class="card-title">Agent Properties Report List</h4>
                        
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
                                        <th class="border-bottom-0">Application Status</th>
                                        <th class="border-bottom-0">Application Sent Date</th>
                                        <th class="border-bottom-0">View Application</th>
                                        <th>Actions</th>
                                        <th>Remarks</th>
                                         <th>Transferd To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($totalproperties_report as $key => $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('admin.properties_details',$row->property_id)}}">{{DB::table('homeyproperties')->where(['property_id' => $row->property_id])->pluck('name')->first();}}</a></td>
                                        <td>{{DB::table('users')->where(['user_id' => $row->user_id])->pluck('name')->first();}}</td>
                                        @php
                                        $applied = DB::table('application')->where('user_id', '=', $row->user_id)->where('property_id', '=', $row->property_id)->first();
                                        @endphp
                                        <td>
                                        @if (!empty($applied))
                                        @if ($applied->application_status == 1)
                                        <a class="tablebtn " style="background:green">Application Submitted</a>
                                        @elseif ($applied->application_status == 2)
                                        <a href="#" class="tablebtn" style="color:#fff; background:black; border: 2px solid black;">Rejected</a>
                                        @else
                                        <a href="#" class="tablebtn btn-warning   ">Pending</a>
                                        @endif
                                        @else
                                        <a href="{{ route('admin.application', ['id' => $row->user_id, 'property_id' => $row->property_id]) }}"
                                       class="tablebtn color-bg" role="button" aria-pressed="true">Send Application</a>
                                        @endif
                                        </td>
                                        <td><span class="badge rounded-pill bg-success mt-2 ml-4">{{ Carbon::parse(DB::table('application')->where(['user_id' => $row->user_id])->where(['property_id' => $row->property_id])->pluck('created_at')->first())->format('d-m-y') }}</span></td>
                                        <!-- <td>{{DB::table('application')->where(['user_id' => $row->user_id])->where(['property_id' => $row->property_id])->pluck('remarks')->first()}}</td> -->
                                        <td>
                                        <a href="{{ route('admin.viewapplication', ['id' => $row->user_id, 'property_id' => $row->property_id]) }}"
                                       class="tablebtn color-bg" role="button" aria-pressed="true"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </td>
                                        <td>
                                        @php
                                        $applications = DB::table('application')
                                        ->where(['user_id' => $row->user_id, 'property_id' => $row->property_id])
                                        ->first();
                                        @endphp
                                        @if(!empty($applications))
                                        @if($applications->application_status == 1)
                                                @if($applications->approval_status == 0)
                                                <a class="tablebtn color-bg"  href="{{ route('admin.application-approve', ['id' => $row->user_id, 'property_id' => $row->property_id]) }}">Approve</a>
                                                <a class="tablebtn color-bg"  href="{{ route('admin.application-reject', ['id' => $row->user_id, 'property_id' => $row->property_id]) }}">Reject</a>
                                                @elseif($applications->approval_status == 1)
                                                <a class="tablebtn btn-success ">Approved</a>
                                                @elseif($applications->approval_status == 2)
                                                <a class="tablebtn btn-danger">Rejected</a>
                                                @endif
                                        @else
                                        <a href="#" class="tablebtn btn-warning   ">Pending</a>
                                        @endif
                                        @else
                                        <a href="#" class="tablebtn "style="background-color:black;">Application Not Sent</a>
                                        
                                        @endif
                                       </td>
                                        <td>
                                        @if(!empty($applications))
                                        <form method="post" id="form" action="{{route('admin.remark', ['id'=>$row->user_id,'property_id' => $row->property_id ])}}">
                                        @csrf
                                        <div class="frmremark">
                                        <textarea type="text" name="remarks">{{DB::table('application')->where(['property_id' => $row->property_id])->where(['user_id' => $row->user_id])->pluck('remarks')->first();}}</textarea>
                                        <button type="submit" class="tablebtn color-bg" name="submit" style="float: left;">Submit</button>
                                        </form>
                                        @else
                                        @endif
                                        </td>
                                        <td>
                                        @if(!empty($applications->transfered_to))
                                          <a class="tablebtn color-bg"> {{$applications->transfered_to}} </a?
                                        @else
                                        <a class="tablebtn" style="background-color:black;"> Not Yet Transferd
                                        </a>
                                        
                                        @endif
                                        </td>
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
                            <span>Helpfull Links:</span>
                            <ul>
                                <li><a href="about.html">About  </a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="pricing.html">Pricing Plans</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="help.html">Help Center</a></li>
                            </ul>
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