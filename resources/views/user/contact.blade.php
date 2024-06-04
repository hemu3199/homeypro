@extends("user.layouts.app")

@section  ("content")  
            <div id="wrapper">
                <!-- content -->	
                <div class="content">
                    <!--  section  -->
                    <section class="hidden-section single-par2  " data-scrollax-parent="true">
                        <div class="bg-wrap bg-parallax-wrap-gradien">
                            <div class="bg par-elem "  data-bg="{{asset('homey/images/bg/1.jpg')}}" data-scrollax="properties: { translateY: '30%' }"></div>
                        </div>
                        <div class="container">
                            <div class="section-title center-align big-title">
                                <h2><span>Our Contacts</span></h2>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit amet fermentum sem.</h4>
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
                                <a href="{{route('users-dashboard')}}">Home</a> <span>Contacts</span>
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
                                <div class="col-md-3">
                                    <div class="services-item fl-wrap">
                                        <i class="fal fa-envelope"></i>
                                        <h4>Mails <span></span></h4>
                                        <p></p>
                                        <a href="#" class="serv-link sl-b">Info@homeypro.co</a>
                                        
                                    </div>
                                </div>
                                <!-- services-item  end-->
                                <!-- services-item -->
                                <div class="col-md-3">
                                    <div class="services-item fl-wrap">
                                        <i class="fal fa-phone-rotary"></i>
                                        <h4>Phones<span></span></h4>
                                        <p></p>
                                        <a href="#" class="serv-link sl-b">+1 732 520 8811</a>
                                    </div>
                                </div>
                                <!-- services-item  end-->
                                <!-- services-item -->
                                <div class="col-md-3">
                                    <div class="services-item fl-wrap">
                                        <i class="fal fa-map-marked"></i>
                                        <h4>USA Address <span></span></h4>
                                        <p> </p>
                                        <a href="#" class="serv-link sl-b">515 Plainfield Avenue STE #102 Edison, New Jersey, 08817.</a>
                                    </div>
                                </div>
                                <!-- services-item  end-->		
                                 <!-- services-item -->
                                <div class="col-md-3">
                                    <div class="services-item fl-wrap">
                                        <i class="fal fa-map-marked"></i>
                                        <h4>India Address <span></span></h4>
                                        <p> </p>
                                        <a href="#" class="serv-link sl-b">Level 6,N-Heights,Siddiq Nagar, Hitech City Road, Hyderabad – 500081</a>
                                    </div>
                                </div>
                                <!-- services-item  end-->						
                            </div>
                            <div class="clearfix"></div>
                            <div class="contacts-opt fl-wrap">
                                <div class="contact-social">
                                    <span class="cs-title">Find us on: </span>
                                    <ul>
                                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                    </ul>
                                </div>
                                <a href="#" class="btn small-btn float-btn color-bg cf_btn">Write Mesagge</a>
                                <div class="contact-notifer">Or visit our <a href="{{route('helpfaq')}}">  help page</a></div>
                            </div>
                            <!--box-widget  -->			
                            <div class="box-widget">
                                <div class="box-widget-title single_bwt fl-wrap   ">Office Location</div>
                                <p> USA Adress :515 Plainfield Avenue STE #102 Edison, New Jersey, 08817.<br> India Adress :Level 6,N-Heights,Siddiq Nagar, Hitech City Road, Hyderabad – 500081.</p>
                                <!--box-widget end-->
                            </div>
                            <!--box-widget-->
                            <div class="box-widget fl-wrap">
                                <div class="map-widget contacts-map fl-wrap">
                                    <div class="map-container mapC_vis">
                                        <div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781"   data-infotitle="Our Loacation In NewYork" data-infotext="70 Bright St New York, USA"></div>
                                        <div class="scrollContorl"></div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget end --> 									
                        </div>
                    </section>
                    <!-- section end-->	
                </div>
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
               @endsection