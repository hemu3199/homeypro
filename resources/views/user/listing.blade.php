<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!-- basic   -->
        <meta charset="UTF-8">
        <title>HOMEY :: Rentals</title>
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!-- css   -->	
      <link type="text/css" rel="stylesheet" href=" {{asset('homey/css/plugins.css')}}">
      <link type="text/css" rel="stylesheet" href=" {{asset('homey/css/style.css')}}">
          <link type="text/css" rel="stylesheet" href=" {{asset('homey/css/color.css')}}">
          <link type="text/css" rel="stylesheet" href=" {{asset('homey/css/custom.css')}}">
        <!--  favicons  -->
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
    <div id="main" >
         <!-- wrapper  -->	
            <div class="listbackgroundimage">
                <div class="col-md-12" >
                    <div class="col-md-6">
                        <div class="listinglogodiv">
                            <a href="{{route('users-dashboard')}}"><img src="{{asset('homey/images/logo.png')}}" class="listinglogoimage" alt=""></a>
                        </div>      
                        <div class="listing-text-div">
                            <h2 class="listing-first-heading">LOOKING FOR THE </h2>
                            <h2 class="listing-second-heading" > RIGHT </h2>
                            <h2  class="listing-second-heading" >PROPERTY</h2>
                        </div>
                        <div class="listing-para-div">
                            <p>Homey offers a convenient and user-friendly portal, making it easy for owners, tenants to interact with property managers, rent collection, offers valuable insights into property performance, report issues, and access essential property-related information.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6" >

                                    <div class="listone" >
             
                                    <div class="listonereg tabs-act" >
                                        <div class=" fl-wrap" >
                                         
                                            <div class="listmainreg" style="background: #3270fc;">
                                                
                                                <ul class="tabs-menu fl-wrap no-list-style">
                                                      @if (Auth::guest())
                                                        <li class="current"><a href="#tab-1"> Agent</a></li>
                                                        <li><a href="#tab-2"> Owner</a></li>
                                                      @else
                                                       @php 
                                                       $already_a_owner=DB::table('homeyproperties')->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->where('user_id',Auth::guard('web')->user()->user_id)->first();
                                                       @endphp
                                                       @if(!empty($already_a_owner))
                                                       <li class="current"><a href="#tab-1"> Agent</a></li>
                                                       @else
                                                       <li class="current"><a href="#tab-1"> Agent</a></li>
                                                        <li><a href="#tab-2"> Owner</a></li>
                                                       @endif

                                                       @endif

                                                  
                                                </ul>
                                                <!--tabs -->                       
                                                <div class="tabs-container">
                                                    <div class="tab">
                                                        <!--tab -->
                                                        <div id="tab-1" class="tab-content first-tab">
                                                            <div class="custom-form">
                                                                @if(session('message'))   
                                                                  <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:10px;color:white; ">{{session('message')}}</div>
                                                                   @elseif(session('error'))
                                                                   <div class="alert alert-success" style="padding:10px;width:100%;color:red;font-size:15px;background-color:white; ">{{session('error')}}</div>
                                                                @endif
                                                                @if ($errors->any())
                                                                    <div class="alert alert-danger">
                                                                        <ul style="background-color:white;"
                                                                    >
                                                                            @foreach ($errors->all() as $error)
                                                                                <li style="color:red;">{{ $error }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endif

                                                                <form method="post" action="{{route('agentlisting')}}">
                                                                    @csrf
                                                                    <h5 ><b>Become A Agent</b></h5>
                                                                    <label style="color:white">Your Name  * <span class="dec-icon" style="background:#3270fc;color:white;left:1px;border-radius:8px 0 0 8px"><i class="fal fa-user"></i></span></label>
                                                                    <input name="name" type="text"  placeholder="Your Name "  onClick="this.select()" value="" style="background-color: white;border-radius: 10px;">
                                                                    <label style="color:white">Your Mail  * <span class="dec-icon" style="background:#3270fc;color:white;left:1px;border-radius:8px 0 0 8px"><i class="fal fa-envelope"></i></span></label>
                                                                    <input name="email" type="email"  placeholder="Your Mail"  onClick="this.select()" value="" style="background-color: white;border-radius: 10px;">
                                                                    <label style="color:white">Your Mobile Number  * <span class="dec-icon" style="background:#3270fc;color:white;left:1px;border-radius:8px 0 0 8px"><i class="fal fa-phone"></i></span></label>
                                                                    <input name="mobile_no" type="text"  placeholder="Your Mobile Number"  onClick="this.select()" value="" style="background-color: white;border-radius: 10px;">
                                                                    <label style="color:white">Your City  * <span class="dec-icon" style="background:#3270fc;color:white;left:1px;border-radius:8px 0 0 8px"><i class="fal fa-map-marker"></i></span></label>
                                                                    <input name="city" type="text"  placeholder="Your City"  onClick="this.select()" value="" style="background-color: white;border-radius: 10px;">
                                                                   <div class="clearfix"></div>
                                                                    <button type="submit"  class="addadge " style="margin-bottom: 20px;"> Send Message </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!--tab end -->
                                                        <!--tab -->
                                                        <div class="tab">
                                                            <div id="tab-2" class="tab-content">
                                                                <div class="custom-form">
                                                                     
                                                                    <form method="post"  action="{{route('ownerlisting')}}">
                                                                        @csrf
                                                                         <h5><b>Become A Owner</b></h5>
                                                                   <label style="color:white">Your Name  * <span class="dec-icon" style="background:#3270fc;color:white;left:1px;border-radius:8px 0 0 8px"><i class="fal fa-user"></i></span></label>
                                                                    <input name="name" type="text"  placeholder="Your Name "  onClick="this.select()" value="" style="background-color: white;border-radius: 10px;">
                                                                    <label style="color:white">Your Mail  * <span class="dec-icon" style="background:#3270fc;color:white;left:1px;border-radius:8px 0 0 8px"><i class="fal fa-envelope"></i></span></label>
                                                                    <input name="email" type="email"  placeholder="Your Mail"  onClick="this.select()" value="" style="background-color: white;border-radius: 10px;">
                                                                    <label style="color:white">Your Mobile Number  * <span class="dec-icon" style="background:#3270fc;color:white;left:1px;border-radius:8px 0 0 8px"><i class="fal fa-phone"></i></span></label>
                                                                    <input name="mobile_no" type="text"  placeholder="Your Mobile Number"  onClick="this.select()" value="" style="background-color: white;border-radius: 10px;">
                                                                    <label style="color:white">Your City  * <span class="dec-icon" style="background:#3270fc;color:white;left:1px;border-radius:8px 0 0 8px"><i class="fal fa-map-marker"></i></span></label>
                                                                    <input name="city" type="text"  placeholder="Your City"  onClick="this.select()" value="" style="background-color: white;border-radius: 10px;">
                                                                   <div class="clearfix"></div>
                                                                    <button type="submit"  class="addadge " style="margin-bottom: 20px;"> Send Message </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--tab end -->
                                                    </div>
                                                    <!--tabs end -->
                                                  <!--   <div class="log-separator fl-wrap"><span>or</span></div>
                                                    <div class="soc-log fl-wrap">
                                                        <p>For faster login or register use your social account.</p>
                                                        <a href="#" class="facebook-log"> Facebook</a>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            <!-- </div> -->
                                        
                                    </div>
                </div>
                <div style="height:400px">

                    
                </div>
                <div style="
    /* background-color: white; */
    border-radius: 10px;
    border-left: 2207px solid transparent;
    border-right: 0px solid transparent;
    border-bottom: 200px solid #fff;"> 
                    
                </div>

                    <div style="height: 150px;width: 100%; background-color: white;">
                        
                    </div>
            </div>
    </div>

        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script src="{{asset('homey/js/jquery.min.js')}}"></script>
        <script src="{{asset('homey/js/plugins.js')}}"></script>
        <script src="{{asset('homey/js/scripts.js')}}"></script>

    </body>
</html>