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
  <div class="row">
            <div class="col-xl-12 col-md-12 col-lg-12">
                <div class="card">
                    @if(session('message'))   
  <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
   @elseif(session('error'))
   <div class="alert alert-success" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
@endif
                    <div class="card-header  border-0">
                        <h4 class="card-title">Properties List</h4>
                        
                            <a class="btn btn-primary btn-icon" href="http://127.0.0.1:8000/product/pdf"  style="margin-left: 10px; size: 40px;">
                                               <i class="feather feather-download" data-bs-toggle="tooltip"
                                                   data-original-title="#"> Export to PDF</i>
                                           </a>
                        
                    </div>
                    <div class="card-body">
                         <div class="dashboard-search-listing">
                                        <input type="text" onkeyup="search()" id="search-item-table" placeholder="Search BG agent name" value="">

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
                                        <th class="border-bottom-0">Approval</th>
                                        <th class="border-bottom-0">Price</th>
                                        <th class="border-bottom-0">Date</th>
                                        <th class="border-bottom-0">Added By</th>
                                         <th class="border-bottom-0">View Details</th>
                                         <th class="border-bottom-0">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($totalproperties as $key => $row)
                                    <tr>
                                     
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('admin.properties_details',$row->property_id)}}">{{$row->name}}</a></td>
                                        <td>{{$row->address}}</td>
                                        <td>{{$row->property_status}}</td>
                                        <td>
                                            @if($row->approval_status == 0)
                                            <a class="btn btn-primary btn-icon" href="{{route('admin.approve',$row->property_id)}}">Approve</a>
                                            <a class="btn btn-primary btn-icon" href="{{route('admin.reject',$row->property_id)}}">Decline</a>
                                            @elseif($row->approval_status == 1)
                                            <a class="btn btn-secondary btn-icon" style="background: green;">Approved</a>
                                            @elseif($row->approval_status == 2)
                                            <a class="btn btn-secondary btn-icon" style="background: red;">Rejected</a>

                                            @endif
                                        </td>
                                        <td>{{$row->price}}</td>
                                        <td>{{$row->created_at}}</td>
                                        <td> 
                                       {{DB::table('agents')->where('agent_id', '=', $row->agent_id)->pluck('name')->first()}}
                                       
                                        {{DB::table('users')->where(['user_id' => $row->user_id])->pluck('name')->first()}}
                                        </td>

                                        
                                        <!-- <td>edit</td> -->
                                        <td><a href="{{ route('admin.properties_details',$row->property_id)}}">View Details</a></td>
                                           <a href="{{ route('admin.property-rent-edit',$row->property_id)}}"  class="btn btn-icon btn-sm color-bg"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                            <a href="{{ route('admin.property-delete',$row->property_id)}}"  class="btn btn-icon btn-sm color-bg"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                      
                                    </tr>
                                    @endforeach
                                
                                </tbody>
                            
                            </table>
                            <nav aria-label="Page navigation"> 
                  
                             {!! $totalproperties->links('pagination::bootstrap-4') !!}
                         </nav>
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