@extends("user.layouts.ownerdashboard")

@section  ("content")    	
          
                <!-- dashbard-menu-wrap end  -->		
                <!-- content -->	
                <div class="dashboard-content">
                     @if(session('message'))   
                      <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
                       @elseif(session('error'))
                       <div class="alert alert-success" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
                    @endif
                      @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul >
                            @foreach ($errors->all() as $error)
                                <li style="color: red;font-size:15px">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->	
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item"><span>Owner Dashboard</span></div>
                               <div class="dashbard-menu-header">
                                <div class="dashbard-menu-avatar fl-wrap">
                                      @php
                                $profilepic=DB::table('user_basic_info')->where(['user_id' => auth()->user()->user_id])->pluck('profile_pic')->first();
                                @endphp
                                @if(!empty(  $profilepic))
                                                           
                                    <img src="{{url('/uploads/user-profile/'.$profilepic)}}" alt="">
                                    @else
                                    <img src="{{asset('homey/images/dummy-profile-pic.png')}}" alt="">
                                    @endif
                                    <h4>Welcome, <span> {{ Auth::user()->name }}</span></h4>
                                </div>
                                <a href="{{('logout')}}" class="log-out-btn   tolt" data-microtip-position="bottom"  data-tooltip="Log Out"><i class="far fa-power-off"></i></a>
                            </div>
                            <!--Tariff Plan menu-->
                            <div class="tfp-det-container">
                                <!-- <div   class="tfp-btn"><span>Your Tariff Plan : </span> <strong>Extended</strong></div>
                                <div class="tfp-det">
                                    <p>You Are on <a href="#">Extended</a> . Use link bellow to view details or upgrade. </p>
                                    <a href="#" class="tfp-det-btn color-bg">Details</a>
                                </div> -->
                            </div>
                            <!--Tariff Plan menu end-->						
                        </div>
                        <!-- dashboard-title end -->		
                        <div class="dasboard-wrapper fl-wrap no-pag">
                            <div class="dashboard-stats-container fl-wrap">
                                <div class="row">
                                    <!--dashboard-stats-->
                                    <div class="col-md-3">
                                        <div class="dashboard-stats fl-wrap">
                                            <i class="fal fa-map-marked"></i>
                                            <h4>Owner Properties</h4>
                                            <div class="dashboard-stats-count">{{ $propertys }}</div>
                                        </div>
                                    </div>
                                    <!-- dashboard-stats end -->
                                    <!--dashboard-stats-->
                                    <div class="col-md-3">
                                        <div class="dashboard-stats fl-wrap">
                                            <i class="fal fa-chart-bar"></i>
                                            <h4>Intersted Property</h4>
                                            <div class="dashboard-stats-count">{{ $intersted }}</div>
                                        </div>
                                    </div>
                                    <!-- dashboard-stats end -->
                                    <!--dashboard-stats-->
                                    <div class="col-md-3">
                                        <div class="dashboard-stats fl-wrap">
                                            <i class="fal fa-comments-alt"></i>
                                            <h4>Applications</h4>
                                            <div class="dashboard-stats-count">{{$application}}</div>
                                        </div>
                                    </div>
                                    <!-- dashboard-stats end -->
                                    <!--dashboard-stats-->
                                    <div class="col-md-3">
                                        <div class="dashboard-stats fl-wrap">
                                            <i class="fal fa-heart"></i>
                                            <h4>Bookmarks</h4>
                                            <div class="dashboard-stats-count">{{ $bookmark }}</div>
                                        </div>
                                    </div>
                                    <!-- dashboard-stats end -->		
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-8">
                                   <!--  <div class="notification success-notif  fl-wrap">
                                        <p>Your listing <a href="#">Family house in Brooklyn</a> has been approved!</p>
                                        <a class="notification-close" href="#"><i class="fal fa-times"></i></a>
                                    </div> -->
                                     <div class="box-widget fl-wrap">
                                        <div class=" fl-wrap" id="sec-contact">
                                            <div class="box-widget-title fl-wrap box-widget-title-color color-bg">Contact Us</div>
                                            <div class="box-widget-content fl-wrap">
                                                <div class="custom-form">
                                                   <form method="post" action="{{ route('users-contactstore') }}" id="form" enctype="multipart/form-data">
                                                     @csrf
                                                        <label>Your Name  * <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                                        <input   name="name" type="text"    onClick="this.select()" value="" required> 
                                                        <label>Your phone  * <span class="dec-icon"><i class="fas fa-phone"></i></span></label>
                                                        <input   name="phone" type="text"    onClick="this.select()" value="" required>      
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Date   <span class="dec-icon"><i class="fas fa-calendar-check"></i></span></label>
                                                                <div class="date-container fl-wrap">
                                                                    <input type="text" placeholder="" style="padding: 16px 5px 16px 60px;"     name="datepicker-here"   value=""/>                                                 
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Time  </label>
                                                                <select data-placeholder="9 AM" name="time" class="chosen-select on-radius no-search-select" >
                                                                    <option value="09:00">9 AM</option>
                                                                    <option value="10:00">10 AM</option>
                                                                    <option value="11:00">11 AM</option>
                                                                    <option value="12:00">12 AM</option>
                                                                    <option value="13:00">13 PM</option>
                                                                    <option value="14:00">14 PM</option>
                                                                    <option value="15:00"> 15 PM</option>
                                                                    <option value="16:00">16 PM</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn float-btn color-bg fw-btn"> Send</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dashboard-widget-title fl-wrap"></div>
                                    <div class="dashboard-list-box  fl-wrap">
                                         
                                  
                                       
                                      
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!--box-widget-->
                                     <div class="dasboard-widget fl-wrap">
                                        <div class="dasboard-widget-title fl-wrap">
                                            <h5><i class="fas fa-home"></i>Your Latest Properties</h5>
                                        </div>
                                        <div class="chat-contacts fl-wrap">
                                            <!-- chat-contacts-item-->
                                         @foreach ($latest_properties as  $item)
                                            <a class="chat-contacts-item" href="{{ route('users-property-rent-details', $item->property_id) }}">
                                                <div class="dashboard-message-avatar">
                                                     @php 
                                                        $bookmark = DB::table('property_images')->where('property_id', $item->property_id)
                                                    ->first();
                                                    @endphp
                                                    @if (!empty($bookmark))
                                                      <img src="{{url('/uploads/properties/'.$bookmark->image_name)}}" alt="" >
                                                    @else
                                                    <img src="{{url('/homey/images/dummyhome.png')}}" alt="">                                                     
                                                    @endif
                                                 
                                                    <!-- <div class="message-counter"></div> -->
                                                </div>
                                                <div class="chat-contacts-item-text">
                                                    <h4>{{ optional($item)->name}}</h4>
                                                    @php
                                                    $date=$item->created_at;
                                                    $formattedDate = date('Y-m-d', strtotime($date));
                                                    @endphp
                                                    <span>{{$formattedDate}} </span>
                                                    <p>{{ optional($item)->key_words}}.</p>
                                                </div>
                                            </a>
                                              @endforeach
                                           
                                        </div>
                                    </div>
                                    <!--box-widget end -->								
                                    <!--box-widget-->
                                    <div class="box-widget fl-wrap">
                                        <div class="banner-widget fl-wrap">
                                            <div class="bg-wrap bg-parallax-wrap-gradien">
                                                <div class="bg  "  data-bg="images/all/blog/1.jpg"></div>
                                            </div>
                                            <div class="banner-widget_content">
                                                <h5>Participate in our loyalty program. Refer a friend and get a discount.</h5>
                                                <a href="#" class="btn float-btn color-bg small-btn">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--box-widget end --> 								
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-footer">
                        <div class="dashboard-footer-links fl-wrap">
                            <span>Helpfull Links:</span>
                           <ul>
                                <li><a href="{{ route('users-about') }}">About </a></li>
                                <li><a href="{{ route('referal') }}">Pricing Plans</a></li>
                                <li><a href="{{ route('users-contact') }}">Contacts</a></li>
                                <li><a href="{{ route('helpfaq') }}">Help Center</a></li>
                            </ul>
                        </div>
                        <a href="#main" class="dashbord-totop custom-scroll-link"><i class="fas fa-caret-up"></i></a>
                    </div>
                    <!-- dashboard-footer end -->   

@endsection