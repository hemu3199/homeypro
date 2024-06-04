@extends("admin.layouts.app")

@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('title', 'Agent Properties')
@section  ("content")
    <div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container1 dasboard-container1">
                        @if(session('message'))   
                          <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
                           @elseif(session('error'))
                           <div class="alert alert-danger" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
                        @endif
                           
                            <!-- start: page body -->
                              <div class="dasboard-wrapper fl-wrap">
                                  <div class="card-header  border-0">
                                      <h4 class="card-title " style="float: left;">Deleted Properties List</h4>
                        
                                             <a class="btn btn-primary btn-icon" href="{{route('admin.deleted-properties-pdf-download')}}"  style="margin-left: 10px; size: 40px;float:right ;">
                                               <i class="feather feather-download" data-bs-toggle="tooltip"
                                                   data-original-title="#" style=""> Export to PDF</i>
                                           </a>
                        
                                    </div>
                           
                           <div class="dasboard-widget-box fl-wrap">
                                  <div class="dasboard-opt sl-opt fl-wrap">
                                    <div class="dashboard-search-listing">
                                        <input type="text" onkeyup="search()" id="search-item-table" placeholder="Search By Property Name" value="">

                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0 w-5">S.No</th>
                                                    <th class="border-bottom-0 w-10">Property Name</th>
                                                    <th class="border-bottom-0 w-10">Property Address</th>
                                                    <th class="border-bottom-0">Property Status</th>
                                                    <!-- <th class="border-bottom-0">Rent/Sale</th> -->
                                                    <th class="border-bottom-0">Price</th>
                                                    <th class="border-bottom-0">Date</th>
                                                    <th class="border-bottom-0">ADDED BY</th>
                                                     <th class="border-bottom-0">ADDED BY ID</th>
                                                    <!-- <th class="border-bottom-0">Actions</th> -->
                                                    <th class="border-bottom-0">View Details</th>
                                                    <th>Featured</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($totalproperties as $key => $row)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td><a href="{{ route('admin.properties_details',$row->property_id)}}">{{$row->name}}</a></td>
                                                        <td>
                                                                 @if(!empty($row->address))
                                                           {{$row->address}} 
                                                            @else
                                                           <span Style="padding:8px;" class="badge rounded-pill bg-dark mt-2 ml-4"> NA </span>
                                                            @endif</td>
                                                         @if($row->status==0)
                                                        <td>
                                                        <a href="{{ route('admin.property_hide',$row->property_id)}}" style="background-color: green;" class="tablebtn"><i class="fa fa-toggle-on"></i></a></td>
                                                        @else
                                                         <td>
                                                        <a href="{{ route('admin.property_show',$row->property_id)}}"  class="tablebtn"style="background-color:orange;"><i class="fa fa-toggle-off"></i></a></td>
                                                        @endif
                                                        <!-- <td>{{$row->property_type}}</td> -->
                                                        <td>
                                                            @if(!empty($row->price))
                                                           <span Style="padding:8px;" class="badge rounded-pill bg-success mt-2 ml-4"> {{$row->price}} </span>
                                                            @else
                                                           <span Style="padding:8px;" class="badge rounded-pill bg-dark mt-2 ml-4"> NA </span>
                                                            @endif
                                        
                                                        </td>
                                                       <td>
                                                           {{ $row->created_at->format('Y-m-d') }}</td>

                                                      
                                                        <td>
                                                            @if(!empty($row->user_id))
                                                            <span Style="padding:8px;" class="badge rounded-pill bg-primary mt-2 ml-4">User</span>
                                                            @else
                                                           <span Style="padding:8px;" class="badge rounded-pill bg-primary mt-2 ml-4">Agent</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if(!empty($row->user_id))
                                                            <span Style="padding:8px;" class="badge rounded-pill bg-success mt-2 ml-4">{{$row->user_id}}
                                                            </span>
                                                            @else
                                                          <span Style="padding:8px;" class="badge rounded-pill bg-success mt-2 ml-4">  {{$row->agent_id}} </span>
                                                            @endif
                                                        </td>
                                                        
                                                        <!-- <td>edit</td> -->
                                                        <td><a href="{{ route('admin.properties_details',$row->property_id)}}" class="tablebtn  color-bg">
                                                            <i class="fa fa-eye"></i>
                                                        </a></td>
                                                         @if($row->featured==0)
                                                        <td>
                                                        <a href="{{ route('admin.featured',$row->property_id)}}"  class="tablebtn color-bg"><i class="fa fa-star" aria-hidden="true"></i></a></td>
                                                        @else
                                                         <td>
                                                        <a href="{{ route('admin.removefeatured',$row->property_id)}}"  class="tablebtn" style="background-color: green;"><i class="fa fa-star-o" style="color:white;" aria-hidden="true"></i></a></td>
                                                        @endif
                                                        <td>
                                                            <!-- <a href="{{ route('admin.property-rent-edit',$row->property_id)}}"  class="btn btn-icon btn-sm color-bg"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> -->
                                                            <a href="{{ route('admin.property-delete',$row->property_id)}}" class="tablebtn" style="background-color:red;"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                 {!! $totalproperties->links() !!}
                            </div>
                         </div>
                     </div>
                    <!-- dashboard-footer -->
                    <div class="dashboard-footer">
                        <div class="dashboard-footer-links fl-wrap">
                       
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