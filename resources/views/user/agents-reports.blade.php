@extends("user.layouts.homedashboard")

@section  ("content")       
          
                <div class="dashboard-content">
                     @if(session('message'))   
                        <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
                        @elseif(session('error'))
                           <div class="alert alert-success" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul >
                            @foreach ($errors->all() as $error)
                                <li style="color: red;font-size:15px">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->    
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item"><span>Your Agent Reports</span></span></div>
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
                       <!--      <div class="tfp-det-container">
                                <div   class="tfp-btn"><span>Your Tariff Plan : </span> <strong>Extended</strong></div>
                                <div class="tfp-det">
                                    <p>You Are on <a href="#">Extended</a> . Use link bellow to view details or upgrade. </p>
                                    <a href="#" class="tfp-det-btn color-bg">Details</a>
                                </div>
                            </div> -->
                            <!--Tariff Plan menu end-->                     
                        </div>
                        <!-- dashboard-title end -->        
                        <div class="dasboard-wrapper fl-wrap">
                            <div class="dasboard-listing-box fl-wrap">
                                <div class="dasboard-opt sl-opt fl-wrap">
                                    <!-- <div class="dashboard-search-listing">
                                        <input type="text" onclick="this.select()" placeholder="Search" value="">
                                        <button type="submit"><i class="far fa-search"></i></button>
                                    </div> -->
                                    <!-- <a href="dashboard-add-listing.html" class="gradient-bg dashboard-addnew_btn">Add New <i class="fal fa-plus"></i></a>   -->
                                    <!-- price-opt-->
                                    <div class="price-opt">
                                        <!-- <span class="price-opt-title">Sort   by:</span> -->
                                        <div class="listsearch-input-item">
                                       <!--      <select data-placeholder="Lastes" class="chosen-select no-search-select" >
                                                <option>Lastes</option>
                                                <option>Oldes</option>
                                                <option>Average rating</option>
                                                <option>Name: A-Z</option>
                                                <option>Name: Z-A</option>
                                            </select> -->
                                        </div>
                                    </div>
                                    <!-- price-opt end-->
                                </div>
                                <!-- dashboard-listings-wrap-->
                                <div class="dasboard-wrapper fl-wrap">
                                    <div class="dasboard-widget-box fl-wrap">
                                        <!-- <div class="dasboard-opt sl-opt fl-wrap">
                                            <div class="dashboard-search-listing">
                                                <input type="text" onkeyup="search()" id="search-item-table" placeholder="Search" value="">
                                                <button type="submit"><i class="far fa-search"></i></button>
                                            </div>
                                        </div> -->

                                        <div class="row">
                                            <div class="table-responsive">
                                                <table class="table table-vcenter text-nowrap table-bordered border-bottom">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-bottom-0">S.NO</th>
                                                            <th class="border-bottom-0">Property Id</th>
                                                            <th class="border-bottom-0">Property Name</th>
                                                            <th>Agent Name</th>
                                                            <th class="border-bottom-0">User Name</th>
                                                            <th class="border-bottom-0">User Email</th>
                                                            <th class="border-bottom-0">Message</th>
                                                            
                                                           
                                                            <th class="border-bottom-0">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($reports as $key => $row)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td><span class="tablebtn" style="background-color:green; border-radius:20px; width:10px;">{{ $row->property_id }}</span></td>
                                                            <td>{{(\App\Models\Homeyproperties::where(['property_id' => $row['property_id']])->pluck('name')->first())}}</td>
                                                            @php
                                                            $agent_name=DB::table('agent_basic_information')->where('agent_id','=',$row->member_id)->pluck('fname')->first();
                                                            @endphp
                                                            <td>@if(!empty($agent_name))
                                                                {{

                                                                    $agent_name
                                                                }}
                                                            @else
                                                            To HOMEY
                                                            @endif
                                                        </td>

                                                            <td>{{ $row->name }}</td>
                                                            <td>{{ $row->email }}</td>
                                                            <td>{{ $row->report_message }}</td>
                                                           
                                                          
                                                            <td>
                                                                <!-- <a class="tablebtn color-bg" href="{{ route('users-view-application',$row->property_id) }}" aria-pressed="true"><i class='fa fa-eye'></i></a> -->
                                                                <a class="tablebtn color-bg" href="{{route('edit-agent-report',$row->id)}}" role="button" aria-pressed="true"><i class='fa fa-edit'></i></a>
                                                                <a class="tablebtn color-bg" style="background-color: red" href="{{route('delete-agent-report',$row->id)}}" role="button" aria-pressed="true"><i class='fas fa-trash-alt'></i></a>
                                                            </td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td colspan="10" class="text-center">" No Data Found "</td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- pagination-->
                            <div class="pagination float-pagination">
                                <!-- <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                <a href="#" >1</a>
                                <a href="#" class="current-page">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a> -->
                            </div>
                            <!-- pagination end-->  
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
@endsection
                