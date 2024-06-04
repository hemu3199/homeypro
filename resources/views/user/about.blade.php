@extends("user.layouts.app")

@section  ("content")  
<style>
.rating {
  display: flex;
text-align: center;

}

.rating input[type="radio"] {
  display: none;
}

.rating label {
  font-size: 30px;
  cursor: pointer;
}

.rating label::before {
  content: "\2605"; /* Unicode for a solid star (★) */
  color: #ddd;
}

.rating input[type="radio"]:checked ~ label::before {
  color: #ffcc00; /* Change color for the checked star */
}
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 999;
}

.modal-content {

    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    position: absolute;
    top: 50%;
    left: 50%;
    text-align: center;
    transform: translate(-50%, -50%);
    width: 538px;
}

.close-modal {
    position: absolute;
    top: 18px;
    right: 30px;
    cursor: pointer;
    z-index: 1000;
    color: red;
    font-size: 22px;
}
/* .open-modal {
    background-color: transparent;
    border: none; 
    color: #007bff;
    font-size: 20px;
    cursor: pointer;
    transition: color 0.3s ease-in-out;
}

.open-modal:hover {
    color: #0056b3;
} */


</style>
            <div id="wrapper">
                <!-- content -->	
                <div class="content">
                    @if(session('message'))   
                      <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
                       @elseif(session('error'))
                       <div class="alert alert-success" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
                    @endif
                    <!--  section  -->
                    <section class="hidden-section single-par2  " data-scrollax-parent="true">
                        <div class="bg-wrap bg-parallax-wrap-gradien">
                            <div class="bg par-elem "  data-bg="{{asset('homey/images/bg/1.jpg')}}" data-scrollax="properties: { translateY: '30%' }"></div>
                        </div>
                        <div class="container">
                            <div class="section-title center-align big-title">
                                <h2><span>About Us</span></h2>
                                <h4></h4>
                            </div>
                            <div class="scroll-down-wrap">
                                <div class="mousey">
                                    <div class="scroller"></div>
                                </div>
                                <span>Scroll Down To Discover</span>
                            </div>
                        </div>
                    </section>
                    <!--  section  end-->
                    <!-- breadcrumbs-->
                    <div class="breadcrumbs fw-breadcrumbs sp-brd fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs-list">
                                <a href="{{route('users-dashboard')}}">Home</a> <span>About</span>
                            </div>
                            <div class="share-holder hid-share">
                                <a href="#" class="share-btn showshare sfcs">  <i class="fas fa-share-alt"></i>  Share   </a>
                                <div class="share-container  isShare">{!! $sharebutton !!}</div>
                            </div>
                        </div>
                    </div>
                    <!-- breadcrumbs end -->
                    <!-- section -->
                    <section class="gray-bg small-padding">
                        <div class="container">
                            <div class="row">
                                <!-- services-item -->
                                <div class="col-md-4">
                                    <div class="services-item fl-wrap" style="height:200px">
                                        <i class="fal fa-headset"></i>
                                        <h4>24 Hours Support <span>01</span></h4>
                                        <p>Ensuring that property owners and tenants can access services and support at any time.</p>
                                        <!-- <a href="#" class="serv-link">Read more</a> -->
                                    </div>
                                </div>
                                <!-- services-item  end-->
                                <!-- services-item -->
                                <div class="col-md-4">
                                    <div class="services-item fl-wrap">
                                        <i class="fal fa-users-cog"></i>
                                        <h4>User Admin Panel <span>02</span></h4>
                                        <p>User Admin Panel provides an intuitive and user-friendly interface, making it easy for property owners and tenants to navigate and access various features and functionalities.</p>
                                    </div>
                                </div>
                                <!-- services-item  end-->
                                <!-- services-item -->
                                <div class="col-md-4">
                                    <div class="services-item fl-wrap">
                                        <i class="fal fa-phone-laptop"></i>
                                        <h4>Mobile Friendly <span>03</span></h4>
                                        <p>This flexibility improves convenience and efficiency, as users can handle tasks and respond to inquiries in real-time, even when away from their desktop computers.</p>
                                    </div>
                                </div>
                                <!-- services-item  end-->								
                            </div>
                        </div>
                    </section>
                    <!-- section end-->	
                    <!-- section -->
                    <section>
                        <div class="container">
                            <!--about-wrap -->
                            <div class="about-wrap">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="about-title fl-wrap">
                                            <h2>Our Company <span></span></h2>
                                            <h4>Check video presentation to find   out more about us .</h4>
                                        </div>
                                        <p>Homey is an innovative and comprehensive property management platform designed to streamline property operations, enhance tenant experience, and optimize the management of rental properties. It leverages advanced technology to offer a range of features and tools for property managers, property owners, and tenants, creating a seamless and efficient ecosystem for all stakeholders</p>
                                        <p>
                                           Homey property management platform is a modern solution that embraces technology to optimize property management operations and enhance the overall property management experience for all stakeholders involved.
                                        </p>
                                        <!-- <a href="#" class="btn small-btn float-btn color-bg">Read More</a> -->
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-6">
                                        <div class="about-img fl-wrap">
                                            <img src="{{asset('homey/images/all/1.jpg')}}" class="respimg" alt="">
                                            <div class="about-img-hotifer">
                                                <p>Find The Property of Your Dream 
                                                            Using Homeypro</p>
                                                <h4>K K Teja</h4>
                                                <h5>CEO</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- about-wrap end  -->							
                        </div>
                    </section>
                    <!-- section end-->	
                    <!-- section -->
                     <section class="color-bg small-padding">
                        <div class="container">
                            <div class="main-facts fl-wrap">
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                @php
                                                $agents= DB::table('agents')->where('status',0)->count();
                                                @endphp
                                                <div class="num" data-content="0" data-num="{{$agents}}">0</div>
                                            </div>
                                        </div>
                                        <h6>Property Managers</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <!-- <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="12168">0</div>
                                            </div>
                                        </div>
                                        <h6>Happy Customers Every Year</h6>
                                    </div>
                                </div> -->
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                 @php
                                                $verified_properties= DB::table('homeyproperties')->where('property_deleted',0)->where('approval_status',1)->count();
                                                @endphp
                                                <div class="num" data-content="0" data-num="{{$verified_properties}}">0</div>
                                            </div>
                                        </div>
                                        <h6>Verified Properties</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                @php
                                                $verified_users= DB::table('users')->count();
                                                @endphp
                                                <div class="num" data-content="0" data-num="{{$verified_users}}">0</div>
                                            </div>
                                        </div>
                                        <h6>Users</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                            </div>
                        </div>
                        <div class="svg-bg">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%"
                                height="100%" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMax slice">
                                <defs>
                                    <lineargradient id="bg">
                                        <stop offset="0%" style="stop-color:rgba(255, 255, 255, 0.6)"></stop>
                                        <stop offset="50%" style="stop-color:rgba(255, 255, 255, 0.1)"></stop>
                                        <stop offset="100%" style="stop-color:rgba(255, 255, 255, 0.6)"></stop>
                                    </lineargradient>
                                    <path id="wave" stroke="url(#bg)" fill="none" d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
                                        s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
                                </defs>
                                <g>
                                    <use xlink:href="#wave">
                                        <animatetransform attributeName="transform" attributeType="XML" type="translate" dur="10s" calcMode="spline"
                                            values="270 230; -334 180; 270 230" keyTimes="0; .5; 1" keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
                                            repeatCount="indefinite" />
                                    </use>
                                    <use xlink:href="#wave">
                                        <animatetransform attributeName="transform" attributeType="XML" type="translate" dur="8s" calcMode="spline"
                                            values="-270 230;243 220;-270 230" keyTimes="0; .6; 1" keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
                                            repeatCount="indefinite" />
                                    </use>
                                    <use xlink:href="#wave">
                                        <animatetransform attributeName="transform" attributeType="XML" type="translate" dur="6s" calcMode="spline"
                                            values="0 230;-140 200;0 230" keyTimes="0; .4; 1" keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
                                            repeatCount="indefinite" />
                                    </use>
                                    <use xlink:href="#wave">
                                        <animatetransform attributeName="transform" attributeType="XML" type="translate" dur="12s" calcMode="spline" values="0 240;140 200;0 230"
                                            keyTimes="0; .4; 1" keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
                                    </use>
                                </g>
                            </svg>
                        </div>
                    </section>
                    <!-- section end-->						
                    <!-- section -->
                    <section >
                        <div class="container">
                            <!-- section-title -->
                            <div class="section-title st-center fl-wrap">
                                <h4>The Crew</h4>
                                <h2>Our Awesome team</h2>
                            </div>
                            <!-- section-title end -->
                            <div class="clearfix"></div>
                            <div class="row">
                                <!-- team-item -->
                                <div class="col-md-4">
                                    <div class="team-item fl-wrap">
                                        <div class="team-img fl-wrap">
                                            <img src="{{asset('homey/images/agency/agent/1.jpg')}}" class="respimg" alt="">
                                        </div>
                                        <div class="team-content fl-wrap">
                                            <h4>Alisa Gray</h4>
                                            <h5>Business consultant</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="team-footer fl-wrap">
                                            <ul class="team-social">
                                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                            </ul>
                                            <a href="mailto:yourmail@email.com" class="tolt tf-btn" data-microtip-position="top-right" data-tooltip="Write Message"><i class="fal fa-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- team-item end -->
                                <!-- team-item -->
                                <div class="col-md-4">
                                    <div class="team-item fl-wrap">
                                        <div class="team-img fl-wrap">
                                            <img src="{{asset('homey/images/agency/agent/1.jpg')}}" class="respimg" alt="">
                                        </div>
                                        <div class="team-content fl-wrap">
                                            <h4>Austin Evon</h4>
                                            <h5>Developer / Designer</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="team-footer fl-wrap">
                                            <ul class="team-social">
                                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                            </ul>
                                            <a href="mailto:yourmail@email.com" class="tolt tf-btn" data-microtip-position="top-right" data-tooltip="Write Message"><i class="fal fa-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- team-item end -->							
                                <!-- team-item -->
                                <div class="col-md-4">
                                    <div class="team-item fl-wrap">
                                        <div class="team-img fl-wrap">
                                            <img src="{{asset('homey/images/agency/agent/1.jpg')}}" class="respimg" alt="">
                                        </div>
                                        <div class="team-content fl-wrap">
                                            <h4>Taylor Roberts</h4>
                                            <h5>Software Engineer</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="team-footer fl-wrap">
                                            <ul class="team-social">
                                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                            </ul>
                                            <a href="mailto:yourmail@email.com" class="tolt tf-btn" data-microtip-position="top-right" data-tooltip="Write Message"><i class="fal fa-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- team-item end -->							
                            </div>
                        </div>
                    </section>
                    <!-- section end-->					
                    <!--section  -->  
                    <section class="parallax-section ps-bg video-section" data-scrollax-parent="true" id="sec2">
                        <div class="bg-wrap">
                            <div class="bg par-elem "  data-bg="{{asset('homey/images/bg/1.jpg')}}" data-scrollax="properties: { translateY: '30%' }"></div>
                        </div>
                        <div class="overlay"></div>
                        <!--container-->
                        <div class="container">
                            <div class="video_section-title fl-wrap">
                                <h2>Our Story Video</h2>
                                <h4>Get ready to start your exciting journey. <br> Our agency will lead you through the amazing digital world</h4>
                            </div>
                            <a href="https://vimeo.com/158059890" class="promo-link big_prom color-bg   image-popup"><i class="fas fa-play"></i></a>
                        </div>
                    </section>
                    <!--section end-->  					
                    <!-- section -->

                    @if ($testimonials->count() >= 3) 
                        <section class="gray-bg ">
                            <div class="container">
                                <div class="section-title st-center fl-wrap">
                                    <h4>Testimonilas</h4>
                                    <h2>What Our Clients Say</h2>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="testimonials-slider-wrap">
                                <div class="testimonials-slider">
                                    <!--slick-item -->
                                    @foreach ($testimonials as $testimonial)
                                        @php
                                            $profilepic = \DB::table('user_basic_info')->where('user_id', $testimonial['user_id'])->pluck('profile_pic')->first();
                                        @endphp
                                        <div class="slick-item  open-modal" data-modal-id="modal{{ $testimonial->id }}">
                                            <div class="text-carousel-item fl-wrap" style="height: 260px;">
                                                <div class="text-carousel-item-header fl-wrap">
                                                    @if(!empty($profilepic))
                                                        <div class="popup-avatar open-modal" data-modal-id="modal{{ $testimonial->id }}"><img src="{{url('/uploads/user-profile/'.  $profilepic)}}" alt=""></div>
                                                    @else
                                                        <div class="popup-avatar open-modal" data-modal-id="modal{{ $testimonial->id }}"><img src="{{asset('homey/images/dummy-profile-pic.png')}}" alt=""></div>
                                                    @endif
                                                    <div class="review-owner fl-wrap open-modal" data-modal-id="modal{{ $testimonial->id }}">{{ $testimonial->user_name }}</div>
                                                    <div class="listing-rating card-popup-rainingvis open-modal" data-modal-id="modal{{ $testimonial->id }}" data-starrating2="{{ $testimonial->rating }}"> </div>
                                                    
                                                    <!-- <button class="open-modal" data-modal-id="modal{{ $testimonial->id }}"><i class="fa fa-eye"></i></button> -->
                                                </div>
                                                <div class="text-carousel-content fl-wrap">
                                                <p class="open-modal" data-modal-id="modal{{ $testimonial->id }}">{{ $testimonial->message }}</p>
                                                    <!-- <a href="#" class="testim-link color-bg">Via Facebook</a> -->
                                                </div>
                                            </div>
                                        </div>
                                        
                                    @endforeach
                                    <!--slick-item end -->								
                                </div>
                            </div>
                        </section>
                    <!-- section end-->
                </div>
                <!-- Testimonaial Modal-->
                @foreach ($testimonials as $testimonial)
                    <div class="modal" id="modal{{ $testimonial->id }}">
                        <div class="modal-content">
                            <span class="close-modal">&times;</span>
                            @php
                                $profilepic = \DB::table('user_basic_info')->where('user_id', $testimonial['user_id'])->pluck('profile_pic')->first();
                            @endphp
                            <div class="slick-item">
                                <div class="text-carousel-item fl-wrap">
                                    <div class="text-carousel-item-header fl-wrap">
                                        @if(!empty($profilepic))
                                            <div class="popup-avatar" ><img src="{{url('/uploads/user-profile/'.  $profilepic)}}" alt=""></div>
                                        @else
                                            <div class="popup-avatar"><img src="{{asset('homey/images/dummy-profile-pic.png')}}" alt=""></div>
                                        @endif
                                        <div class="review-owner fl-wrap">{{ $testimonial->user_name }}</div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $testimonial->rating }}"> </div>
                                    </div>
                                    <div class="text-carousel-content fl-wrap">
                                    <p>{{ $testimonial->message }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Testimonaial Modal end-->
              <section class="gray-bg" style="margin-top: -150px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box-widget fl-wrap fixed-column_menu-init">
                            <div class="box-widget-content fl-wrap">
                                <div class="box-widget-title fl-wrap">WRITE A TESTIMONIAL</div>
                                <img src="{{asset('homey/images/5385893.jpg')}}" alt="" style="width: 320px; height: 210px;">
                            </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="list-single-main-item fl-wrap"  id="sec15" style="background-color: #fff;">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>Add Your Testimonial</h3>
                                </div>
                                <!-- Add Review Box -->
                                <div id="add-review" class="add-review-box">
                                    <!-- Review Comment -->
                                    <form method="post" action="{{ route('testimonial') }}" id="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="leave-rating-wrap">
                                            <span class="leave-rating-title">Your Testimonial : </span>
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
                                                <span id="count-checked-radio">Your Rating</span>
                                            </div>
                                        </div>
                                        <div class="add-comment custom-form">
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Your name* <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                                        <input   name="user_name" type="text"    onClick="this.select()" value="" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Your Email* <span class="dec-icon"><i class="fas fa-envelope"></i></span></label>
                                                        <input   name="user_email" type="text"    onClick="this.select()" value="" required>
                                                    </div>
                                                </div>
                                                <textarea cols="40" rows="3" name="message" placeholder="Your Testimonial*:" required></textarea>
                                            </fieldset>
                                            @if (Auth::guest())
                                                <button class="btn big-btn color-bg float-btn modal-open">Submit Testimonial <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>                                   
                                            @else
                                                <button class="btn big-btn color-bg float-btn">Submit Testimonial <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                <!-- Add Review Box / End -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="limit-box fl-wrap"></div>
                </section>
                @else
                </div>
                <section class="gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box-widget fl-wrap fixed-column_menu-init">
                            <div class="box-widget-content fl-wrap">
                                <div class="box-widget-title fl-wrap">WRITE A TESTIMONIAL</div>
                                <img src="{{asset('homey/images/5385893.jpg')}}" alt="" style="width: 320px; height: 210px;">
                            </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="list-single-main-item fl-wrap"  id="sec15" style="background-color: #fff;">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>Add Your Testimonial</h3>
                                </div>
                                <!-- Add Review Box -->
                                <div id="add-review" class="add-review-box">
                                    <!-- Review Comment -->
                                    <form method="post" action="{{ route('testimonial') }}" id="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="leave-rating-wrap">
                                            <span class="leave-rating-title">Your Testimonial : </span>
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
                                                <span id="count-checked-radio">Your Rating</span>
                                            </div>
                                        </div>
                                        <div class="add-comment custom-form">
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Your name* <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                                        <input   name="user_name" type="text"    onClick="this.select()" value="" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Your Email* <span class="dec-icon"><i class="fas fa-envelope"></i></span></label>
                                                        <input   name="user_email" type="text"    onClick="this.select()" value="" required>
                                                    </div>
                                                </div>
                                                <textarea cols="40" rows="3" name="message" placeholder="Your Testimonial*:" required></textarea>
                                            </fieldset>
                                            @if (Auth::guest())
                                                <button class="btn big-btn color-bg float-btn modal-open">Submit Testimonial <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>                                   
                                            @else
                                                <button class="btn big-btn color-bg float-btn">Submit Testimonial <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                <!-- Add Review Box / End -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="limit-box fl-wrap"></div>
                </section>
                @endif
                <!-- content end -->	
                <!-- subscribe-wrap -->	
                <div class="subscribe-wrap fl-wrap">
                    <div class="container">
                        <div class="subscribe-container fl-wrap color-bg">
                            <div class="pwh_bg"></div>
                            <div class="mrb_dec mrb_dec3"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="subscribe-header">
                                        <h4>newsletter</h4>
                                        <h3>Sign up for newsletter and get latest news and update</h3>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <div class="footer-widget fl-wrap">
                                        <div class="subscribe-widget fl-wrap">
                                            <div class="subcribe-form">
                                                <form id="subscribe">
                                                    <input class="enteremail fl-wrap" name="email" id="subscribe-email" placeholder="Enter Your Email" spellcheck="false" type="text">
                                                    <button type="submit" id="subscribe-button" class="subscribe-button color-bg">  Subscribe</button>
                                                    <label for="subscribe-email" class="subscribe-message"></label>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- subscribe-wrap end -->
                <div class="main-register-wrap report">
                    <div class="reg-overlay"></div>
                    <div class="main-register-holder">
                        <div class="main-register-wrapper modal_main fl-wrap">
                            <div class="main-register" style="width: 100%; border-radius: 10px;">
                                <div class="reportclose"><i class="fal fa-times"></i></div>
                                <div class="list-single-main-item fl-wrap" id="faq3">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Testimonial</h3>
                                    </div>
                                    <!-- Add Testimonial Box -->
                                    @php
                                    $profilepic = \DB::table('user_basic_info')->where('user_id', $testimonial['user_id'])->pluck('profile_pic')->first();
                                    @endphp
                                    <div class="slick-item">
                                        <div class="text-carousel-item fl-wrap" style="height: 250px;">
                                            <div class="text-carousel-item-header fl-wrap">
                                                @if(!empty($profilepic))
                                                <div class="popup-avatar report-open"><img src="{{url('/uploads/user-profile/'.  $profilepic)}}" alt=""></div>
                                                @else
                                                <div class="popup-avatar report-open"><img src="{{asset('homey/images/dummy-profile-pic.png')}}" alt=""></div>
                                                @endif
                                                <div class="review-owner fl-wrap report-open">{{ $testimonial->user_name }}</div>
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $testimonial->rating }}"> </div>
                                            </div>
                                            <div class="text-carousel-content fl-wrap report-open">
                                                <p>{{ $testimonial->message }}</p>
                                                <!-- <a href="#" class="testim-link color-bg">Via Facebook</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add Testimonial Box / End -->
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
    document.addEventListener("DOMContentLoaded", function () {
        const openModalButtons = document.querySelectorAll(".open-modal");
        const closeModalButtons = document.querySelectorAll(".close-modal");

        openModalButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                const modalId = button.getAttribute("data-modal-id");
                const modal = document.getElementById(modalId);
                modal.style.display = "block";
            });
        });

        closeModalButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                const modal = button.closest(".modal");
                modal.style.display = "none";
            });
        });
    });
</script>


@endsection	
              