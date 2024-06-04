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
                <div class="logo-holder"><a href="{{ route('admin.dashboard')}}"><img src="{{asset('adminhomey/images/logo.png')}}" alt=""></a></div>
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
                $profilepic=DB::table('admin_basic_information')->where(['admin_id' => Auth::guard('admin')->user()->id])->pluck('profile_image')->first();
                @endphp
                @if(!empty($profilepic))
                <div class="show-reg-form dasbdord-submenu-open"><img src="{{url('/uploads/admins/'.  $profilepic)}}" alt=""></div>
                @else
                <div class="show-reg-form dasbdord-submenu-open"><a href="{{ route('admin.dashboard')}}"><img src="{{asset('adminhomey/images/logo.png')}}" alt=""></a></div>
                @endif
                
                <!--  login btn  end -->
                <!--  dashboard-submenu-->
              <div class="dashboard-submenu">
                    <div class="dashboard-submenu-title fl-wrap">Welcome,
                        <span>{{Auth::guard('admin')->user()->name}}</span>
                    </div>
                    <ul>
                        <li>
                            @php
                            $admin_id = Auth::guard('admin')->user()->id;
                            $record = DB::table('admin_basic_information')->where('admin_id', $admin_id)->first();
                            @endphp
                            @if ($record)
                            <a href="{{ route('admin.viewprofile') }}"><i class="fal fa-user"></i> Profile Settings</a><br><br>
                            @else
                            <a href="{{ route('admin.add.profile.details') }}"><i class="fal fa-user-edit"></i> Add Profile Details</a><br><br>
                            @endif
                        </li>
                    </ul>
                    <a href="{{ route('admin.logout')}}" class="color-bg db_log-out"><i class="fa fa-power-off"></i> Log Out</a>
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
                                <li><a href="{{ route('admin.dashboard')}}" class="user-profile"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                                <li>
                                    <a href="{{ route('admin.properties')}}" class="user-profile"><i class="fa fa-home"></i>Properties</a>
                                   
                                </li>
                                <li>
                                    <a href="{{ route('admin.adminproperties')}}" class="user-profile"><i class="fa fa-house-chimney-user"></i>Admin Properties</a>
                                   
                                </li>
                                <li><a href="{{ route('admin.properties_report')}}"><i class="fa fa-file-lines"></i>Properties Report</a></li>
                                 <li><a href="{{ route('admin.agentlist')}}"><i class="fa fa-users"></i> Agents List</a>
                                 </li>
                                 <li><a href="{{ route('admin.bgagentlist')}}"><i class="fal fa-users"></i>BG Agents List</a>
                                 </li>

                                <li>
                                    <a href="#" class="submenu-link"><i class="fa fa-circle-plus"></i>Contact Us Response</a>
                                    <ul  class="no-list-style">
                                        <li><a href="{{ route('admin.usercontactusresponse')}}"><i class="fa fa-headset"></i> User Response </a></li>
                                        <li><a href="{{ route('admin.agentcontactusresponse')}}"><i class="fa fa-headset"></i> Agent Response </a></li>
                                        <li><a href="{{ route('admin.bgagentcontactusresponse')}}"><i class="fa fa-headset"></i> Bg Agent Response </a></li>
                                      
                                    </ul>
                                </li>
                                 <li>
                                    <a href="{{ route('admin.intrested_user_responses')}}"><i class="fa fa-users"></i>Intrested User Responsee</a>
                                
                                </li>
                                <li>
                                    <a href="{{ route('admin.approvalproperties')}}" ><i class="fa fa-house-circle-check"></i>Approval Properties Request</a>
                                   
                                </li>
                                 <li>
                                    <a href="#" class="submenu-link"><i class="fa fa-handshake-angle"></i>Agreements </a>
                                    <ul  class="no-list-style">
                                        <li><a href="{{ route('admin.agreement')}}"><i class="fa fa-file-shield"></i>   User Agreements</a></li>
                                        <li><a href="{{ route('admin.agentagreement')}}"> <i class="fa fa-file-shield"></i> Agent Agreements</a></li>
                                      
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="submenu-link"><i class="fa fa-circle-plus"></i>Become A Member </a>
                                    <ul  class="no-list-style">
                                        <li><a href="{{ route('admin.becomeowner')}}"><i class="fa fa-user-tie "></i>Owner's Request </a></li>
                                        <li><a href="{{ route('admin.becomeagent')}}"> <i class="fa fa-user-secret"></i> Agent's Request </a></li>
                                        
                                    </ul>
                                </li>
                                
                                 <li>
                                    <a href="{{ route('admin.deleted-properties')}}" class="user-profile"><i class="fa fa-house-circle-xmark"></i>Deleted Properties</a>
                                   
                                </li>
                                 <li>
                                    <a href="{{ route('admin.cities')}}" class="user-profile"><i class="fa fa-city"></i>Add Cities</a>
                                   
                                </li>
                                <li>
                                    <a href="{{ route('admin.application-list')}}" class="user-profile"><i class="fa fa-list"></i>Application List</a>
                                </li>
                                 <li>
                                    
                                    <a href="#" class="submenu-link"><i class="fa fa-circle-plus"></i>Send Applications </a>
                                    <ul  class="no-list-style">
                                        <li><a href="{{ route('admin.send-user-properties-report')}}"><i class="fa fa-house-chimney-user"></i>Users Properties</a></li>
                                        <li><a href="{{ route('admin.send-agent-properties-report')}}"><i class="fa fa-house-chimney-user"></i>Agent Properties</a></li>
                                        <li><a href="{{ route('admin.send-admin-properties-report')}}"><i class="fa fa-house-chimney-user"></i>Admin Properties</a></li>

                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('admin.testimonials')}}" class="user-profile"><i class="fa fa-ranking-star"></i>Testimonials</a>
                                </li>
                                <li>
                                    <a href="#" class="submenu-link"><i class="fa fa-circle-plus"></i>Agents Reports and Reviews
                                    </a>
                                    <ul  class="no-list-style">
                                        <li><a href="{{ route('admin.agents-report')}}"><i class="fa fa-person-circle-exclamation"></i>Reports</a></li>
                                        <li><a href="{{ route('admin.agents-reviews')}}"> <i class="fa fa-person-circle-check"></i>Reviews </a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('admin.reviews')}}" class="user-profile"><i class="fa fa-house-circle-check"></i>Properties Reviews</a>
                                </li>

                            </ul>
                        </div>
                      
                        <!-- user-profile-menu end--> 
                    </div>
                    <div class="dashbard-menu-footer">© Homey 2022 .  All rights reserved.</div>
                </div>
    <!-- start: page toolbar -->