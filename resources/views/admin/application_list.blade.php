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
                                      <h4 class="card-title " style="float: left;">Appliaction List</h4>
                        
                                            <!--  <a class="btn btn-primary btn-icon" href=""  style="margin-left: 10px; size: 40px;float:right ;">
                                               <i class="feather feather-download" data-bs-toggle="tooltip"
                                                   data-original-title="#" style=""> Export to PDF</i>
                                           </a> -->
                        
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
                                                        <th class="border-bottom-0 text-center">S.NO</th>
                                                        <th class="border-bottom-0 text-center">Property Id</th>
                                                        <th class="border-bottom-0 text-center">Property Name</th>
                                                        <th class="border-bottom-0 text-center">User Id</th>
                                                        <th class="border-bottom-0 text-center">User Name</th>
                                                        <th class="border-bottom-0 text-center">Application Status</th>
                                                        <th class="border-bottom-0 text-center">Approved By</th>
                                                        <th class="border-bottom-0 text-center">Application Received</th>
                                                        <!-- <th class="border-bottom-0 text-center">View Applications</th> -->
                                                        <th class="border-bottom-0 text-center">Remakes</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                  @forelse($total_application_received as $key => $row)
                                                    <tr>
                                                        <td class="text-center">{{$loop->iteration}}</td>
                                                        <td class="text-center"><span class="badge rounded-pill bg-success">{{DB::table('homeyproperties')->where(['property_id' => $row->property_id])->pluck('property_id')->first();}}</span></td>
                                                        <td class="text-center">{{DB::table('homeyproperties')->where(['property_id' => $row->property_id])->pluck('name')->first();}}</td>
                                                        <td class="text-center"><span class="badge rounded-pill bg-success">{{DB::table('users')->where(['user_id' => $row->user_id])->pluck('user_id')->first();}}</span></td>
                                                        <td class="text-center">{{DB::table('users')->where(['user_id' => $row->user_id])->pluck('name')->first();}}</td>
                                                        <td class="text-center">
                                                            @if($row->approval_status == 0)
                                                            <span class="badge rounded-pill bg-warning">Pending</span>
                                                            @elseif($row->approval_status == 1)
                                                            <span class="badge rounded-pill bg-primary">Approved</span>
                                                            @elseif($row->approval_status == 2)
                                                            <span class="badge rounded-pill bg-danger">Rejected</span>
                                                            @endif 
                                                        </td>
                                                        <td>
                                                            <td class="text-center"><span class="badge rounded-pill bg-primary">{{$row->transfered_to   }}</span></td>
                                                        <td class="text-center">{{ \Carbon\Carbon::parse($row->updated_at)->format('d')}}-{{ \Carbon\Carbon::parse($row->updated_at)->format('m') }}-{{ \Carbon\Carbon::parse($row->updated_at)->format('Y') }}</td>

                                                       
                                                        @if($row->remarks == NULL)
                                                        <td class="text-center"><span class="badge rounded-pill bg-dark">NA</span></td>
                                                        @else
                                                        <td class="text-center">{{$row->remarks}}</td>
                                                        @endif
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="8" class="text-center">" No Data Found "</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                 </div>
                                 {!! $total_application_received->links() !!}
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
        td = tr[i].getElementsByTagName("td")[2]; // Change index to match the column you want to search (0-indexed)
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