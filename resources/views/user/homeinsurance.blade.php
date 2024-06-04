@extends("user.layouts.app")

@section  ("content")  
            <div id="wrapper">
                <!-- content -->	
                <div class="content">
                     <div class="col-md-12">
                        <!-- <div style="background-color: red;"> -->
                              <div class="row">
                                    <div class="col-md-5 textsection" >
                                        <div class="col-md-2"></div>
                                        <div class="col-md-9">
                                             <div class="about-title fl-wrap">
                                                <h1 class="texttitle">HOME</h1>
                                                <h1 class="texttitle"> INSURANCE </h1>
                                                <h3 class="textcaption" >Home & Lifestyle protection plans made simple with HOMEY Protect</h3>
                                            <!-- <h4>Check video presentation to find   out more about us .</h4> -->
                                            </div>
                                            <div class="homeinsurance">
                                                  @if (Auth::guest())
                                                 <div class="col-md-5"> <a href="#" class="btn float-btn color-bg modal-open" style="padding:10px 20px;margin: 5px;">Rent Property</a></div>
                                                @else
                                                 <div class="col-md-5"> <a href="{{route('add-property-view')}}" class="btn float-btn color-bg" style="padding:10px 20px;margin: 5px;">Rent Property</a></div>
                                                 @endif
                                                 <div class="col-md-2"></div>

                                                 <div class="col-md-5"> <a href="#" class="btn float-btn color-bg" style="padding:10px 20px;margin: 5px;">Property Protect</a></div>
                                                
                                            </div>
                                             
                                            <!-- <div class="col-md-1"></div> -->
                                            
                                            <!-- <div class="col-md-6"> <a href="#" class="btn small-btn float-btn color-bg">Property Protect</a></div> -->
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <!-- <div class="col-md-1"></div> -->
                                    <div class="col-md-7 " class="imagebackgroundcolor">


                                        <div class="about-img fl-wrap" >
                                            <img src="{{asset('homey/images/insurance.png')}}" class="respimg imgheight" alt="" >
                                        </div>
                                        <!-- <div class="about-img fl-wrap" style="z-index: 4;width: 60%; background-color: blue; "></div> -->
                                    </div>
                                </div>
                        <!-- </div> -->
                    </div>
                </div>
                <!-- content end -->	
                <!-- subscribe-wrap -->	
                <div class="subscribe-wrap fl-wrap" style="margin-top: 10px;">
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
              