@php
use Illuminate\Support\Facades\DB;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive Bootstrap 5 admin dashboard template & web App ui kit.">
  <meta name="keyword" content="LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects, Hospital Admin, CRM Admin, Events, Fitness, Music, Inventory, Job Portal">
        <link rel="shortcut icon" href="{{asset('homey/images/favicon.png ')}}" style="height: 50px; width: 100%;">
  <title>:: Homey :: Dashboard</title>
  <!-- Application vendor css url -->
  <link rel="stylesheet" href="{{asset('adminhomey/assets/cssbundle/daterangepicker.min.css')}}">
  <!-- project css file  -->
  <link rel="stylesheet" href="{{asset('adminhomey/assets/css/luno-style.css')}}">
  <!-- Jquery Core Js -->
  <script src="{{asset('adminhomey/assets/js/plugins.js')}}"></script>
   <link type="text/css" rel="stylesheet" href="{{asset('adminhomey/css/plugins.css')}}">
            <link type="text/css" rel="stylesheet" href="{{asset('adminhomey/css/style.css')}}">
            <link type="text/css" rel="stylesheet" href="{{asset('adminhomey/css/dashboard-style.css')}}">
            <link type="text/css" rel="stylesheet" href="{{asset('adminhomey/css/color.css')}}">
               <link type="text/css" rel="stylesheet" href="{{asset('adminhomey/css/custom.css')}}">
             <link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
</head>

<body class="layout-1" data-luno="theme-blue">
  <!-- start: sidebar -->
  
  
      <header class="main-header">
                <!--  logo  -->
                <div class="logo-holder"><a href="{{ route('agent.dashboard') }}"><img src="{{asset('homey/images/logo.png')}}" alt=""></a></div>
                <!-- logo end  -->
                <!-- nav-button-wrap--> 
                <div class="nav-button-wrap color-bg nvminit">
                    <div class="nav-button">
                        <span></span><span></span><span></span>
                    </div>
                </div>
                <!-- nav-button-wrap end--> 
                <!-- header-search button  -->
               <!--  <div class="header-search-button">
                    <i class="fal fa-search"></i>
                    <span>Search...</span>
                </div> -->
                <!-- header-search button end  -->
                <!--  add new  btn -->
               <!--  <div class="add-list_wrap">
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
                <!--  dashboard-submenu-->
                <div class="dashboard-submenu">
                    <div class="dashboard-submenu-title fl-wrap">Welcome, <span><a href="{{ route('agent.bgviewprofile') }}" onmouseover="this.style.color='#000';" onmouseout="this.style.color='#000';">{{DB::table('agents')->where(['agent_id' => Auth::guard('agent')->user()->agent_id])->pluck('name')->first();}}</a> </span></div>
                   <ul>
                        <!--<li><a href="dashboard.html"><i class="fal fa-chart-line"></i>Dashboard</a></li>-->
                        <!--<li><a href="dashboard-add-listing.html"> <i class="fal fa-file-plus"></i>Add Listing</a></li>-->
                        <li><a href="{{ route('agent.bgviewprofile') }}"><i class="fal fa-user-edit"></i>Profile Settings</a></li>
                    </ul> 
                    <a href="{{ route('agent.logout')}}" class="color-bg db_log-out" onmouseover="this.style.color='#000';" onmouseout="this.style.color='#000';"><i class="fa fa-power-off"></i> Log Out</a>
                </div>
                <!--  dashboard-submenu  end -->
                <!--  navigation --> 
               <!--  -->
                <!-- navigation  end -->
                <!-- header-search-wrapper -->
                
                <!-- header-search-wrapper end  -->       
                <!-- wishlist-wrap--> 
                <div class="header-modal novis_wishlist tabs-act">
                    <ul class="tabs-menu fl-wrap no-list-style">
                    <!--     <li class="current"><a href="#tab-wish">  Wishlist <span>- 3</span></a></li>
                        <li><a href="#tab-compare">  Compare <span>- 2</span></a></li> -->
                    </ul>
                    <!--tabs -->                       
                    
                </div>
                <!--wishlist-wrap end -->                            
                <!--header-opt-modal-->  
               
                <!--header-opt-modal end -->  
    </header>
<!--  -->
  <!-- start: body area -->
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
                                <!-- <li><a href="{{ route('agent.properties_report')}}"><i class="fal fa-user-edit"></i>Properties Report List</a></li>

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
                        </div>
                        <!-- user-profile-menu end-->
                        <!-- user-profile-menu-->
                       <!--  <div class="user-profile-menu">
                            <h3>Listings</h3>
                            <ul  class="no-list-style">
                                <li><a href="dashboard-listing-table.html"><i class="fal fa-th-list"></i> My listigs  </a></li>
                                <li><a href="dashboard-bookings.html"> <i class="fal fa-calendar-check"></i> Bookings <span>2</span></a></li>
                                <li><a href="dashboard-review.html"><i class="fal fa-comments-alt"></i> Reviews </a></li>
                                <li><a href="dashboard-add-listing.html"><i class="fal fa-file-plus"></i> Add New</a></li>
                            </ul>
                        </div> -->
                        <!-- user-profile-menu end--> 
                    </div>
                    <div class="dashbard-menu-footer">© HOMEY 2023 .  All rights reserved.</div>
                </div>
    <!-- start: page toolbar -->