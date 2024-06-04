@extends("user.layouts.ownerdashboard")

@section  ("content")       
          
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
                            <div class="dashboard-title-item"><span>Your Property Listings</span></div>
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
                          
                            <!--Tariff Plan menu end-->						
                        </div>
                        <!-- dashboard-title end -->		
                        <div class="dasboard-wrapper fl-wrap">
                            <div class="dasboard-listing-box fl-wrap">
                                <div class="dasboard-opt sl-opt fl-wrap">
                                    <div class="dashboard-search-listing">
                                        <input type="text" onkeyup="search()" id="search-item" placeholder="Search" value="">
                                         <button type="submit"><i class="far fa-search"></i></button>
                                    </div>
                                    <a href="{{route('ownersadd-property-view')}}" class="gradient-bg dashboard-addnew_btn">Add New <i class="fal fa-plus"></i></a>	
                                    <!-- price-opt-->
                                  
                                    <!-- price-opt end-->
                                </div>
                                <!-- dashboard-listings-wrap-->
                                <div class="dashboard-listings-wrap fl-wrap" id="property-list">
                                    <div class="row">
                                        <!-- dashboard-listings-item-->
                                         @foreach ($intersted as  $item)
                                        <div class="col-md-6">
                                            <div class="dashboard-listings-item fl-wrap">
                                                <div class="dashboard-listings-item_img">
                                                    <div class="bg-wrap">
                                                        @php $bookmark = DB::table('property_images')->where('property_id', $item->property_id)
                                                ->first();
                                                 $imagescount = DB::table('property_images')->where('property_id', $item->property_id)
                                                ->count();
                                                @endphp
                                                @if (!empty($bookmark))
                                                   <div class="bg "  data-bg="{{url('/uploads/properties/'.$bookmark->image_name)}}"></div>
                                                     
                                                    @else
                                                       <div class="bg "  data-bg="{{url('/homey/images/dummyhome.png')}}"></div>
                                                    @endif
                                                    </div>
                                                    <div class="overlay"></div>
                                                    <a  href="{{ route('users-property-rent-details', $item->property_id) }}" class="color-bg">View</a>
                                                </div>
                                                <div class="dashboard-listings-item_content">
                                                    <h4><a  href="{{ route('users-property-rent-details', $item->property_id) }}">{{$item->name}} </a></h4>
                                                    <div class="geodir-category-location">
                                                        <a href="#" class="twolinetext"><i class="fas fa-map-marker-alt"></i> <span >{{$item->address}}</span></a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <!-- <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="right" data-tooltip="Good" data-starrating2="4"></div> -->
                                                    <div class="dashboard-listings-item_opt">
                                                      <span class="viewed-counter">@if($item->approval_status == 1)
                                                        <button type="button" style="padding: 10px; margin-top: -10px; border: none;border-radius:5px; background-color:green;color:white;">Approved</button>
                                                        @elseif($item->approval_status == 0)
                                                        <button type="button" style="padding: 10px; margin-top: -10px; border: none;border-radius:5px; background-color:orange;color:white;"  >Pending</button>
                                                        @else
                                                           <button type="button" style="padding: 10px; margin-top: -10px; border: none;border-radius:5px; background-color:red;color:white;"  >Rejected</button>
                                                        @endif</span>
                                                        <!-- <span class="viewed-counter"><i class="fas fa-eye"></i> Viewed -  645 </span> -->
                                                        <ul>
                                                            <li><a href="{{ route('owners-edit-properties',$item->property_id) }}" class="tolt" data-microtip-position="top-left"  data-tooltip="Edit"><i class="far fa-edit"></i></a></li>
                                                           @if($item->status == 0)
                                                            <li><a href="{{route('inactive',$item->property_id)}}" class="tolt" data-microtip-position="top-left"  data-tooltip="Disable"><i class="far fa-signal-alt-slash"></i></a></li>
                                                            @else
                                                             <li><a href="{{route('active',$item->property_id)}}" class="tolt" data-microtip-position="top-left"  data-tooltip="Enable"><i class="fa fa-signal" aria-hidden="true"></i></a></li>
                                                             @endif
                                                            <li><a href="{{route('deleteproperty',$item->property_id)}}" class="tolt" data-microtip-position="top-left"  data-tooltip="Delete"><i class="far fa-trash-alt"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                        <!-- dashboard-listings-item end--> 												
                                    </div>
                                </div>
                                <!-- dashboard-listings-wrap end-->
                            </div>
                            <!-- pagination-->
                            <div class="pagination float-pagination">
                                <!-- <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                <a href="#" >1</a>
                                <a href="#" class="current-page">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a> -->
                            </div>
                            <!-- pagination end-->	
                        </div>
                    </div>
                    <!-- dashboard-footer -->
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
                