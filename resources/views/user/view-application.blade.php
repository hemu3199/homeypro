@extends("user.layouts.homedashboard")

@section  ("content")    	
          
                <!-- dashbard-menu-wrap end  -->		
                <!-- content -->	
                <div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->	
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item"><span>View Application</span></div>
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
                            <div class="tfp-det-container">
                                <!-- <div   class="tfp-btn"><span>Your Tariff Plan : </span> <strong>Extended</strong></div>
                                <div class="tfp-det">
                                    <p>You Are on <a href="#">Extended</a> . Use link bellow to view details or upgrade. </p>
                                    <a href="#" class="tfp-det-btn color-bg">Details</a>
                                </div> -->
                            </div>
                            <!--Tariff Plan menu end-->						
                        </div>
                           <form method="post" action="" id="form">
                                                @csrf
                       <div class="dasboard-widget-title fl-wrap">
                                        <h5><i class="fas fa-key"></i>Personal Info</h5>
                                    </div>
                                    <div class="dasboard-widget-box fl-wrap">
                                        <div class="custom-form">
                                            <label>User Name <span class="dec-icon"><i class="far fa-user"></i></span></label>
                                            <input disabled type="text" name="user_name" placeholder="{{DB::table('user_basic_info')->where(['user_id' => $application_details->user_id])->pluck('first_name')->first();}} {{DB::table('user_basic_info')->where(['user_id' => $application_details->user_id])->pluck('last_name')->first();}}" />
                                            <label>User Email Id <span class="dec-icon"><i class="fas fa-envelope"></i></span></label>
                                            <input disabled type="text" name="email" placeholder="{{DB::table('users')->where(['user_id' => $application_details->user_id])->pluck('email')->first();}}" />
                                            <label>User Phone Number <span class="dec-icon"><i class="far fa-phone"></i></span></label>
                                            <input disabled type="text" name="phone_no"  placeholder="{{DB::table('user_basic_info')->where(['user_id' => $application_details->user_id])->pluck('phone_no')->first();}}" />   
                                            <label>Gender<span class="dec-icon"><i class="far  fa-user "></i> </span></label>
                                            <input disabled type="text" name="gender" placeholder="{{DB::table('user_basic_info')->where(['user_id' => $application_details->user_id])->pluck('gender')->first();}}" />   
                                            <label>Adress <span class="dec-icon"><i class="fas fa-map-marker"></i> </span></label>
                                            <input disabled type="text"  name="address"  placeholder="{{DB::table('user_basic_info')->where(['user_id' => $application_details->user_id])->pluck('address')->first();}}" /> 
                                                                 
                                   
                                        </div>
                                    </div>  
                                     <div class="dasboard-widget-title fl-wrap">
                                        <h5><i class="fas fa-key"></i>Verification details</h5>
                                    </div>
                                    <div class="dasboard-widget-box fl-wrap">
                                        <div class="custom-form">
                                            <label>Aadhar Number<span class="dec-icon"><i class="far fa-user"></i></span></label>
                                            <input disabled type="text" name="aadhar_card"  value="{{$application_details->aadhar_card }}" placeholder="Enter Aadhar Number " />
                                            <label>Pan Number <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                            <input disabled type="text" name="pan_no"  value="{{$application_details->pan_no }}" placeholder="Enter Pan Number" />
                                            <label>Intrested Property Name <span class="dec-icon"><i class="far fa-envelope"></i></span></label>
                                            <input disabled type="text" name="property_name"  value="{{DB::table('homeyproperties')->where(['property_id' => $application_details->property_id])->pluck('name')->first();}}" disabled />   
                                            <label>Employeement Status<span class="dec-icon"><i class="far fa-phone"></i> </span></label>
                                            <input disabled type="text" name="employee_status" value="{{$application_details->employee_status }}" placeholder="Enter Employeement Status" />   
                                            <label>Present Address :<span class="dec-icon"><i class="fas fa-map-marker"></i> </span></label>
                                            <input disabled type="text" name="present_address" value="{{$application_details->present_address }}" placeholder="Enter Present Address" />                                     
                                            <!-- <button class="btn color-bg  float-btn" >Save Changes</button> -->
                                        </div>
                                    </div>
                                </form>
                    </div>
                                    
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