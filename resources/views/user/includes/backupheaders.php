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
                <div class="header-opt_btn tolt" data-microtip-position="bottom"  data-tooltip=" Currency">
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
                @php
                $profilepic=DB::table('user_basic_info')->where(['user_id' => auth()->user()->user_id])->pluck('profile_pic')->first();
                @endphp
                @if(!empty(  $profilepic))
                <div class="show-reg-form dasbdord-submenu-open"><img src="{{url('/uploads/user-profile/'.  $profilepic)}}" alt=""></div>
                @else
                <div class="show-reg-form dasbdord-submenu-open"><img src="{{asset('homey/images/dummy-profile-pic.png')}}" alt=""></div>
                 @endif
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
                                        <!--     <li>
                                                <div class="widget-posts-img"><a href="listing-single.html"><img src="{{asset('homey/images/all/small/1.jpg')}}" alt=""></a>  
                                                </div>
                                                <div class="widget-posts-descr">
                                                    <h4><a href="listing-single.html">Affordable Urban Room</a></h4>
                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 40 Journal Square  , NJ, USA</a></div>
                                                    <div class="widget-posts-descr-price inrusd"><span>Price: </span>  1500 </div>
                                                    <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="widget-posts-img"><a href="listing-single.html"><img src="images/all/small/1.jpg" alt=""></a>
                                                </div>
                                                <div class="widget-posts-descr">
                                                    <h4><a href="listing-single.html">Family House</a></h4>
                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 34-42 Montgomery St , NY, USA</a></div>
                                                    <div class="widget-posts-descr-price inrusd"><span>Price: </span>  50.000</div>
                                                    <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="widget-posts-img"><a href="listing-single.html"><img src="images/all/small/1.jpg" alt=""></a>
                                                </div>
                                                <div class="widget-posts-descr">
                                                    <h4><a href="listing-single.html">Apartment to Rent</a></h4>
                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i>75 Prince St, NY, USA</a></div>
                                                    <div class="widget-posts-descr-price "><span>Price: </span><div class="inrusd"> 100</div></div>
                                                    <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                                </div>
                                            </li> -->
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
                                                        <div class="widget-posts-descr-price"><span>Price: </span><div class="inrusd">{{DB::table('homeyproperties')->where('property_id',$row->property_id)->pluck('price')->first();}}  </div></div>
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
                            <!-- <h4>Language: <span>EN</span></h4> -->
                           <!--  <div class="header-opt-modal-list fl-wrap">
                                <ul>
                                    <li><a href="#" class="current-lan" data-lantext="EN">English</a></li>
                                    <li><a href="#" data-lantext="FR">Franais</a></li>
                                    <li><a href="#" data-lantext="ES">Espaol</a></li>
                                    <li><a href="#" data-lantext="DE">Deutsch</a></li>
                                </ul>
                            </div> -->
                        </div>
                           <div class="header-opt-modal-item currency-item fl-wrap">
                <h4>Currency: <span id="selectedCurrency">INR</span></h4>
                <div class="header-opt-modal-list fl-wrap">
                    <ul>
                        <li><a href="#"  data-lantext="INR">INR</a></li>
                        <li><a href="#" data-lantext="USD">USD</a></li>
                    </ul>
                </div>
                 </div>
                            </div>
                        </div>
                <!--header-opt-modal end -->  
            </header>




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

                      @if (Auth::guest())
                      <a href="{{route('listing')}}" class="add-list color-bg"><i class="fal fa-plus"></i> <span>Add Listing</span></a>
                      @else
                       @php 
                       $already_a_owner=DB::table('homeyproperties')->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->where('user_id',Auth::guard('web')->user()->user_id)->first();
                       @endphp
                       @if(!empty($already_a_owner))
                       <a href="{{route('listing')}}" class="add-list color-bg"><i class="fal fa-plus"></i> <span>Beacome a Agent</span></a>
                       @else
                        <a href="{{route('listing')}}" class="add-list color-bg"><i class="fal fa-plus"></i> <span>Add Listing</span></a>
                       @endif

                    @endif
                </div>
                <!--  add new  btn end -->
                <!--  header-opt_btn -->
                <div class="header-opt_btn tolt" data-microtip-position="bottom"  data-tooltip=" Currency">
                    <span><i class="fa fa-money"></i></span>
                </div>
                <!--  header-opt_btn end -->
                <!--  cart-btn   -->
                <div class="cart-btn  tolt show-header-modal" data-microtip-position="bottom"  data-tooltip="Your Compare">
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
                @php
                $profilepic=DB::table('user_basic_info')->where(['user_id' => auth()->user()->user_id])->pluck('profile_pic')->first();
                @endphp
                @if(!empty(  $profilepic))
                <div class="show-reg-form dasbdord-submenu-open"><img src="{{url('/uploads/user-profile/'.  $profilepic)}}" alt=""></div>
                @else
                <div class="show-reg-form dasbdord-submenu-open"><img src="{{asset('homey/images/dummy-profile-pic.png')}}" alt=""></div>
                 @endif

                <div class="dashboard-submenu">
                    <div class="dashboard-submenu-title fl-wrap">Welcome,
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
                                    <!-- <li><a class="act-link" href="about.html">Careers</a></li> -->
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
                        <!-- <li class="current"><a href="#tab-wish">  Wishlist <span>- 3</span></a></li> -->
                        @if (Auth::guest())
                        <li  class="current"><a href="#tab-compare">  Compare <span>-0</span></a></li>
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
                                        <!--     <li>
                                                <div class="widget-posts-img"><a href="listing-single.html"><img src="{{asset('homey/images/all/small/1.jpg')}}" alt=""></a>  
                                                </div>
                                                <div class="widget-posts-descr">
                                                    <h4><a href="listing-single.html">Affordable Urban Room</a></h4>
                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 40 Journal Square  , NJ, USA</a></div>
                                                    <div class="widget-posts-descr-price inrusd"><span>Price: </span>  1500 </div>
                                                    <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="widget-posts-img"><a href="listing-single.html"><img src="images/all/small/1.jpg" alt=""></a>
                                                </div>
                                                <div class="widget-posts-descr">
                                                    <h4><a href="listing-single.html">Family House</a></h4>
                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 34-42 Montgomery St , NY, USA</a></div>
                                                    <div class="widget-posts-descr-price inrusd"><span>Price: </span>  50.000</div>
                                                    <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="widget-posts-img"><a href="listing-single.html"><img src="images/all/small/1.jpg" alt=""></a>
                                                </div>
                                                <div class="widget-posts-descr">
                                                    <h4><a href="listing-single.html">Apartment to Rent</a></h4>
                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i>75 Prince St, NY, USA</a></div>
                                                    <div class="widget-posts-descr-price "><span>Price: </span><div class="inrusd"> 100</div></div>
                                                    <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                                </div>
                                            </li> -->
                                        </ul>
                                    </div>
                                    <!-- widget-posts end-->
                                </div>
                                <!-- header-modal-container end--> 
                                <div class="header-modal-top fl-wrap">
                                    <!-- <div class="clear_wishlist color-bg"><i class="fal fa-trash-alt"></i> Clear all</div> -->
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
                                                        <div class="widget-posts-descr-price"><span>Price: </span><div class="inrusd">{{DB::table('homeyproperties')->where('property_id',$row->property_id)->pluck('price')->first();}}  </div></div>
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
                                        @if(Auth::guest())
                                        <a class="clear_wishlist color-bg modal-open"><i class="fal fa-random"></i> Compare</a>
                                        @else
                                        <a class="clear_wishlist color-bg" href="{{route('compare')}}"><i class="fal fa-random"></i> Compare</a>
                                        @endif
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
                            <!-- <h4>Language: <span>EN</span></h4> -->
                           <!--  <div class="header-opt-modal-list fl-wrap">
                                <ul>
                                    <li><a href="#" class="current-lan" data-lantext="EN">English</a></li>
                                    <li><a href="#" data-lantext="FR">Franais</a></li>
                                    <li><a href="#" data-lantext="ES">Espaol</a></li>
                                    <li><a href="#" data-lantext="DE">Deutsch</a></li>
                                </ul>
                            </div> -->
                        </div>
                           <div class="header-opt-modal-item currency-item fl-wrap">
                    <h4>Currency: <span id="selectedCurrency">INR</span></h4>
                    <div class="header-opt-modal-list fl-wrap">
                        <ul>
                            <li><a href="#"  data-lantext="INR">INR</a></li>
                            <li><a href="#" data-lantext="USD">USD</a></li>
                        </ul>
                    </div>
                </div>
                                </div>
                </div>
                <!--header-opt-modal end -->  
            </header>