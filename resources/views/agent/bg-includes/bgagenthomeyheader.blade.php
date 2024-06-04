@php
use Illuminate\Support\Facades\DB;
@endphp
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>HOMEY :: Rentals</title>
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============--> 
         <link type="text/css" rel="stylesheet" href=" {{asset('agenthomey/css/plugins.css')}}">
        <link type="text/css" rel="stylesheet" href=" {{asset('agenthomey/css/style.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('agenthomey/css/dashboard-style.css')}}">
        <link type="text/css" rel="stylesheet" href=" {{asset('agenthomey/css/color.css')}}">
        <!-- <link type="text/css" rel="stylesheet" href=" {{asset('homey/css/custom.css')}}"> -->
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="{{asset('homey/images/favicon.png ')}}" style="height: 50px; width: 100%;">
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
                <div class="logo-holder"><a href="{{ route('agent.dashboard') }}"><img src="{{asset('agenthomey/images/logo.png')}}" alt=""></a></div>
                <!-- logo end  -->
                <!-- nav-button-wrap--> 
                <div class="nav-button-wrap color-bg nvminit">
                    <div class="nav-button">
                        <span></span><span></span><span></span>
                    </div>
                </div>
                <div class="dashboard-submenu" style="right: 30px;">
  
                   <div class="dashboard-submenu-title fl-wrap">Welcome, <span><a href="{{ route('agent.bgviewprofile') }}" onmouseover="this.style.color='#000';" onmouseout="this.style.color='#000';">{{DB::table('agents')->where(['agent_id' => Auth::guard('agent')->user()->agent_id])->pluck('name')->first();}}</a> </span></div>
                   <ul>
                        <!--<li><a href="dashboard.html"><i class="fal fa-chart-line"></i>Dashboard</a></li>-->
                        <!--<li><a href="dashboard-add-listing.html"> <i class="fal fa-file-plus"></i>Add Listing</a></li>-->
                        <li><a href="{{ route('agent.bgviewprofile') }}"><i class="fal fa-user-edit"></i>Profile Settings</a></li>
                    </ul>
                    <a href="{{ route('agent.logout')}}" class="color-bg db_log-out"><i class="fa fa-power-off"></i> Log Out</a>
                </div>
                <!-- nav-button-wrap end--> 
                <!-- header-search button  -->
               <!--  <div class="header-search-button">
                    <i class="fal fa-search"></i>
                    <span>Search...</span>
                </div> -->
                <!-- header-search button end  -->
                <!--  add new  btn -->
              <!--   <div class="add-list_wrap">
                    <a href="dashboard-add-listing.html" class="add-list color-bg"><i class="fal fa-plus"></i> <span>Add Listing</span></a>
                </div> -->
                <!--  add new  btn end -->
                <!--  header-opt_btn -->
               <!--  <div class="header-opt_btn tolt" data-microtip-position="bottom"  data-tooltip="Language / Currency">
                    <span><i class="fal fa-globe"></i></span>
                </div> -->
                <!--  header-opt_btn end -->
                <!--  cart-btn   -->
               <!--  <div class="cart-btn  tolt show-header-modal" data-microtip-position="bottom"  data-tooltip="Your Wishlist / Compare">
                    <i class="fal fa-bell"></i>
                    <span class="cart-btn_counter color-bg">5</span>
                </div> -->
                <!--  cart-btn end -->
                <!--  login btn -->
                    @php
                      $item=DB::table('agent_basic_information')->where('agent_id','=', Auth::guard('agent')->user()->agent_id)->first();
                      @endphp
                <div class="show-reg-form dasbdord-submenu-open"><img src="{{url('/uploads/agents/'.$item->file)}}" alt=""></div>
                <!--  login btn  end -->
                
                   
                <!--  navigation --> 
                <div class="nav-holder main-menu">
                    <nav>
                      <!--  <ul class="no-list-style">
                            <li >
                                <a href="{{route('users-dashboard')}}" class="act-link" >Home </a>
                                <!-second level ->   
                               <!-  <ul <i class="fa fa-caret-down" class="act-link"></i>>
                                    <li><a href="index.html">Parallax Image</a></li>
                                    <li><a href="index2.html">Slider</a></li>
                                    <li><a href="index3.html">Video</a></li>
                                    <li><a href="index4.html">Slideshow</a></li>
                                </ul> ->
                                <!-second level end->
                            </li>
                            <li>
                                <a class="act-link" href="{{ route('users-property-rent') }}">Properties </a>
                               
                            </li>
                            <li>
                                <a class="act-link" href="#">Services</a>
                               
                            </li>
                            <li>
                                <a class="act-link" href="blog.html">News</a>
                            </li>
                            <li>
                                <a class="act-link" href="{{route('users-about')}}">About Us <i class="fa fa-caret-down" style="color:#3270FC"></i></a>
                                <!-second level ->   
                                <ul>
                                     <li><a class="act-link" href="about.html">Careers</a></li>
                                    <li><a class="act-link" href="{{ route('users-contact') }}">Contacts</a></li>
                                    <li><a class="act-link" href="{{ route('helpfaq')}}">Help FAQ</a></li>
                                    <li><a class="act-link" href="pricing.html">Offers and Coupons </a></li>
                                   
                                </ul>
                                <!-second level end->                                
                            </li>
                        </ul> -->
                    </nav>
                </div>
                <!-- navigation  end -->
                <!-- header-search-wrapper -->
                <div class="header-search-wrapper novis_search">
                    <div class="header-serach-menu">
                        <div class="custom-switcher fl-wrap">
                            <div class="fieldset fl-wrap">
                                <input type="radio" name="duration-1"  id="buy_sw" class="tariff-toggle" checked>
                                <label for="buy_sw">Buy</label>
                                <input type="radio" name="duration-1" class="tariff-toggle"  id="rent_sw">
                                <label for="rent_sw" class="lss_lb">Rent</label>
                                <span class="switch color-bg"></span>
                            </div>
                        </div>
                    </div>
                    <div class="custom-form">
                        <form method="post"  name="registerform">
                            <label>Keywords </label>
                            <input type="text" placeholder="Address , Street , State..." value=""/>
                            <label >Categories</label>
                            <select data-placeholder="Categories" class="chosen-select on-radius no-search-select" >
                                <option>All Categories</option>
                                <option>House</option>
                                <option>Apartment</option>
                                <option>Hotel</option>
                                <option>Villa</option>
                                <option>Office</option>
                            </select>
                            <label style="margin-top:10px;" >Price Range</label>
                            <div class="price-rage-item fl-wrap">
                                <input type="text" class="price-range" data-min="100" data-max="100000"  name="price-range1"  data-step="1" value="1" data-prefix="$">
                            </div>
                            <button onclick="location.href='listing.html'" type="button"  class="btn float-btn color-bg"><i class="fal fa-search"></i> Search</button>
                        </form>
                    </div>
                </div>
                <!-- header-search-wrapper end  -->             
                <!-- wishlist-wrap--> 
                <div class="header-modal novis_wishlist tabs-act">
                    <ul class="tabs-menu fl-wrap no-list-style">
                        <li class="current"><a href="#tab-wish">  Wishlist <span>- 3</span></a></li>
                        <li><a href="#tab-compare">  Compare <span>- 2</span></a></li>
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
                                                <li>
                                                    <div class="widget-posts-img"><a href="listing-single.html"><img src="images/all/small/1.jpg" alt=""></a>  
                                                    </div>
                                                    <div class="widget-posts-descr">
                                                        <h4><a href="listing-single.html">Gorgeous house for sale</a></h4>
                                                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i>  70 Bright St New York, USA </a></div>
                                                        <div class="widget-posts-descr-price"><span>Price: </span> $ 52.100</div>
                                                        <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="widget-posts-img"><a href="listing-single.html"><img src="images/all/small/1.jpg" alt=""></a>
                                                    </div>
                                                    <div class="widget-posts-descr">
                                                        <h4><a href="listing-single.html">Family Apartments</a></h4>
                                                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> W 85th St, New York, USA </a></div>
                                                        <div class="widget-posts-descr-price"><span>Price: </span> $ 72.400</div>
                                                        <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- widget-posts end-->
                                    </div>
                                    <!-- header-modal-container end-->                                      
                                    <div class="header-modal-top fl-wrap">
                                        <a class="clear_wishlist color-bg" href="compare.html"><i class="fal fa-random"></i> Compare</a>
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
                            <h4>Currency: <span>USD</span></h4>
                            <div class="header-opt-modal-list fl-wrap">
                                <ul>
                                    <li><a href="#" class="current-lan" data-lantext="USD">USD</a></li>
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
        <div id="wrapper">
                <!-- dashbard-menu-wrap --> 
                <div class="dashbard-menu-overlay"></div>
                <div class="dashbard-menu-wrap">
                    <div class="dashbard-menu-close"><i class="fal fa-times"></i></div>
                    <div class="dashbard-menu-container">
                        <!-- user-profile-menu-->
                        <div class="user-profile-menu">
                            <h3>Main</h3>
                              <ul class="no-list-style">
                                <li><a href="{{ route('agent.dashboard') }}" class="user-profile" onmouseover="this.style.color='#000';" onmouseout="this.style.color='#000';"><i class='fa fa-dashboard'></i>Dashboard</a></li>
                                <li>
                                    <a href="{{ route('agent.bgproperties')}}" class="user-profile" onmouseover="this.style.color='#000';" onmouseout="this.style.color='#000';"><i class="fa fa-home"></i>All Properties</a>
                                   
                                </li>
                                  <li>
                                    <a href="{{ route('agent.bgallotedaplications')}}" class="user-profile" onmouseover="this.style.color='#000';" onmouseout="this.style.color='#000';"><i class='fa fa-files-o'></i>Recived Applications</a>
                                   
                                </li>
                               <!--  <li><a href="{{ route('agent.properties_report')}}"><i class="fal fa-user-edit"></i>Properties Report List</a></li>

                                 <li><a href="{{ route('agent.agent_properties')}}"><i class="fal fa-users"></i>Agent Properties</a></li>
                                  <li><a href="{{ route('agent.agent_properties')}}"><i class="fal fa-users"></i>Refer Agents</a></li>
                                   <li>
                                    <a href="#" class="submenu-link"><i class="fal fa-plus"></i>Agreements </a>
                                    <ul  class="no-list-style">
                                        <!- <li><a href="{{ route('admin.agreement')}}"><i class="fal fa-th-list"></i>   User Agreements</a></li> ->
                                        <li><a href="{{route('agent.agreement')}}"> <i class="fal fa-calendar-check"></i> Agent Agreements</a></li>
                                        <!- <li><a href="#"><i class="fal fa-comments-alt"></i>Submenu 2</a></li> ->
                                        <!- <li><a href="#"><i class="fal fa-file-plus"></i> Submenu 2</a></li> ->
                                    </ul>
                                </li> -->
                               

                                   <!--  <li><a href=""><i class="fal fa-users"></i> Agents </a></li>
                                   
                                    <li>
                                        <a href="#" class="submenu-link"><i class="fal fa-plus"></i>Submenu</a>
                                        <ul  class="no-list-style">
                                            <li><a href="#"><i class="fal fa-th-list"></i> Submenu 2 </a></li>
                                            <li><a href="#"> <i class="fal fa-calendar-check"></i> Submenu 2</a></li>
                                            <li><a href="#"><i class="fal fa-comments-alt"></i>Submenu 2</a></li>
                                            <li><a href="#"><i class="fal fa-file-plus"></i> Submenu 2</a></li>
                                        </ul>
                                    </li> -->
                            </ul>
                                </li>
                            </ul>
                        </div>
                       
                    </div>
                    <div class="dashbard-menu-footer">© Homey 2023 .  All rights reserved.</div>
                </div>