<!DOCTYPE HTML>
<!DOCTYPE HTML >
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>HOMEY :: Rentals</title>
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============--> 
        <link type="text/css" rel="stylesheet" href=" {{asset('homey/css/plugins.css')}}">
        <link type="text/css" rel="stylesheet" href=" {{asset('homey/css/style.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('homey/css/dashboard-style.css')}}">
        <link type="text/css" rel="stylesheet" href=" {{asset('homey/css/color.css')}}">
         <link type="text/css" rel="stylesheet" href=" {{asset('homey/css/custom.css')}}">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="{{asset('homey/images/favicon.png ')}}" style="height: 50px; width: 100%;">

        <!--========slider=========---->
         <link type="text/css" rel="stylesheet" href=" {{asset('homey/slider/style.css')}}">
          <!-- <link type="text/css" rel="stylesheet" href=" {{asset('homey/pageination.css')}}"> -->

         <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    
    <link rel="stylesheet" href="{{asset('homey/imageslider/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> -->
    <script src=" {{asset('homey/imageslider/script.js')}}" defer></script>
    <style type="text/css"></style>
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
        <div id="main">
            <!-- header -->
            <header class="main-header">
                <!--  logo  -->
                <div class="logo-holder"><a href="{{route('users-dashboard')}}"><img src="{{asset('homey/images/logo.png')}}" alt=""></a></div>
                <!-- logo end  -->
                <!-- nav-button-wrap--> 
                <div class="nav-button-wrap color-bg nvminit">
                    <div class="nav-button">
                        <span></span><span></span><span></span>
                    </div>
                </div>
                <!-- nav-button-wrap end--> 
                <!-- header-search button  -->
                <div class="header-search-button">
                    <i class="fal fa-search"></i>
                    <span>Search...</span>
                </div>
                <!-- header-search button end  -->
                <!--  add new  btn -->
                <div class="add-list_wrap">
                    <a href="{{route('listing')}}" class="add-list color-bg"><i class="fal fa-plus"></i> <span>Add Listing</span></a>
                </div>
                <!--  add new  btn end -->
                <!--  header-opt_btn -->
                <div class="header-opt_btn tolt" data-microtip-position="bottom"  data-tooltip="Language / Currency">
                    <span><i class="fal fa-globe"></i></span>
                </div>
                <!--  header-opt_btn end -->
                <!--  cart-btn   -->
                <div class="cart-btn  tolt show-header-modal" data-microtip-position="bottom"  data-tooltip="Your Wishlist / Compare">
                    <i class="fal fa-bell"></i>
                      @if (Auth::guest())
                      @else
                    <span class="cart-btn_counter color-bg">{{DB::table('compare')
                                    ->where('user_id', Auth::guard('web')->user()->user_id)
                                    ->count();}}</span>
                                    @endif
                </div>
                <!--  cart-btn end -->
                <!--  login btn -->
                 
                 @if (Auth::guest())
                <div class="show-reg-form modal-open"><i class="fas fa-user"></i><span>Sign In</span></div>
                @else
                
                <div class="show-reg-form dasbdord-submenu-open"><img src="{{url('/uploads/user-profile/'.DB::table('user_basic_info')->where(['user_id' => auth()->user()->user_id])->pluck('profile_pic')->first())}}" alt=""></div>
                <div class="dashboard-submenu">
                    <div class="dashboard-submenu-title fl-wrap">Welcome ,
                        {{DB::table('users')->where(['user_id' => auth()->user()->user_id])->pluck('name')->first();}} <span></span></div>
                       
                    <ul>
                        <li><a href="{{route('dashboard')}}"><i class="fal fa-chart-line"></i>Dashboard</a></li>
                        <li><a href="{{route('listing')}}"> <i class="fal fa-file-plus"></i>Add Listing</a></li>
                        @php
                        $profile = DB::table('user_basic_info')->where(['user_id' => auth()->user()->user_id])->first();
                        @endphp
                        @if($profile == '')
                        <li><a href="{{ route('users-profile-setting')}}"><i class="fal fa-user-edit"></i>Update Profile</a></li>
                        @else
                         <li><a href="{{ route('users-profile-setting-view')}}"><i class="fal fa-user-edit"></i>Profile Settings</a></li>
                         @endif
                    </ul>
                    <a href="{{ route('logout')}}" class="color-bg db_log-out"><i class="far fa-power-off"></i> Log Out</a>
                </div>
                
                @endif

                <!--  login btn  end -->
                   
                <!--  navigation --> 
                <div class="nav-holder main-menu">
                    <nav>
                        <ul class="no-list-style">
                            <li >
                                <a href="{{route('users-dashboard')}}" class="act-link" >Home </a>
                                <!--second level -->   
                               <!--  <ul <i class="fa fa-caret-down" class="act-link"></i>>
                                    <li><a href="index.html">Parallax Image</a></li>
                                    <li><a href="index2.html">Slider</a></li>
                                    <li><a href="index3.html">Video</a></li>
                                    <li><a href="index4.html">Slideshow</a></li>
                                </ul> -->
                                <!--second level end-->
                            </li>
                            <li>
                                <a class="act-link" href="{{ route('users-property-rent') }}">Properties </a>
                               
                            </li>
                            <!-- <li>
                                <a class="act-link" href="#">Services</a>
                               
                            </li> -->
                           <!--  <li>
                                <a class="act-link" href="blog.html">News</a>
                            </li> -->
                            <li>
                                <a class="act-link" href="{{route('users-about')}}">About Us <i class="fa fa-caret-down" style="color:#3270FC"></i></a>
                                <!--second level -->   
                                <ul>
                                    <li><a class="act-link" href="about.html">Careers</a></li>
                                    <li><a class="act-link" href="{{ route('users-contact') }}">Contacts</a></li>
                                    <li><a class="act-link" href="{{ route('helpfaq')}}">Help FAQ</a></li>
                                    <li><a class="act-link" href="{{ route('referal')}}">Offers and Coupons </a></li>
                                   
                                </ul>
                                <!--second level end-->                                
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- navigation  end -->
                <!-- header-search-wrapper -->
                <div class="header-search-wrapper novis_search">
                   <!--  <div class="header-serach-menu">
                        <div class="custom-switcher fl-wrap">
                            <div class="fieldset fl-wrap">
                                 <label for="rent_sw" class="color-bg">Rent</label>
                               <!-  <input type="radio" name="duration-1"  id="rent_sw" class="tariff-toggle"  >
                                <label for="rent_sw" class="color-bg">Rent</label>
                                <!- <input type="radio" name="duration-1" class="tariff-toggle"  id="rent_sw">
                                <label for="rent_sw" class="lss_lb">Rent</label> ->
                                <!- <span class="switch color-bg"></span> -> 
                            </div>
                        </div>
                    </div> -->
                    <div class="custom-form">
                        <form method="post" action="{{route('search')}}" >
                            @csrf
                            <label>Address </label>
                            <input type="text" placeholder="Address , Street..." name="address" value=""/>
                             <label> City</label>
                             <select data-placeholder="Categories" name="cat" class="chosen-select on-radius no-search-select" >
                                @php
                                 $city= DB::table('homeyproperties')->select('city')->where('approval_status','=',1)->distinct()->get();
                                @endphp
                                <option value="all cities">All Cities</option>
                                @foreach($city as $key => $row)
                                <option value="{{$row->city}}">{{$row->city}}</option>
                                @endforeach
                            </select>
                            <label> Contry</label>
                            <input type="text" placeholder="Country..." name="State" value=""/>
                           
                            <label >Categories</label>
                            <select data-placeholder="Categories" name="cat" class="chosen-select on-radius no-search-select" >
                                @php
                                 $categories= DB::table('homeyproperties')->select('categories')->where('approval_status','=',1)->distinct()->get();
                                @endphp
                                @foreach($categories as $key => $row)
                                <option value="{{$row->categories}}">{{$row->categories}}</option>
                                @endforeach
                            </select>
                            <label style="margin-top:10px;" >Price Range</label>
                            <div class="price-rage-item fl-wrap">
                                <input type="text" class="price-range" data-min="0" data-max="100000"  name="price"  data-step="1" value="1" data-prefix="INR: ">
                            </div>
                            <button type="submit" class="btn float-btn color-bg"><i class="fal fa-search"></i> Search</button>
                        </form>
                    </div>
                </div>
                <!-- header-search-wrapper end  -->             
                <!-- wishlist-wrap--> 
                <div class="header-modal novis_wishlist tabs-act">
                    <ul class="tabs-menu fl-wrap no-list-style">
                        <li class="current"><a href="#tab-wish">  Wishlist <span>- 3</span></a></li>
                        @if (Auth::guest())
                        <li><a href="#tab-compare">  Compare <span>-0</span></a></li>
                        @else
                        <li><a href="#tab-compare">  Compare <span>-{{DB::table('compare')
                                    ->where('user_id', Auth::guard('web')->user()->user_id)
                                    ->count();}}</span></a></li>
                        @endif
                    </ul>
                    <!--tabs -->                       
                    <div class="tabs-container">
                        <div class="tab">
                            <!--tab -->
                            <div id="tab-wish" class="tab-content first-tab">
                                <!-- header-modal-container--> 
                                <div class="header-modal-container scrollbar-inner fl-wrap" data-simplebar>
                                    <!--widget-posts-->
                                    <div class="widget-posts  fl-wrap">
                                        <ul class="no-list-style">
                                            <li>
                                                <div class="widget-posts-img"><a href="listing-single.html"><img src="{{asset('homey/images/all/small/1.jpg')}}" alt=""></a>  
                                                </div>
                                                <div class="widget-posts-descr">
                                                    <h4><a href="listing-single.html">Affordable Urban Room</a></h4>
                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 40 Journal Square  , NJ, USA</a></div>
                                                    <div class="widget-posts-descr-price"><span>Price: </span> $ 1500 / per month</div>
                                                    <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="widget-posts-img"><a href="listing-single.html"><img src="images/all/small/1.jpg" alt=""></a>
                                                </div>
                                                <div class="widget-posts-descr">
                                                    <h4><a href="listing-single.html">Family House</a></h4>
                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 34-42 Montgomery St , NY, USA</a></div>
                                                    <div class="widget-posts-descr-price"><span>Price: </span> $ 50.000</div>
                                                    <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="widget-posts-img"><a href="listing-single.html"><img src="images/all/small/1.jpg" alt=""></a>
                                                </div>
                                                <div class="widget-posts-descr">
                                                    <h4><a href="listing-single.html">Apartment to Rent</a></h4>
                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i>75 Prince St, NY, USA</a></div>
                                                    <div class="widget-posts-descr-price"><span>Price: </span> $100 / per night</div>
                                                    <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- widget-posts end-->
                                </div>
                                <!-- header-modal-container end--> 
                                <div class="header-modal-top fl-wrap">
                                    <div class="clear_wishlist color-bg"><i class="fal fa-trash-alt"></i> Clear all</div>
                                </div>
                            </div>
                            <!--tab end -->
                            <!--tab -->
                            <div class="tab">
                                <div id="tab-compare" class="tab-content">
                                    <!-- header-modal-container--> 
                                    <div class="header-modal-container scrollbar-inner fl-wrap" data-simplebar>
                                        <!--widget-posts-->
                                        <div class="widget-posts  fl-wrap">
                                            <ul class="no-list-style">
                                                @if(Auth::guest())
                                                @else
                                                @php
                                                $comparelist= DB::table('compare')->select('property_id')->where('user_id',Auth::guard('web')->user()->user_id)->get();
                                                $comparecount=DB::table('compare')->where('user_id',Auth::guard('web')->user()->user_id)->count();

                                                @endphp
                                                @if($comparecount >= 1)
                                                @foreach($comparelist as $key=> $row)
                                            <li>
                                                    @php 
                                                            $bookmark = DB::table('property_images')->where('property_id', $row->property_id)
                                                        ->first();
                                                        $imagescount = DB::table('property_images')->where('property_id', $row->property_id)
                                                        ->count();
                                                    @endphp
                                                    @if (!empty($bookmark))
                                                                   
                                                                     <div class="widget-posts-img"><a href="{{ route('users-property-rent-details', $row->property_id) }}"><img src="{{url('/uploads/properties/'.$bookmark->image_name)}}" alt=""></a>  
                                                            </div>
                                                    @else
                                                  
                                                     @endif
                                                    <div class="widget-posts-descr">
                                                        <h4><a href="listing-single.html">{{DB::table('homeyproperties')->where('property_id',$row->property_id)->pluck('name')->first();}}</a></h4>
                                                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> {{DB::table('homeyproperties')->where('property_id',$row->property_id)->pluck('address')->first();}} </a></div>
                                                        <div class="widget-posts-descr-price"><span>Price: </span>  52.100</div>
                                                        <a href="{{route('removecompare',$row->property_id)}}" class="clear-wishlist"><i class="fal fa-trash-alt"></i></a>
                                                    </div>
                                                </li>
                                                @endforeach
                                                @else

                                                @endif
                                                
                                                @endif
                                                <!-- <li>
                                                    <div class="widget-posts-img"><a href="listing-single.html"><img src="images/all/small/1.jpg" alt=""></a>
                                                    </div>
                                                    <div class="widget-posts-descr">
                                                        <h4><a href="listing-single.html">Family Apartments</a></h4>
                                                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> W 85th St, New York, USA </a></div>
                                                        <div class="widget-posts-descr-price"><span>Price: </span> $ 72.400</div>
                                                        <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                                    </div>
                                                </li> -->
                                            </ul>
                                        </div>
                                        <!-- widget-posts end-->
                                    </div>
                                    <!-- header-modal-container end-->                                      
                                    <div class="header-modal-top fl-wrap">
                                        <a class="clear_wishlist color-bg" href="{{route('compare')}}"><i class="fal fa-random"></i> Compare</a>
                                    </div>
                                </div>
                            </div>
                            <!--tab end -->
                        </div>
                        <!--tabs end -->                            
                    </div>
                </div>
                <!--wishlist-wrap end -->                            
                <!--header-opt-modal-->  
                <div class="header-opt-modal novis_header-mod">
                    <div class="header-opt-modal-container hopmc_init">
                        <div class="header-opt-modal-item lang-item fl-wrap">
                            <h4>Language: <span>EN</span></h4>
                            <div class="header-opt-modal-list fl-wrap">
                                <ul>
                                    <li><a href="#" class="current-lan" data-lantext="EN">English</a></li>
                                    <li><a href="#" data-lantext="FR">Franais</a></li>
                                    <li><a href="#" data-lantext="ES">Espaol</a></li>
                                    <li><a href="#" data-lantext="DE">Deutsch</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="header-opt-modal-item currency-item fl-wrap">
                            <h4>Currency: <span>INR</span></h4>
                            <div class="header-opt-modal-list fl-wrap">
                                <ul>
                                     <li><a href="#"class="current-lan" data-lantext="INR">INR</a></li>
                                    <li><a href="#" data-lantext="USD">USD</a></li>
                                    <li><a href="#" data-lantext="EUR">EUR</a></li>
                                    <li><a href="#" data-lantext="GBP">GBP</a></li>
                                    <li><a href="#" data-lantext="RUR">RUR</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header-opt-modal end -->  
            </header>
            <!-- header end  -->
            <!-- wrapper  -->	
            <div id="wrapper">
                <!-- content -->	
                <div class="content">
                    <!--  section  -->
                    <section class="parallax-section color-bg" data-scrollax-parent="true">
                        <div class="container">
                            <div class="error-wrap">
                                <div class="hero-text-big">
                                    <h6>404</h6>
                                </div>
                                <p>We're sorry, but the Page you were looking for, couldn't be found.</p>
                                <div class="clearfix"></div>
                                <form action="#">
                                    <input name="se" id="se" type="text" class="search" placeholder="Search.." value="Search...">
                                    <button class="search-submit" id="submit_btn"><i class="fal fa-search"></i> </button>
                                </form>
                                <div class="clearfix"></div>
                                <p>Or</p>
                                <a href="{{route('users-dashboard')}}" class="btn   color-bg">Back to Home Page</a>
                            </div>
                        </div>
                        <div class="pwh_bg fw-pwh">
                            <div class="mrb_pin vis_mr mrb_pin3 "></div>
                            <div class="mrb_pin vis_mr mrb_pin4 "></div>
                        </div>
                    </section>
                    <!--  section  end-->
                </div>
                <!-- content end -->	
                <!-- footer -->	
               <footer class="main-footer fl-wrap">
                    <div class="footer-inner fl-wrap">
                        <div class="container">
                            <div class="row">
                                <!-- footer widget-->
                                <div class="col-md-2">
                                    <div class="footer-widget fl-wrap">
                                        <div class="footer-widget-logo fl-wrap">
                                            <img src="{{asset('homey/images/logo.png')}}" alt="">
                                        </div>
                                        <p>Homey is an innovative and comprehensive property management platform designed to streamline property operations, enhance tenant experience, and optimize the management of rental properties.</p>
                                        <div class="fw_hours fl-wrap">
                                            <span>Monday - Friday:<strong> 8am - 6pm</strong></span>
                                            <span>Saturday - Sunday:<strong> 9am - 3pm</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer widget end-->
                                <!-- footer widget-->
                                <div class="col-md-2">
                                    <div class="footer-widget fl-wrap">
                                        <div class="footer-widget-title fl-wrap">
                                            <h4>Helpful links</h4>
                                        </div>
                                        <ul class="footer-list fl-wrap">
                                            <li><a href="about.html">About Our Company</a></li>
                                            <li><a href="blog.html">Our last News</a></li>
                                            <li><a href="pricing.html">Offers/ Coupens</a></li>
                                            <li><a href="contacts.html">Contacts</a></li>
                                            <li><a href="help.html">Help Center</a></li>
                                        </ul>
                                    </div>
                                </div>
                                  <div class="col-md-2">
                                    <div class="footer-widget fl-wrap">
                                        <div class="footer-widget-title fl-wrap">
                                            <h4>EXPLORE</h4>
                                        </div>
                                        <ul class="footer-list fl-wrap">
                                            <li><a href="#">Pay On Credit</a></li>
                                            <li><a href="#">Personal Loans</a></li>
                                            <li><a href="#">Rent Agreement</a></li>
                                            <li><a href="#">Packers And Movers</a></li>
                                            <li><a href="#">Property Management</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- footer widget end--> 
                                <!-- footer widget-->
                                <div class="col-md-3">
                                    <div class="footer-widget fl-wrap">
                                        <div class="footer-widget-title fl-wrap">
                                            <h4>Contacts Info</h4>
                                        </div>
                                        <ul  class="footer-contacts fl-wrap">
                                            <li><span><i class="fal fa-envelope"></i> Mail :</span><a href="#" target="_blank">Info@homeypro.con</a></li>
                                            <li><span><i class="fal fa-phone"></i> Phone :</span><a href="#">+1 732 520 8811</a></li>
                                            <li> <span><i class="fal fa-map-marker"></i>USA Adress :</span><a href="#" target="_blank">515 Plainfield Avenue STE #102 Edison, New Jersey, 08817.</a></li>
                                            <li> <span><i class="fal fa-map-marker"></i>India Adress :</span><a href="#" target="_blank">Level 6,N-Heights,Siddiq Nagar, Hitech City Road, Hyderabad – 500081.</a></li>
                                            
                                        </ul>
                                        <div class="footer-social fl-wrap">
                                            <ul>
                                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer widget end-->   
                                <!-- footer widget-->
                                <div class="col-md-3">
                                    <div class="footer-widget fl-wrap">
                                        <div class="footer-widget-title fl-wrap">
                                            <h4>Download our APP</h4>
                                        </div>
                                        <p>Start exploring with HOMEY that can provide everything For Your Property Need </p>
                                        <div class="api-links fl-wrap">
                                            <a href="#" class="api-btn color-bg"><i class="fab fa-apple"></i> App Store</a>  
                                            <a href="#" class="api-btn color-bg"><i class="fab fa-google-play"></i> Play Market</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer widget end-->                                     
                            </div>
                        </div>
                    </div>
                    <!--sub-footer-->
                    <div class="sub-footer gray-bg fl-wrap">
                        <div class="container">
                            <div class="copyright"> &#169; HOMEY 2023 .  All rights reserved.</div>
                            <div class="subfooter-nav">
                                <ul class="no-list-style">
                                    <li><a href="#">Terms of use</a></li>
                                    <li><a href="{{route('privacy')}}">Privacy Policy</a></li>
                                    <li><a href="#">Blog</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--sub-footer end -->                     
