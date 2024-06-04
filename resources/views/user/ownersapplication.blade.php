@extends("user.layouts.ownerdashboard")

@section  ("content") 
    
          
                <div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->    
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item"><span>Application Responses  </span></div>
                               <div class="dashbard-menu-header">
                                <div class="dashbard-menu-avatar fl-wrap">
                                      @php
                                $profilepic=DB::table('user_basic_info')->where(['user_id' => auth()->user()->user_id])->pluck('profile_pic')->first();
                                @endphp
                                @if(!empty(  $profilepic))
                                                           
                                    <img src="{{url('/uploads/user-profile/'.$profilepic)}}" alt="">
                                    @else
                                    <img src="{{asset('homey/images/dummy-profile-pic.png')}}" alt="">
                                    @endif
                                    <h4>Welcome, <span> {{ Auth::user()->name }}</span></h4>
                                </div>
                                <a href="{{('logout')}}" class="log-out-btn   tolt" data-microtip-position="bottom"  data-tooltip="Log Out"><i class="far fa-power-off"></i></a>
                            </div>
                            <!--Tariff Plan menu-->

                           
                            <!--Tariff Plan menu end-->                     
                        </div>
                        <!-- dashboard-title end -->
                        <div class="dasboard-wrapper fl-wrap">
                           
                           <div class="dasboard-widget-box fl-wrap">
                                  <div class="dasboard-opt sl-opt fl-wrap">
                                    <div class="dashboard-search-listing">
                                        <input type="text" onkeyup="search()" id="search-item-table" placeholder="Search" value="">

                                        <button type="submit"><i class="far fa-search"></i></button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter text-nowrap table-bordered border-bottom">
                                                    <thead>
                                                       <tr >
                                                            <th class="border-bottom-0">S.NO</th>
                                                            <th class="border-bottom-0">Property Name</th>
                                                            <th class="border-bottom-0">User Name</th>
                                                            <th class="border-bottom-0">Application Status</th>
                                                            <th class="border-bottom-0">Application Received</th>
                                                            <th class="border-bottom-0  ">Application Pending</th>
                                                             <th>
                                                                Property Status
                                                            </th>
                                                            <!-- <th class="cartm_title">Action</th> -->
                                                        </tr>
                                                    </thead>
                                                        <tbody>
                                                        @forelse($application as $key => $row)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td><a href="#">{{DB::table('homeyproperties')->where(['property_id' => $row->property_id])->pluck('name')->first()}}</a></td>
                                                            <td>{{DB::table('users')->where(['user_id' => $row->user_id])->pluck('name')->first()}}</td> 
                                                            <td>@php
                                        $applications=DB::table('application')->where(['user_id' => $row->user_id])->where(['property_id' => $row->property_id])->first();
                                        @endphp
                                        @if(!empty($applications))
                                        @if($applications->approval_status == 1)
                                        <a class="tablebtn" style="background-color:green">Approved</a>
                                        @elseif($applications->approval_status == 2)
                                        <a class="btn btn-danger btn-icon">Rejected</a>
                                        @else
                                        <a href="#" class="tablebtn" style="color:#fff; background:black; border: 2px solid black;">Pending</a>
                                        @endif
                                        @else
                                        @endif</td>
                                                            <td>{{DB::table('application')->where(['user_id' => $row->user_id])->where(['property_id' => $row->property_id])->pluck('created_at')->first()}}</td>
                                                            <td>
                                                                @if(!empty($applications))
                                        @if($applications->application_status == 1)
                                        <a class="tablebtn color-bg" >Application Submitted</a>
                                        
                                        @else
                                        <a href="#" class="tablebtn" style="color:#fff; background:black; border: 2px solid black;">Pending At User</a>
                                        @endif
                                        @else
                                        @endif
                                                                
                                                            </td>
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
                                                           
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td colspan="6" class="text-center">" No Data Found "</td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>

                                                </table>
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
                                <li><a href="{{ route('users-about') }}">About </a></li>
                                <li><a href="{{ route('referal') }}">Pricing Plans</a></li>
                                <li><a href="{{ route('users-contact') }}">Contacts</a></li>
                                <li><a href="{{ route('helpfaq') }}">Help Center</a></li>
                            </ul>
                        </div>
                        <a href="#main" class="dashbord-totop custom-scroll-link"><i class="fas fa-caret-up"></i></a>
                    </div>      
                       

                    <!-- dashboard-footer end -->
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
                