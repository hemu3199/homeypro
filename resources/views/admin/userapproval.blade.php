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
                        <h4 class="card-title" style="Float:left;">Approval Properties List</h4>
                        
                            <!--<a class="btn btn-primary btn-icon" href="http://127.0.0.1:8000/product/pdf"  style="margin-left: 10px; size: 40px;">
                                               <i class="feather feather-download" data-bs-toggle="tooltip"
                                                   data-original-title="#"> Export to PDF</i>
                                           </a>-->
                        <!--<p>Total Intrested Applications: <b></b></p>-->
                        
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
                                        <table class="table table-vcenter text-nowrap table-bordered border-bottom">
                                                    <thead>
                                                       <tr >
                                                            <th class="border-bottom-0">S.NO</th>
                                                            <th class="border-bottom-0">Property Name</th>
                                                            <th class="border-bottom-0">Property ID</th>
                                                            <th class="border-bottom-0">ADDED By Name</th>
                                                             <th class="border-bottom-0">ADDED By ID</th>
                                                            <th class="border-bottom-0">Application Received</th>
                                                            <th class="border-bottom-0  ">View Details</th>
                                                            <th class="border-bottom-0">Approval Status</th>
                                                            <th class="cartm_title">Action</th> 
                                                        </tr>
                                                    </thead>
                                                         <tbody>
                                
                                @foreach($totalproperties as $key => $row)
                                    <tr>
                                     
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('admin.properties_details',$row->property_id)}}">{{$row->name}}</a></td>
                                        <td>
                                           <span Style="padding:8px;" class="badge rounded-pill bg-success mt-2 ml-4"> {{$row->property_id}}
                                           </span></td>
                                            <td>
                                        @php
                                        $agent_details=DB::table('agents')->where('agent_id', '=', $row->agent_id)->pluck('name')->first();
                                        @endphp
                                       @if(!empty($agent_details))
                                      <span Style="padding:8px;" class="badge rounded-pill bg-primary mt-2 ml-4"> {{$agent_details}}
                                      </span>
                                       @else
                                      <span Style="padding:8px;" class="badge rounded-pill bg-primary mt-2 ml-4"> {{DB::table('users')->where('user_id', $row->user_id)->pluck('name')->first()}}
                                      </span>
                                       
                                       @endif
                                       </td>
                                       <td>
                                            @php
                                        $agent_details=DB::table('agents')->where('agent_id', '=', $row->agent_id)->pluck('name')->first();
                                        @endphp
                                       @if(!empty($agent_details))
                                        <span Style="padding:8px;" class="badge rounded-pill bg-primary mt-2 ml-4">{{$row->agent_id}}</span>
                                       @else
                                        <span Style="padding:8px;" class="badge rounded-pill bg-primary mt-2 ml-4">{{ $row->user_id}}
                                        </span>
                                       
                                       @endif
                                       </td>
                                        <td>
                                             <span Style="padding:8px;" class="badge rounded-pill bg-success mt-2 ml-4">{{ \Carbon\Carbon::parse($row->created_at)->format('d-m-Y') }}
                                             </span>
</td>
                                        <!-- <td>edit</td> -->
                                        <td>  <a href="{{ route('admin.properties_details',$row->property_id)}}" class="tablebtn  color-bg" target=”_blank”><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                         <td>
                                            @if($row->approval_status == 0)
                                            <a class="tablebtn color-bg" href="{{route('admin.approve',$row->property_id)}}">Approve</a>
                                            <a class="tablebtn" style="background-color:orange;" href="{{route('admin.reject',$row->property_id)}}">Decline</a>
                                            @elseif($row->approval_status == 1)
                                            <a class="tablebtn" style="background: green;">Approved</a>
                                            @elseif($row->approval_status == 2)
                                            <a class="tablebtn" style="background: red;">Rejected</a>
                                            @endif
                                        </td>
                                        <td>   <a href="{{ route('admin.property-rent-edit',$row->property_id)}}" class="tablebtn color-bg"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                            <a href="{{ route('admin.property-delete',$row->property_id)}}" class="tablebtn" style="background-color:red"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>

                                      
                                    </tr>
                                    @endforeach
                                
                                </tbody>

                                                </table>
                                    </div>
                                    {!! $totalproperties->links() !!}
                                </div>
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