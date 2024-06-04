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
                          <div class="alert alert-success" style="padding:15px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
                           @elseif(session('error'))
                           <div class="alert alert-danger" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
                        @endif
                           
                            <!-- start: page body -->
                              <div class="dasboard-wrapper fl-wrap">
                                     <div class="card-header  border-0">
                                      <h3 class="card-title " style="float: left;font-size:20px;">Properties Report List</h3>
                        
                                           
                        
                                    </div>
                           
                           <div class="dasboard-widget-box fl-wrap">
                                  <div class="dasboard-opt sl-opt fl-wrap">
                                    <div class="dashboard-search-listing">
                                        <input type="text" onkeyup="search()" id="search-item-table" placeholder="Search" value="">

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
                                        <th class="border-bottom-0 w-10">user name</th>
                                        <th class="border-bottom-0">Property Status</th>
                                        <!-- <th class="border-bottom-0">Property For</th> -->
                                        <th class="border-bottom-0">ADDED Agent Name/ User Name/ Admin</th>
                                         <th class="border-bottom-0">Actions</th>
                                        <!--<th class="border-bottom-0">Price</th>
                                        <th class="border-bottom-0">Date</th>
                                        <th class="border-bottom-0">Agent Id</th>
                                       
                                        <th class="border-bottom-0">View Details</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($totalproperties_report as $key => $row)
                                    <tr>
                                     
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('admin.properties_details',$row->property_id)}}">{{DB::table('homeyproperties')->where(['property_id' => $row->property_id])->pluck('name')->first()}}</a></td>
                                        <td>{{DB::table('users')->where(['user_id' => $row->user_id])->pluck('name')->first()}}</td>
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
                                        <!--<td>{{$row->status}}</td>-->
                                         <!-- <td>{{$row->property_type}}</td> -->
                                        <td>
                                            @php
                                            $agent = DB::table('agents')->where(['agent_id' => $row->agent_id])->pluck('name')->first();
                                            if(empty($agent)) {
                                            $user = DB::table('users')->where(['user_id' => $row->agent_id])->pluck('name')->first();
                                            $name = !empty($user) ? $user : 'Admin';
                                            } else {
                                            $name = $agent;
                                            }
                                            @endphp
                                            
                                            {{$name}}
                                            </td>
                                            <td>   <a href="{{route('admin.delete-property-report',$row->id)}}"   class="tablebtn" style="background-color:red;"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                      
                                    </tr>
                                    @endforeach
                                
                                </tbody>
                            
                            </table>
                                    </div>

                                </div>
                                 {!! $totalproperties_report->links() !!}
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