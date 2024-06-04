@extends("user.layouts.homedashboard")
@section  ("content")
@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
	
					 <!-- dashbard-menu-wrap end  -->      
                <!-- content -->    
                <div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->    
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item"><span>View Review</span></div>
                            <div class="dashbard-menu-header">
                                <div class="dashbard-menu-avatar fl-wrap">
                                    <img src="{{url('/uploads/user-profile/'.DB::table('user_basic_info')->where(['user_id' => auth()->user()->user_id])->pluck('profile_pic')->first())}}" alt="">
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
                        @if($success)
        <div class="alert alert-success" style="color:green;">
            {{ $message['success'][0] }}
        </div>
    @elseif(is_array($message) && count($message) > 0)
        <div class="alert alert-danger" style="color-bg:red">
            <ul>
                @foreach($message as $error)
                    <li style="color:red">{{ $error[0] }}</li>
                @endforeach
            </ul>
        </div>
    @endif
                           <form method="post" action="{{ route('users-reviews-edit',$application_details->id) }}" id="form">
                                                @csrf
                       <div class="dasboard-widget-title fl-wrap">
                                        <h5><i class="fas fa-key"></i>Personal Info</h5>
                                    </div>
                                    <div class="dasboard-widget-box fl-wrap">
                                        <div class="custom-form">
                                            <label>User Name <span class="dec-icon"><i class="far fa-user"></i></span></label>
                                            <input type="text" name="user_name" placeholder="{{$application_details->user_name}}" value="{{$application_details->user_name}}" required/>
                                            <label>User Email Id <span class="dec-icon"><i class="fas fa-envelope"></i></span></label>
                                            <input type="text" name="user_email" placeholder="{{$application_details->user_email}}" value="{{$application_details->user_email}}" required/>
                                            <label>Message <i class="far fa-message"></i></label>
                                            <textarea required type="text" name="message"  placeholder="{{$application_details->message}}" value="{{$application_details->message}}">{{$application_details->message}}</textarea>
                                        </div>                         
                                            <div class="leave-rating-wrap">
                                            <span class="leave-rating-title">Your Ratings : </span>
                                            <div class="leave-rating">
                                                <input type="radio"    data-ratingtext="Excellent"   name="rating" id="rating-1" value="5"/>
                                                <label for="rating-1" class="fal fa-star"></label>
                                                <input type="radio" data-ratingtext="Good" name="rating" id="rating-2" value="4"/>
                                                <label for="rating-2" class="fal fa-star"></label>
                                                <input type="radio" name="rating"  data-ratingtext="Average" id="rating-3" value="3"/>
                                                <label for="rating-3" class="fal fa-star"></label>
                                                <input type="radio" data-ratingtext="Fair" name="rating" id="rating-4" value="2"/>
                                                <label for="rating-4" class="fal fa-star"></label>
                                                <input type="radio" data-ratingtext="Very Bad "   name="rating" id="rating-5" value="1"/>
                                                <label for="rating-5"    class="fal fa-star"></label>
                                            </div>
                                            <div class="count-radio-wrapper">
                                                <span id="count-checked-radio" name="rating">Rating Given {{$application_details->rating}} Star </span>
                                            </div>
                                        </div>
                                        <button class="btn big-btn color-bg float-btn">Edit Review <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
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