@extends("agent.bg-layouts.bgagenthomey")
@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('title', 'Agent Properties')
@section('content')
<div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                     <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item" style="top:0px ;"><span>View Application</span></div>
                                      
                        </div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->  
                       
                         <div class="dashboard-title fl-wrap">
                         </div>
                         <div></div>
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
                                            <input disabled type="text" name="email" value="{{DB::table('users')->where(['user_id' => $application_details->user_id])->pluck('email')->first();}}" />
                                            <label>User Phone Number <span class="dec-icon"><i class="far fa-phone"></i></span></label>
                                            <input disabled type="text" name="phone_no"  placeholder="{{DB::table('user_basic_info')->where(['user_id' => $application_details->user_id])->pluck('phone_no')->first();}}" />   
                                            <label>Gender<span class="dec-icon"><i class="far  fa-user "></i> </span></label>
                                            <input disabled type="text" name="gender" placeholder="{{DB::table('user_basic_info')->where(['user_id' => $application_details->user_id])->pluck('gender')->first();}}" />   
                                            <label>Adress <span class="dec-icon"><i class="fas fa-map-marker"></i> </span></label>
                                            <input disabled type="text"  name="address"  value="{{DB::table('user_basic_info')->where(['user_id' => $application_details->user_id])->pluck('address')->first();}}" /> 
                                                                 
                                   
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

@endsection