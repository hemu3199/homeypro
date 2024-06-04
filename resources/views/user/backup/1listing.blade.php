<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Homeradar - Real Estate Listing Template</title>
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->	
        <link type="text/css" rel="stylesheet" href="{{asset('homey/css/plugins.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('homey/css/cs-style.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('homey/css/color.css')}}">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="images/favicon.ico">
    </head>
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="loader-inner">
                <svg>
                    <defs>
                        <filter id="goo">
                            <fegaussianblur in="SourceGraphic" stdDeviation="2" result="blur" />
                            <fecolormatrix in="blur"   values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 5 -2" result="gooey" />
                            <fecomposite in="SourceGraphic" in2="gooey" operator="atop"/>
                        </filter>
                    </defs>
                </svg>
            </div>
        </div>
        <!--loader end-->
        <!-- main -->
        <div id="main" style="background-color: #3270FC;">
           
  
            <div class="wrapper">
                <!--  <div class="texticon">
                <div class="textarea" >
                     <a href="index.html"><img src="{{asset('homey/images/Rectangle 2 copy (2).png')}}" style="height:50px;"  alt=""></a>
                     <h5 >HOMEY.com</h5>
                </div>
                <div>
                     <h4>Looking for the right buyer?</h4>
                    
                </div>
                               
                       
                        
                    </div> -->
                      <div class="logo-holder"><a href="index.html"><img src="{{asset('homey/images/logo.png')}}" alt=""></a></div>
                <!-- logo end  -->
                <div class="cs-content-wrapper">
                     <h2> Looking for the right Property?</h2>
                    

                     <div id="subscribe" class="fl-wrap">
                           <!--  <input class="enteremail" name="email" id="subscribe-email" placeholder="Your Email" spellcheck="false" type="text">
                            <button type="submit" id="subscribe-button" class="subscribe-button color-bg">Send </button>
                            <label for="subscribe-email" class="subscribe-message"></label> -->
                            <h4 class="enteremail" style="font-weight: 500;" >Listing Property</h4>
                        </div>
                   <h3 >Homey offers a convenient and user-friendly portal, making it easy for owners, tenants to interact with property managers, rent collection, offers valuable insights into property performance, report issues, and access essential property-related information.</h3>
                  <!--  <h3 style="color:black">Vivamus vel lacus lacinia, condimentum nunc non, iaculis diam. Proin in mollis augue, eget fermentum quam. Donec semper purus ut ante tempus gravida. Quisque et ante orci. </h3>
                   <h3>Vivamus vel lacus lacinia, condimentum nunc non, iaculis diam. Proin in mollis augue, eget fermentum quam. Donec semper purus ut ante tempus gravida. Quisque et ante orci. </h3> -->
                   
                    <div class="cs-subcribe-form subcribe-form fl-wrap">
                     
                       
                    </div>
                    <div class="clearfix"></div>
                    <!-- <div class="cs-social fl-wrap">
                        <ul>
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                        </ul>
                    </div> -->
                </div>
                <!--  logo  -->

               <!--  <div class="logo-holder">
                    <a href="index.html"><img src="{{asset('homey/images/Homey logo copy (3).png')}}" height="50px;" width="100px;" alt=""></a>
                </div> -->
                <!-- logo end  -->
                <div class="cs-content-wrapper">
                   
                  
                    <div class="cs-subcribe-form subcribe-form fl-wrap">
                    <!-- <img src="{{asset('homey/images/download.svg')}}" style="height: 200px; width: 200px;"> -->
                    <!-- <h4>hiiiiiiii</h4> -->

           
                   
                </div>
                </div>
                <div class="pwh_bg">
                    <div class="mrb_pin"></div>
                    <div class="mrb_pin mrb_pin2"></div>
                </div>
            </div>
            <div class="wrapper2">
                 <div class="cs-content-wrapper2">
                     <div class="main-register-holder tabs-act">
                    <div class="main-register-wrapper modal_main fl-wrap" style="opacity: 1;">
                     
                        <div class="main-register">
                            
                            <ul class="tabs-menu fl-wrap no-list-style">
                                <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> Login</a></li>
                                <li><a href="#tab-2"><i class="fal fa-user-plus"></i> Register</a></li>
                            </ul>
                            <!--tabs -->                       
                            <div class="tabs-container">
                                <div class="tab">
                                    <!--tab -->
                                    <div id="tab-1" class="tab-content first-tab">
                                        <div class="custom-form">
                                            <form method="post"  name="registerform">
                                                <label>Username or Email Address  * <span class="dec-icon"><i class="fal fa-user"></i></span></label>
                                                <input name="email" type="text"  placeholder="Your Name or Mail"  onClick="this.select()" value="">
                                                <div class="pass-input-wrap fl-wrap">
                                                    <label >Password  * <span class="dec-icon"><i class="fal fa-key"></i></span></label>
                                                    <input name="password" placeholder="Your Password" type="password"  autocomplete="off" onClick="this.select()" value="" >
                                                    <span class="eye"><i class="fal fa-eye"></i> </span>
                                                </div>
                                                <div class="lost_password">
                                                    <a href="#">Lost Your Password?</a>
                                                </div>
                                                <div class="filter-tags">
                                                    <input id="check-a3" type="checkbox" name="check">
                                                    <label for="check-a3">Remember me</label>
                                                </div>
                                                <div class="clearfix"></div>
                                                <button type="submit"  class="log_btn color-bg"> LogIn </button>
                                            </form>
                                        </div>
                                    </div>
                                    <!--tab end -->
                                    <!--tab -->
                                    <div class="tab">
                                        <div id="tab-2" class="tab-content">
                                            <div class="custom-form">
                                                <form method="post"   name="registerform" class="main-register-form" id="main-register-form2">
                                                    <label >Full Name  * <span class="dec-icon"><i class="fal fa-user"></i></span></label>
                                                    <input name="name" type="text" placeholder="Your Name"    onClick="this.select()" value="">
                                                    <label>Email Address  * <span class="dec-icon"><i class="fal fa-envelope"></i></span></label>
                                                    <input name="email" type="text"  placeholder="Your Mail"   onClick="this.select()" value="">
                                                    <div class="pass-input-wrap fl-wrap">
                                                        <label >Password  * <span class="dec-icon"><i class="fal fa-key"></i></span></label>
                                                        <input name="password" type="password" placeholder="Your Password"  autocomplete="off"  onClick="this.select()" value="" >
                                                        <span class="eye"><i class="fal fa-eye"></i> </span>
                                                    </div>
                                                    <div class="filter-tags ft-list">
                                                        <input id="check-a2" type="checkbox" name="check">
                                                        <label for="check-a2">I agree to the <a href="#">Privacy Policy</a> and <a href="#">Terms and Conditions</a></label>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <button type="submit"     class="log_btn color-bg"> Register </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--tab end -->
                                </div>
                                <!--tabs end -->
                                <div class="log-separator fl-wrap"><span>or</span></div>
                                <div class="soc-log fl-wrap">
                                    <p>For faster login or register use your social account.</p>
                                    <a href="#" class="facebook-log"> Facebook</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 </div>
             </div>
                 

            <!--contact-form-wrap -->   
            <div class="contact-form-wrap">
                <div class="contact-form-container">
                    <div class="contact-form-main fl-wrap">
                        <div class="contact-form-header">
                            <h4>Get In touch</h4>
                            <span class="close-contact-form"><i class="fal fa-times"></i></span>
                        </div>
                        <div id="contact-form" class="contact-form fl-wrap">
                            <div id="message"></div>
                            <form  class="custom-form" action="php/contact.php" name="contactform" id="contactform">
                                <fieldset>
                                    <label>Your name* <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                    <input type="text" name="name" id="name" placeholder="Your Name *" value=""/>
                                    <label>Your mail* <span class="dec-icon"><i class="fas fa-envelope"></i></span></label>
                                    <input type="text"  name="email" id="email" placeholder="Email Address*" value=""/>
                                    <textarea name="comments"  id="comments" cols="40" rows="3" placeholder="Your Message:"></textarea>
                                </fieldset>
                                <button class="btn" style="margin-top:15px;" id="submit">Send Message</button>
                            </form>
                        </div>
                        <!-- contact form  end-->                   
                    </div>
                </div>
                <div class="contact-form-overlay"></div>
            </div>
            <!--contact-form-wrap end-->    
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script   src="{{asset('homey/js/jquery.min.js')}}"></script>
        <script   src="{{asset('homey/js/plugins.js')}}"></script>
        <script   src="{{asset('homey/js/scripts.js')}}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=YOU_API_KEY_HERE&libraries=places"></script>
        <script src="{{asset('homey/js/map-plugins.js')}}"></script>
        <script src="{{asset('homey/js/map-listing.js')}}"></script>
        <script src="{{asset('homey/js/tab.js')}}"></script>  
       
    </body>
</html>