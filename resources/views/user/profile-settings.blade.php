@extends("user.layouts.homedashboard")

@section  ("content")       
          
                <!-- dashbard-menu-wrap end  -->        
                <!-- content -->    
                <div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container dasboard-container">
                             @if ($errors->any())
                                                                    <div class="alert alert-danger">
                                                                        <ul >
                                                                            @foreach ($errors->all() as $error)
                                                                                <li style="color:red">{{ $error }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endif
                        <!-- dashboard-title -->    
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item"><span>Dashboard</span></div>
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
                             
                               
                            </div>
                            <!--Tariff Plan menu end-->                     
                        </div>
                          <!-- content -->  
               
                        <!-- dashboard-title end -->
                        <!-- dasboard-wrapper-->
                        <div class="dasboard-wrapper fl-wrap no-pag">
                            <div class="row">
                               
                                <form method="post" action="users-profile-add" id="form" enctype="multipart/form-data">
                            @csrf
                                <div class="col-md-7">
                                    <div class="dasboard-widget-title fl-wrap">
                                        <h5><i class="fas fa-user-circle"></i>Change Avatar</h5>
                                    </div>
                                    <div class="dasboard-widget-box nopad-dash-widget-box fl-wrap">
                                        <div class="edit-profile-photo">
                                            <img src="{{asset('homey/images/dummy-profile-pic.png')}}" name="profile_pic" class="respimg" alt="">
                                            <div class="change-photo-btn">
                                                <div class="photoUpload">
                                                    <span>  Upload New Photo</span>
                                                    <input type="file" class="upload" name="profile_pic" id="image1" accept=".gif, .jpg, .png" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-wrap bg-parallax-wrap-gradien">
                                            <div class="bg"  data-bg=""></div>
                                        </div>
                                        <div class="change-photo-btn cpb-2  ">
                                            <div class="photoUpload color-bg">
                                                <span> <i class="far fa-camera"></i> Change Cover </span>
                                                <input type="file" class="upload" name="cover_pic" id="image1" accept=".gif, .jpg, .png" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dasboard-widget-title fl-wrap">
                                        <h5><i class="fas fa-key"></i>Personal Info</h5>
                                    </div>
                                    <div class="dasboard-widget-box fl-wrap">
                                        <div class="custom-form">
                                            <label>First Name *<span class="dec-icon"><i class="far fa-user"></i></span></label>
                                            <input type="text" name="first_name" placeholder="Enter Your First Name" />
                                            <label>Last Name <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                            <input type="text" name="last_name" placeholder="Enter Your Last Name" />
                                            <label>Email Address *<span class="dec-icon"><i class="far fa-envelope"></i></span></label>
                                            <input type="text" name="email" placeholder="Enter Email Address" />   
                                            <label>Phone *<span class="dec-icon"><i class="far fa-phone"></i> </span></label>
                                            <input type="text" name="phone_no" placeholder="Enter Mobile Number" />   
                                            <label>Address *<span class="dec-icon"><i class="fas fa-map-marker"></i> </span></label>
                                            <input type="text" name="address" placeholder="Enter Your Address" /> 
                                            <label>Nationality *<span class="dec-icon"><i class="fas fa-globe"></i> </span></label>
                                            <input type="text" name="nationality" placeholder="Enter Your Nationality" />  
                                             
                                        <div class="price-opt" style="padding: 10px;">
                                        <span class="price-opt-title">Gender</span>
                                        <div class="listsearch-input-item">
                                           <select name="gender"  class="chosen-select no-search-select">
                                                        <option label ="Not Selected">Not Selected</option>
                                                        <option value="Male" >Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other" >Other</option>
                                            </select>
                                        </div>
                                    </div>
                                                                       
                                            <label>Notes </label>
                                            <textarea cols="40" name="note" rows="3" placeholder="About Me" style="margin-bottom:20px;" ></textarea>                                     
                                            <button class="btn    color-bg  float-btn">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                                <div class="col-md-5">
                                    <div class="dasboard-widget-title dbt-mm fl-wrap">
                                        <h5><i class="fas fa-key"></i>Change Password</h5>
                                    </div>
                                    <div class="dasboard-widget-box fl-wrap">
                                       
                                        <div class="custom-form">
                                            <div class="pass-input-wrap fl-wrap">
                                                <label>Current Password<span class="dec-icon"><i class="far fa-lock-open-alt"></i></span></label>
                                                <input type="password" class="pass-input" placeholder="" value=""/>
                                                <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                            </div>
                                            <div class="pass-input-wrap fl-wrap">
                                                <label>New Password<span class="dec-icon"><i class="far fa-lock-alt"></i></span></label>
                                                <input type="password" class="pass-input" placeholder="" value=""/>
                                                <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                            </div>
                                            <div class="pass-input-wrap fl-wrap">
                                                <label>Confirm New Password<span class="dec-icon"><i class="far fa-shield-check"></i> </span></label>
                                                <input type="password" class="pass-input" placeholder="" value=""/>
                                                <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                            </div>
                                            <button class="btn    color-bg  float-btn">Save Changes</button>
                                        </div>
                                   
                                    </div>
                                    <!-- <div class="dasboard-widget-title fl-wrap" style="margin-top: 30px;">
                                        <h5><i class="fas fa-share-alt"></i>Your Socials</h5>
                                    </div>
                                    <div class="dasboard-widget-box fl-wrap">
                                        <div class="custom-form">
                                            <label>Facebook  <span class="dec-icon"><i class="fab fa-facebook"></i></span></label>
                                            <input type="text" placeholder="https://www.facebook.com/" value=""/>
                                            <label>Twitter <span class="dec-icon"><i class="fab fa-twitter"></i></span></label>
                                            <input type="text" placeholder="https://twitter.com/" value=""/>
                                            <label>Instagram<span class="dec-icon"><i class="fab fa-instagram"></i>  </span></label>
                                            <input type="text" placeholder="https://www.instagram.com/" value=""/>  
                                            <label>Vkontakte<span class="dec-icon"><i class="fab fa-vk"></i>  </span></label>
                                            <input type="text" placeholder="https://vk.com/" value=""/> 
                                            <button class="btn    color-bg  float-btn">Save Changes</button>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- dasboard-wrapper end -->   
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


              		
               