</footer>
                <!-- footer end -->
            </div>
            <!-- wrapper end -->
            <!--register form -->
            <div class="main-register-wrap modal">
                <div class="reg-overlay"></div>
                <div class="main-register-holder tabs-act">
                    <div class="main-register-wrapper modal_main fl-wrap">
                        <div class="main-register-header color-bg">
                            <div class="main-register-logo fl-wrap">
                                <img src="{{asset('homey/images/logo.png')}}" style="width: 80%; height: 80%; margin-top:-40px ;" alt="">
                            </div>
                            <div class="main-register-bg">
                                <div class="mrb_pin"></div>
                                <div class="mrb_pin mrb_pin2"></div>
                            </div>
                            <div class="mrb_dec"></div>
                            <div class="mrb_dec mrb_dec2"></div>
                        </div>
                        <div class="main-register">
                            <div class="close-reg" ><i class="fal fa-times"></i></div>
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
                                            <form method="post" action="{{ route('login') }}" name="registerform">
                                                @csrf
                                                <label>Username or Email Address  * <span class="dec-icon"><i class="fal fa-user"></i></span></label>
                                                <input name="email" type="text"    onClick="this.select()" value="">
                                                <div class="pass-input-wrap fl-wrap">
                                                    <label >Password  * <span class="dec-icon"><i class="fal fa-key"></i></span></label>
                                                    <input name="password" type="password"  autocomplete="off" onClick="this.select()" value="" >
                                                    <span class="eye"><i class="fal fa-eye"></i> </span>
                                                </div>
                                                <div class="lost_password">
                                                    <a href="#">Lost Your Password?</a>
                                                </div>
                                                <div class="filter-tags">
                                                    <input id="check-a3" type="checkbox" name="check" >
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
                                                <form method="post"   name="registerform" class="main-register-form" id="main-register-form2" action="{{ route('register') }}">
                                                      @csrf
                                                    <label >Full Name  * <span class="dec-icon"><i class="fal fa-user"></i></span></label>
                                                    <input name="name" type="text"    onClick="this.select()" value="">
                                                    <label>Email Address  * <span class="dec-icon"><i class="fal fa-envelope"></i></span></label>
                                                    <input name="email" type="text"    onClick="this.select()" value="">
                                                    <div class="pass-input-wrap fl-wrap">
                                                        <label >Password  * <span class="dec-icon"><i class="fal fa-key"></i></span></label>
                                                        <input name="password" type="password"  autocomplete="off"  onClick="this.select()" value="" >
                                                        <span class="eye"><i class="fal fa-eye"></i> </span>
                                                    </div>
                                                    <!-- <div class="filter-tags ft-list">
                                                        <input id="check-a2" type="checkbox" name="check">
                                                        <label for="check-a2">I agree to the <a href="#">Privacy Policy</a> and <a href="#">Terms and Conditions</a></label>
                                                    </div> -->
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
                                    <a href="{{route('login_with_google')}}" class="facebook-log"> <span class="d-flex justify-content-center align-items-center">
                            <img class="avatar xs me-2" src="users/img/google.svg" height="15px" style="margin-right: 10px;" alt="Image Description">
                            Sign in with Google
                        </span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-register-wrap1 modal1">
                <div class="reg-overlay1"></div>
                <div class="main-register-holder1 tabs-act">
                     
                    <div class="main-register-wrapper1 modal1_main fl-wrap">
                        
                      
                        <div class="main-register1">
                             <img src="{{asset('homey/images/all/1.jpg')}}" style="width:100%;padding: 10px;" >
                            <div class="close-reg" ><i class="fal fa-times"></i></div>
                            <!-- <div class="show-reg-form modal-open"><i class="fas fa-user"></i><span>Sign In</span></div> -->
                            <div>
                                <img src="{{asset('homey/images/logo.png')}}" style="height:50px;width:120px;margin-bottom: 10px;">
                                <img src="{{asset('homey/images/all/1.jpg')}}" style="width:100%;padding: 10px;" >
                                <button class="modal-open">Register</button>
                            </div>
                               <!--tabs -->                       
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--register form end -->
            <!--secondary-nav -->
            <div class="secondary-nav">
                <ul>
                    <li><a href="{{ route('users-property-rent') }}" class="tolt" data-microtip-position="left"  data-tooltip="Rent Property"><i class="fal fa-truck-couch"></i> </a></li>
                      @if (Auth::guest())
                        <li><a href="#" class="tolt modal-open" data-microtip-position="left"   data-tooltip="ADD Property"> <i class="fal fa-shopping-bag"></i></a></li>

                      @else
                      <li><a href="{{ route('properties_list')}}" class="tolt" data-microtip-position="left"  data-tooltip="ADD Property"> <i class="fal fa-shopping-bag"></i></a></li>
                      @endif
                       @if (Auth::guest())
                    <li><a href="" class="tolt  modal-open" data-microtip-position="left"  data-tooltip="Your Compare"><i class="fal fa-exchange"></i></a></li>
                    @else
                       <li><a href="{{route('compare')}}" class="tolt" data-microtip-position="left"  data-tooltip="Your Compare"><i class="fal fa-exchange"></i></a></li>

                    @endif
                     <li><a href="{{route('explore')}}" class="tolt" data-microtip-position="left"  data-tooltip="EXPLORE"><i class="fal  fa-bars"></i></a></li>
                </ul>
                <div class="progress-indicator">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="-1 -1 34 34">
                        <circle cx="16" cy="16" r="15.9155"
                            class="progress-bar__background" />
                        <circle cx="16" cy="16" r="15.9155"
                            class="progress-bar__progress 
                            js-progress-bar" />
                    </svg>
                </div>
            </div>
            <!--secondary-nav end -->
            <a class="to-top color-bg"><i class="fas fa-caret-up"></i></a>   
            <!--map-modal -->
            <div class="map-modal-wrap">
                <div class="map-modal-wrap-overlay"></div>
                <div class="map-modal-item">
                    <div class="map-modal-container fl-wrap">
                        <h3> <span>Listing Title </span></h3>
                        <div class="map-modal-close"><i class="far fa-times"></i></div>
                        <div class="map-modal fl-wrap">
                            <div id="singleMap" data-latitude="40.7" data-longitude="-73.1"></div>
                            <div class="scrollContorl"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--map-modal end -->           
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script src="{{asset('homey/js/jquery.min.js')}}"></script>
        <script src="{{asset('homey/js/plugins.js')}}"></script>
        <script src="{{asset('homey/js/scripts.js')}}"></script>
    </body>
</html>