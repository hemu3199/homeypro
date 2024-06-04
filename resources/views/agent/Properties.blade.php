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
                    <div class="card-header  border-0">
                        <h4 class="card-title">Properties List</h4>
                        
                            <a class="btn btn-primary btn-icon" href="{{route('agent.agent-properties-pdf')}}"  style="margin-left: 10px; size: 40px;">
                                               <i class="feather feather-download" data-bs-toggle="tooltip"
                                                   data-original-title="#"> Export to PDF</i>
                                           </a>
                        
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
                                        <th class="border-bottom-0 w-10">Property Address</th>
                                        <th class="border-bottom-0">Property Status</th>
                                        <th class="border-bottom-0">Property Type</th>
                                        <th class="border-bottom-0">Price</th>
                                        <th class="border-bottom-0">Date</th>
                                        <!-- <th class="border-bottom-0">Agent Id</th>
                                        <th class="border-bottom-0">Actions</th>
                                        <th class="border-bottom-0">View Details</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($totalproperties as $key => $row)
                                    <tr>
                                     
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('agent.allproperties_details',$row->property_id)}}">{{$row->name}}</a></td>
                                        <td>{{$row->address}}</td>
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
                                        <td><span class="badge rounded-pill bg-primary mt-2 ml-4" style="padding:8px;">{{$row->categories}}</span></td>
                                        <td>
                                            @if(!empty($row->price))<span class="badge rounded-pill bg-primary mt-2 ml-4" style="padding:8px;">{{$row->price}}
                                        </span>
                                        @else
                                        <span class="badge rounded-pill bg-dark mt-2 ml-4" style="padding:8px;">NA</span>
                                        
                                        @endif</td>
                                        <td>{{ date('Y-m-d', strtotime($row->created_at)) }}</td>
                                        <!-- <td>{{DB::table('agents')->where(['id' => $row->agent_id])->pluck('name')->first();}}</td>
                                        
                                        <td>edit</td>
                                        <td><a href="{{ route('agent.properties_details',$row->id)}}">View Details</a></td> -->
                                      
                                    </tr>
                                    @endforeach
                                
                                </tbody>
                            
                            </table>
                            <nav aria-label="Page navigation">{!! $totalproperties->links('pagination::bootstrap-4') !!}</nav>
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