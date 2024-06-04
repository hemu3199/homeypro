@extends("user.layouts.app")
  @php
                                                    $agent_details = DB::table('agent_basic_information')
                            ->where('agent_id', $property_rent_details->agent_id )
                            ->first();
                            
                            @endphp

                                        @php $agent = DB::table('homeyproperties')->where('property_id', $property_rent_details->property_id)
                            ->where('agent_id', $property_rent_details->agent_id )
                            ->first();

                            @endphp

@section  ("content")   
            <div id="wrapper">
                <!-- content -->	
                <div class="content">
                    <div class="breadcrumbs fw-breadcrumbs top-smpar smpar fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs-list">
                                <a href="{{route('users-dashboard')}}">Home</a><a href="{{ route('users-property-rent') }}">Listings</a><a href="#">{{$property_rent_details->city}}</a><span>Property Single</span>
                            </div>
                            <div class="show-more-snopt smact"><i class="fal fa-ellipsis-v"></i></div>
                            <div class="show-more-snopt-tooltip">
                                <!-- <a href="#sec15" class="custom-scroll-link"> <i class="fas fa-comment-alt"></i> Write a review</a> -->
                                <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                            </div>
                            <a class="print-btn tolt" href="javascript:window.print()" data-microtip-position="bottom"  data-tooltip="Print"><i class="fas fa-print"></i></a>
                              @if (Auth::guest())
                                   <a  class="compare-top-btn tolt modal-open" data-microtip-position="bottom"  data-tooltip="Compare" ><i class="fas fa-random"></i></a>
                              @else
                                    @php $compare = DB::table('compare')->where('user_id', Auth::guard('web')->user()->user_id)->count();
                                    @endphp
                                    @if ( $compare < 4)
                                    @php $compareadd = DB::table('compare')->where('property_id', $item->property_id)
                                        ->where('user_id', Auth::guard('web')->user()->user_id)
                                        ->count();
                                    @endphp
                                        @if($compareadd == 1 )
                                        <a class="compare-top-btn tolt" data-microtip-position="bottom"  data-tooltip="Compare" href="{{ route('compare') }}"><i class="fas fa-random"></i></a>  
                                        @else
                                        <a class="compare-top-btn tolt" data-microtip-position="bottom"  data-tooltip="Compare" href="{{route('compareadd',  $item->property_id)}}"><i class="fas fa-random"></i></a>  
                                        @endif
                                    @else
                                     <a href="{{ route('compare') }}" class="compare-top-btn tolt" data-microtip-position="bottom"  data-tooltip="Compare" ><i class="fas fa-random"></i></a>
                                    @endif
                             @endif 
                            
                            <!-- <div class="like-btn"><i class="fas fa-heart"></i> Save</div> -->
                        </div>
                    </div>
                    @if(session('message'))   
                      <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
                       @elseif(session('error'))
                       <div class="alert alert-success" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
                    @endif
                    <div class="gray-bg small-padding fl-wrap">
                        <div class="container">
                            <div class="row">
                                <!--  listing-single content -->
                                <div class="col-md-8">
                                    <div class="list-single-main-wrapper fl-wrap">
                                        <!--  scroll-nav-wrap -->
                                        <div class="scroll-nav-wrap">
                                            <nav class="scroll-nav scroll-init fixed-column_menu-init">
                                                <ul class="no-list-style">
                                                    <li><a class="act-scrlink" href="#sec1"><i class="fal fa-info"></i> </a><span>Details</span></li>

                                                    <li><a href="#sec2"><i class="fal fa-stars"></i></a><span>Features</span></li>
                                                    @if(!empty($room->count()))
                                                    <li><a href="#sec3"><i class="fal fa-bed"></i></a><span>Rooms</span></li>
                                                    @else
                                                    @endif
                                                    @if(!empty($property_rent_details->video_link))
                                                    <li><a href="#sec4"><i class="fal fa-video"></i></a><span>Video</span></li>
                                                    @endif
                                                    @if(!empty($property_rent_details->latitude))
                                                    <li><a href="#sec5"><i class="fal fa-map-pin"></i></a><span>Location</span></li>
                                                    @endif
                                                    @if(!empty($review_count))
                                                    <li><a href="#sec6"><i class="fal fa-comment-alt-lines"></i></a><span>Reviews</span></li>
                                                    @else
                                                    @endif
                                                    <!-- <li><a href="#sec6"><i class="fal fa-comment-alt-lines"></i></a><span>Reviews</span></li> -->
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
                                            </nav>
                                        </div>
                                        <!--  scroll-nav-wrap end-->
                                        <!--  list-single-opt_header-->
                                        <div class="list-single-opt_header fl-wrap">
                                            <ul class="list-single-opt_header_cat">
                                                <li><a href="#" class="cat-opt">Rent</a></li>
                                                <!-- <li><a href="#" class="cat-opt blue-bg">Sale</a></li> -->
                                                <li><a href="#" class="cat-opt ">{{$property_rent_details->categories}}</a></li>
                                            </ul>
                                            <div class="share-holder hid-share">
                                                <a href="#" class="share-btn showshare sfcs">  <i class="fas fa-share-alt"></i>  Share   </a>
                                              
                                               
                                                <div class="share-container  isShare">{!! $sharebutton !!}</div>
                                            </div>
                                        </div>
                                        <!--  list-single-opt_header end -->
                                        <!--  list-single-header-item-->
                                        <div class="list-single-header-item  fl-wrap" id="sec1">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h1>{{$property_rent_details->name}} <span class="verified-badge tolt" data-microtip-position="bottom"  data-tooltip="Verified"><i class="fas fa-check"></i></span></h1>
                                                    <div class="geodir-category-location fl-wrap">
                                                        <a href="#"><i class="fas fa-map-marker-alt"></i>{{$property_rent_details->address}}</a> 
                                                        <!-- <div class="listing-rating card-popup-rainingvis" data-starrating2="4"><span class="re_stars-title">Good</span></div> -->
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    @php 
                                                        $agent=DB::table('agents')->where('agent_id',$property_rent_details->agent_id)->first();
                                                        $agentbasicinformation=DB::table('agent_basic_information')->where('agent_id',$property_rent_details->agent_id)->first();
                                                        @endphp
                                                        @if(!empty($agent))
                                                   
                                                    <a class="host-avatar-wrap" href="#">
                                                    <span>By {{$agentbasicinformation->fname}}</span>
                                                    <img src="{{url('/uploads/agents/'.$agentbasicinformation->file)}}" alt="">
                                                    </a>
                                                    @else
                                                     <a class="host-avatar-wrap" href="#">
                                                    <span>By Homey</span>
                                                    <img src="{{asset('homey/images/favicon.png ')}}" alt="">
                                                    </a>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="list-single-header-footer fl-wrap">
                                                <div class="list-single-header-price " data-propertyprise="{{$property_rent_details->price}}"><strong>Rent:</strong><div class="inrusd">{{$property_rent_details->price}}</div></div>
                                                <div class="list-single-header-date"><span>Date:</span>{{$property_rent_details->updated_at}}</div>
                                                <div class="list-single-stats">
                                                    <ul class="no-list-style">
                                                        <!-- <li><span class="viewed-counter"><i class="fas fa-eye"></i> Viewed -  156 </span></li> -->
                                                        @php 
                                                        $bookmarkcount=DB::table('bookmark_property')->where('property_id',$property_rent_details->property_id)->count();
                                                        @endphp
                                                        <li><span class="bookmark-counter"><i class="fas fa-heart"></i> Bookmark -  {{$bookmarkcount}} </span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-single-main-media fl-wrap">
                                            <div class="single-slider-wrapper carousel-wrap fl-wrap">
                                                <div class="slider-for fl-wrap carousel lightgallery"  >
                                                    @if(!empty($images->count()))
                                                      @foreach($images as $key => $row)
                                                    <!--  slick-slide-item -->
                                                    <div class="slick-slide-item">
                                                        <div class="box-item">
                                                            <a href="{{url('/uploads/properties/'. $row->image_name)}}" class="gal-link popup-image"><i class="fal fa-search"  ></i></a>
                                                            <img src="{{url('/uploads/properties/'. $row->image_name)}}" alt="">
                                                        </div>
                                                    </div>
                                                    <!--  slick-slide-item end -->
                                                      @endforeach
                                                      @else
                                                        <div class="slick-slide-item">
                                                        <div class="box-item">
                                                            <a href="{{url('/homey/images/dummyhome.png')}}" class="gal-link popup-image"><i class="fal fa-search"  ></i></a>
                                                            <img src="{{url('/homey/images/dummyhome.png')}}" alt="">
                                                        </div>
                                                    </div>
                                                      @endif
                                                    
                                                </div>
                                                <div class="swiper-button-prev ssw-btn"><i class="fas fa-caret-left"></i></div>
                                                <div class="swiper-button-next ssw-btn"><i class="fas fa-caret-right"></i></div>
                                            </div>
                                            <div class="single-slider-wrapper fl-wrap">
                                                <div class="slider-nav fl-wrap">
                                                    @if(!empty($images))
                                                   @foreach($images as $key => $row)
                                                     <div class="slick-slide-item"><img src="{{url('/uploads/properties/'. $row->image_name)}}" alt=""></div>
                                                @endforeach
                                                @else
                                                <div class="slick-slide-item">
                                                    <img src="{{url('/homey/images/dummyhome.png')}}">
                                                </div>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-single-facts fl-wrap">
                                            <!-- inline-facts -->
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts">
                                                    <i class="fal fa-home-lg"></i>
                                                    <h6>Type</h6>
                                                    <span>{{$property_rent_details->categories}}</span>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->
                                            <!-- inline-facts  -->
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts">
                                                    <i class="fal fa-users"></i>
                                                    <h6>Accomodation</h6>
                                                    <span>{{$property_rent_details->accomodation}} Guest </span>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->
                                            <!-- inline-facts -->
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts">
                                                    <i class="fal fa-bed"></i>
                                                    <h6>Bedrooms</h6>
                                                    <span>{{$property_rent_details->bedrooms}}</span>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->
                                            <!-- inline-facts -->
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts">
                                                    <i class="fal fa-bath"></i>
                                                    <h6>Bathrooms</h6>
                                                    <span>{{$property_rent_details->bathrooms}}</span>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->                                                                        
                                        </div>
                                        <div class="list-single-main-container fl-wrap">
                                            <!-- list-single-main-item -->
                                            <div class="list-single-main-item fl-wrap">
                                                <div class="list-single-main-item-title">
                                                    <h3>About This Property</h3>
                                                </div>
                                                <div class="list-single-main-item_content fl-wrap">
                                                    <p>{{$property_rent_details->deatils_text}}</p>
                                                    <!-- <a href="#" class="btn float-btn color-bg">Visit Website</a> -->
                                                </div>
                                            </div>
                                            <!-- list-single-main-item end -->                                          
                                            <!-- list-single-main-item -->
                                            <div class="list-single-main-item fl-wrap" id="sec2">
                                                <div class="list-single-main-item-title">
                                                    <h3>Details</h3>
                                                </div>
                                                <div class="list-single-main-item_content fl-wrap">
                                                    <div class="details-list">
                                                        <ul>
                                                            <li><span>Property Id:</span>{{$property_rent_details->property_id}}</li>
                                                            <li><span>Property Lot Size:</span>{{$property_rent_details->area}}</li>
                                                            <li><span>Bathrooms:</span>{{$property_rent_details->bathrooms}}</li>
                                                            <li><span>Rooms:</span>1</li>
                                                            <li><span>Bedrooms:</span>{{$property_rent_details->bedrooms}}</li>
                                                            <li><span>Garage Size:</span>{{$property_rent_details->garage}} Sqft</li>
                                                            <li><span>Available from:</span>25.05.2020</li>
                                                            <li><span>Price:</span>{{$property_rent_details->price}}</li>
                                                            <li><span>Type:</span>{{$property_rent_details->categories}}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- list-single-main-item end -->  
                                            <!--   list-single-main-item -->
                                            @if(!empty($room->count()))
                                                   <div class="list-single-main-item fl-wrap" id="sec3">
                                                <div class="list-single-main-item-title fl-wrap">
                                                    <h3>Rooms Details</h3>
                                                </div>
                                                 @foreach($room as $key => $room)
                                                <div class="rooms-container fl-wrap">
                                                    <!--  rooms-item -->
                                                    <div class="rooms-item fl-wrap">
                                                        @php
                                                        $roomimagesdis=DB::table('room_images')->where('room_id',$room->room_id)->pluck('image_name')->first();
                                                        @endphp
                                                        @if(!empty( $roomimagesdis))
                                                        <div class="rooms-media">
                                                            @php
                                                            $roomimages=DB::table('room_images')->where('room_id',$room->room_id)->get();
                                                            @endphp
                                                            <img src="{{url('/uploads/properties/'.DB::table('room_images')->where('room_id',$room->room_id)->pluck('image_name')->first())}}" alt="">
                                                         <div class="dynamic-gal more-photos-button color-bg" data-dynamicPath="[ 
                                                            @foreach($roomimages as $key => $roomimage) 
                                                                {'src': '{{ url('/uploads/properties/' . $roomimage->image_name) }}'}, 
                                                            @endforeach 
                                                        ]">
                                                            <i class="fas fa-camera"></i> <span>{{ DB::table('room_images')->where('room_id', $room->room_id)->count() }} photos</span>
                                                        </div>
                                                        </div>
                                                        @else
                                                        <div class="rooms-media">
                                                           
                                                            <img src="{{url('/homey/images/dummyhome.png')}}" alt="">
                                                         <div class="dynamic-gal more-photos-button color-bg" data-dynamicPath="[]">
                                                            <i class="fas fa-camera"></i> <span>0</span>
                                                        </div>
                                                        </div>
                                                        @endif

                                                        <div class="rooms-details">
                                                            <div class="rooms-details-header fl-wrap">
                                                                <!-- <span class="rooms-area"><strong> / sq ft</strong></span> -->
                                                                <h3>{{$room->room_title}}</h3>
                                                                <h5>Additional Rooms: <span>{{$room->additional_room}}</span></h5>
                                                            </div>
                                                            <p>{{$room->room_details}}</p>
                                                            <div class="facilities-list fl-wrap">
                                                                <ul>
                                                                    @if(!empty($room->ac))
                                                                    <li class="tolt" data-microtip-position="top"  data-tooltip="Air conditioner"><i class="fal fa-snowflake"></i></li>
                                                                    @else
                                                                    @endif
                                                                    @if(!empty($room->tv))
                                                                    <li class="tolt" data-microtip-position="top"  data-tooltip="Tv Inside"><i class="fal fa-tv"></i> </li>
                                                                    @else
                                                                    @endif
                                                                    @if(!empty($room->cbath))
                                                                    <li class="tolt" data-microtip-position="top"  data-tooltip="Bed Inside"><i class="fal fa-bath"></i>
                                                                    </li>
                                                                    @else
                                                                    @endif
                                                                    @if(!empty($room->mic))
                                                                    <li class="tolt" data-microtip-position="top"  data-tooltip="Microwave"><i class="fal fa-microwave"></i>
                                                                    </li>
                                                                    @else
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                                                                  
                                                </div>
                                                @endforeach
                                               
                                                <!--   rooms-container end -->
                                                  </div>
                                                @else
                                               <!-- <img src="{{asset('homey/images/logo.png')}}"> -->
                                            
                                                 @endif
                                          
                                            <!-- list-single-main-item end -->											
                                            <!-- list-single-main-item -->
                                               @if(!empty($house->count()))
                                        <div class="list-single-main-item fl-wrap">
                                           
                                               <div class="list-single-main-item-title">
                                                    <h3>Floor Plans</h3>
                                                </div>
                                               @php $first = true @endphp

                                                @forelse($house as $key => $house)
                                                    <div class="accordion">
                                                        <a class="toggle  {{ $first ? ' act-accordion' : '' }}" href="#"> Floor Plan <strong> {{$house->plan_title}} </strong> <span></span>  </a>
                                                        <div class="accordion-inner{{ $first ? ' visible' : '' }}">
                                                            <img src="{{url('/uploads/properties/'.$house->plan_image)}}" alt="">
                                                            <p>{{$house->plan_details}}</p>
                                                        </div>
                                                    </div>
                                                    @php $first = false @endphp
                                                @empty
                                                    <div class="accordion">
                                                        <div class="accordion-inner">
                                                            <img src="{{asset('homey/images/na.png')}}" alt="">
                                                        </div>
                                                    </div>
                                                @endforelse

                                                  </div>
                                                  @else
                                            @endif
                                      
                                            <!-- list-single-main-item end -->                                             
                                            <!-- list-single-main-item -->
                                            @if(!empty($property_rent_details->video_link))
                                            <div class="list-single-main-item fl-wrap" id="sec4">
                                                <div class="list-single-main-item-title">
                                                    <h3>Video</h3>
                                                </div>
                                                <div class="list-single-main-item_content fl-wrap">
                                                    <div class="video-box fl-wrap">
                                                        <img src="{{asset('homey/images/bg/1.jpg')}}" class="respimg" alt="">
                                                        <a class="video-box-btn image-popup color-bg" href="{{$property_rent_details->video_link}}"><i class="fas fa-play"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            @endif
                                            <!-- list-single-main-item end -->                                             
                                            <!-- list-single-main-item -->
                                            <div class="list-single-main-item fl-wrap">
                                                <div class="list-single-main-item-title">
                                                    <h3>Features</h3>
                                                </div>
                                                <div class="list-single-main-item_content fl-wrap">
                                                    <div class="listing-features ">
                                                        <ul>
                                                          
                                                            <li><a href="#"><i class="fal fa-dumbbell"></i> Gym</a></li>
                                                          
                                                           @if(!empty($property_rent_details->wifi))
                                                            <li><a href="#"><i class="fal fa-wifi"></i> Wi Fi</a></li>
                                                             @else
                                                             @endif
                                                            @if(!empty($property_rent_details->parking))
                                                            <li><a href="#"><i class="fal fa-parking"></i> Parking</a></li>
                                                             @else
                                                                    @endif
                                                            @if(!empty($property_rent_details->ac))
                                                            <li><a href="#"><i class="fal fa-cloud"></i> Air Conditioned</a></li>
                                                             @else
                                                                    @endif
                                                            @if(!empty($property_rent_details->pool))
                                                            <li><a href="#"><i class="fal fa-swimmer"></i> Pool</a></li>
                                                             @else
                                                                    @endif
                                                            @if(!empty($property_rent_details->security))
                                                            <li><a href="#"><i class="fal fa-cctv"></i>  Security</a></li>
                                                             @else
                                                                    @endif
                                                            @if(!empty($property_rent_details->laundry_room))
                                                            <li><a href="#"><i class="fal fa-washer"></i> Laundry Room</a></li>
                                                             @else
                                                                    @endif
                                                            @if(!empty($property_rent_details->equipped_kitchen))
                                                            <li><a href="#"><i class="fal fa-utensils"></i> Equipped Kitchen</a></li>
                                                             @else
                                                                    @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- list-single-main-item end -->
                                            @if(!empty($property_rent_details->latitude))
                                            <!-- list-single-main-item -->
                                            <div class="list-single-main-item fw-lmi fl-wrap" id="sec5">
                                                <div class="map-container mapC_vis mapC_vis2">
                                                    <div id="singleMap" data-latitude="{{$property_rent_details->latitude}}" data-longitude="{{$property_rent_details->longitude}}" data-mapTitle="Our Location" data-infotitle="{{$property_rent_details->name}}" data-infotext="70 Bright St New York, USA"></div>
                                                  
                                                    <div class="scrollContorl"></div>
                                                </div>
                                                <input id="pac-input" class="controls fl-wrap controls-mapwn" autocomplete="on" type="text" placeholder="What Nearby? Schools, Gym... " value="">
                                            </div>
                                            @else
                                            @endif
                                            @if(!empty($review_count ))
                                            <div class="list-single-main-item fl-wrap" id="sec6">
                                                <div class="list-single-main-item-title">
                                                    <h3>Reviews <span>{{ $review_count }}</span></h3>
                                                </div>
                                                @php
                                                    $averageRating = App\Models\Reviews::where('property_id','=',$property_rent_details->property_id)->where('status',1)->avg('rating');
                                                @endphp
                                                <div class="list-single-main-item_content fl-wrap">
                                                    <div class="reviews-comments-wrap fl-wrap">
                                                        <div class="review-total">
                                                            <span class="review-number blue-bg">{{ number_format($averageRating, 1) }}</span>
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $averageRating }}"></div>
                                                        </div>
                                                        @foreach ($reviews as $review)
                                                            @php
                                                                $profilepic = \DB::table('user_basic_info')->where('user_id', $review['user_id'])->pluck('profile_pic')->first();
                                                            @endphp
                                                            <div class="reviews-comments-item">
                                                                <div class="review-comments-avatar">
                                                                @if(!empty($profilepic))
                                                                    <div class="popup-avatar"><img src="{{url('/uploads/user-profile/'.  $profilepic)}}" alt=""></div>
                                                                @else
                                                                    <div class="popup-avatar"><img src="{{asset('homey/images/dummy-profile-pic.png')}}" alt=""></div>
                                                                @endif
                                                                </div>
                                                                <div class="reviews-comments-item-text smpar">
                                                                    <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                                                    <div class="show-more-snopt-tooltip bxwt">
                                                                        <!-- <a href="#"> <i class="fas fa-reply"></i> Reply</a> -->
                                                                        <!-- <a class="usersreport-open" href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a> -->
                                                                    </div>
                                                                    <h4><a href="#">{{ $review->user_name }}</a></h4>
                                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $review->rating }}"> </div>
                                                                    <div class="clearfix"></div>
                                                                    <p>"{{ $review->message }}"</p>
                                                                    <div class="reviews-comments-item-date"><span class="reviews-comments-item-date-item"><i class="far fa-calendar-check"></i>
                                                                            {{ \Carbon\Carbon::parse($review->date)->format('jS') }}
                                                                            {{ \Carbon\Carbon::parse($review->date)->format('M') }}
                                                                            {{ \Carbon\Carbon::parse($review->date)->format('Y')}}
                                                                        @php
                                                                            $existingLike = \App\Models\LikeReview::where('review_id', $review->id)->where('property_id', $property_rent_details->property_id)->where('user_id', Auth::guard('web')->user()->user_id)->exists();
                                                                            $helpful_review_count = \App\Models\LikeReview::where('review_id', $review->id)->where('property_id', $property_rent_details->property_id)->count();
                                                                        @endphp
                                                                        @if (Auth::guest())
                                                                            </span><a href="#" class="rate-review modal-open"><i class="fal fa-thumbs-up"></i>  Helpful Review  <span>{{ $helpful_review_count }}</span> </a>
                                                                        @else
                                                                            @if ($existingLike)
                                                                            <!-- <p>You have already liked this review.</p> -->
                                                                                <a class="rate-review color-bg">
                                                                                    <i class="fal fa-thumbs-up" style="color: #fff;"></i><span style="color: #fff;">{{ $helpful_review_count }}</span>
                                                                                </a>
                                                                            @else
                                                                                <a href="{{ route('like.review', ['property_id' => $review->property_id, 'user_id' => Auth::guard('web')->user()->user_id, 'review_id' => $review->id]) }}" class="rate-review">
                                                                                    <i class="fal fa-thumbs-up"></i> Helpful Review  <span>{{ $helpful_review_count }}</span>
                                                                                </a>
                                                                            @endif
                                                                         @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                {!! $reviews->links() !!}
                                            </div>
                                            @else
                                            @endif
                                            @if($property_rent_details->user_id == auth()->user()->user_id)
                                            @else
                                             <!-- list-single-main-item -->
                                            <div class="list-single-main-item fl-wrap" id="sec15">
                                                <div class="list-single-main-item-title fl-wrap">
                                                    <h3>Add Your Review</h3>
                                                </div>
                                                <!-- Add Review Box -->
                                                <div id="add-review" class="add-review-box">
                                                    <!-- Review Comment -->
                                                    <form method="post" action="{{ route('reviews', $property_rent_details->property_id) }}" id="form" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="leave-rating-wrap">
                                                            <span class="leave-rating-title">Your Review* : </span>
                                                            <div class="leave-rating">
                                                                <input type="radio"    data-ratingtext="Excellent"   name="rating" id="rating-1" value="5"/>
                                                                <label for="rating-1" class="fal fa-star"></label>
                                                                <input type="radio" data-ratingtext="Good" name="rating" id="rating-2" value="4"/>
                                                                <label for="rating-2" class="fal fa-star"></label>
                                                                <input type="radio" name="rating"  data-ratingtext="Average" id="rating-3" value="3"/>
                                                                <label for="rating-3" class="fal fa-star"></label>
                                                                <input type="radio" data-ratingtext="Fair" name="rating" id="rating-4" value="2"/>
                                                                <label for="rating-4" class="fal fa-star"></label>
                                                                <input type="radio" data-ratingtext="Very Bad "   name="rating" id="rating-5" value="1"/>
                                                                <label for="rating-5"    class="fal fa-star"></label>
                                                            </div>
                                                            <div class="count-radio-wrapper">
                                                                <span id="count-checked-radio">Your Rating</span>
                                                            </div>
                                                        </div>
                                                        <div class="add-comment custom-form">
                                                            <fieldset>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Your name* <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                                                        <input   name="user_name" type="text"    onClick="this.select()" value="" required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Your Email* <span class="dec-icon"><i class="fas fa-envelope"></i></span></label>
                                                                        <input   name="user_email" type="text"    onClick="this.select()" value="" required>
                                                                    </div>
                                                                </div>
                                                                <textarea cols="40" rows="3" name="message" placeholder="Your Review*:" required></textarea>
                                                            </fieldset>
                                                            @if (Auth::guest())
                                                                <button class="btn big-btn color-bg float-btn modal-open">Submit Review <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                                            @else
                                                                <button class="btn big-btn color-bg float-btn">Submit Review <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                                            @endif
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- Add Review Box / End -->
                                            </div>
                                            @endif  
                                         </div>
                                    </div>
                                </div>
                              <div class="col-md-4">
                                 @if (!empty($agent->agent_id))
                                <div class="box-widget fl-wrap">
                                         <div class="profile-widget">
                                            <div class="profile-widget-header color-bg smpar fl-wrap">
                                                <div class="pwh_bg"></div>
                                                <div class="call-btn"><a href="tel:{{$agent_details->phoneno}}" class="tolt color-bg" data-microtip-position="right"  data-tooltip="Call Now"><i class="fas fa-phone-alt"></i></a></div>
                                                 @if (Auth::guest())
                                                <div class="box-widget-menu-btn modal-open"><i class="far fa-ellipsis-h"></i></div>
                                                @else
                                                <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                                @endif
                                               <div class="show-more-snopt-tooltip bxwt">
                                                <a href="#" class="review-open"> <i class="fas fa-comment-alt"></i> Write a review</a>
                                                <a href="#" class="report-open"> <i class="fas fa-exclamation-triangle"></i> Report </a> 
                                                </div>
                                                <div class="profile-widget-card">
                                                  
                                                    <div class="profile-widget-image">
                                                        <img src="{{url('/uploads/agents/'. $agent_details->file)}}" alt="">
                                                    </div>
                                                    <div class="profile-widget-header-title">
                                                        <h4><a href="agent-single.html">{{$agent_details->fname}}</a></h4>
                                                        <div class="clearfix"></div>
                                                        <div class="pwh_counter"><span>{{DB::table('homeyproperties')->where('property_id', $property_rent_details->property_id)
                                                        ->where('agent_id', $property_rent_details->agent_id )->where('approval_status','=', 1 )
                                                        ->count();}}</span>Property Listings</div>
                                                        <div class="clearfix"></div>
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="{{DB::table('agent_reviews')->where('property_id', $property_rent_details->property_id)
                                                        ->where('member_id', $property_rent_details->agent_id )
                                                        ->avg('rating')}}"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-widget-content fl-wrap">
                                                <div class="contats-list fl-wrap">
                                                    <ul class="no-list-style">
                                                        <li><span><i class="fal fa-phone"></i> Phone :</span> <a href="#">{{$agent_details->phoneno}}</a></li>
                                                        <li><span><i class="fal fa-envelope"></i> Mail :</span> <a href="#">{{$agent_details->username}}</a></li>
                                                        <li><span><i class="fal fa-browser"></i> Website :</span> <a href="#">{{$agent_details->url}}</a></li>
                                                    </ul>
                                                </div>
                                                <!-- <div class="profile-widget-footer fl-wrap">
                                                    <a href="agent-single.html" class="btn float-btn color-bg small-btn">View Profile</a>
                                                    <a href="#sec-contact" class="custom-scroll-link tolt" data-microtip-position="left"  data-tooltip="Viewing Property"><i class="fal fa-paper-plane"></i></a>
                                                </div> -->
                                            </div>
                                          </div>
                                        </div>
                                    @else
                                    <div class="box-widget fl-wrap">
                                            <div class="profile-widget">
                                            <div class="profile-widget-header color-bg smpar fl-wrap">
                                                <div class="pwh_bg"></div>
                                                <div class="call-btn"><a href="tel:123-456-7890" class="tolt color-bg" data-microtip-position="right"  data-tooltip="Call Now"><i class="fas fa-phone-alt"></i></a></div>
                                                  @if (Auth::guest())
                                                <div class="box-widget-menu-btn modal-open"><i class="far fa-ellipsis-h"></i></div>
                                                @else
                                                @if($property_rent_details->user_id == auth()->user()->user_id)
                                                @else
                                                <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                                @endif
                                                
                                                @endif
                                                <div class="show-more-snopt-tooltip bxwt">
                                                    <a href="#" class="review-open"> <i class="fas fa-comment-alt"></i> Write a review</a>
                                                    <a href="#" class="report-open"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                                </div>
                                                <div class="profile-widget-card">
                                                    <div class="profile-widget-image">
                                                        <img src="{{asset('homey/images/favicon.png ')}}" alt="">
                                                    </div>
                                                    <div class="profile-widget-header-title">
                                                        <h4><a href="#">Homey</a></h4>
                                                        <div class="clearfix"></div>
                                                        <div class="pwh_counter"><span>22</span>Property Listings</div>
                                                        <div class="clearfix"></div>
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-widget-content fl-wrap">
                                                <div class="contats-list fl-wrap">
                                                    <ul class="no-list-style">
                                                        <li><span><i class="fal fa-phone"></i> Phone :</span> <a href="#">147852369</a></li>
                                                        <li><span><i class="fal fa-envelope"></i> Mail :</span> <a href="#">Homey@gmail.com</a></li>
                                                        <li><span><i class="fal fa-browser"></i> Website :</span> <a href="#">homey.pro</a></li>
                                                    </ul>
                                                </div>
                                               <!--  <div class="profile-widget-footer fl-wrap">
                                                    <a href="agent-single.html" class="btn float-btn color-bg small-btn">View Profile</a>
                                                    <a href="#sec-contact" class="custom-scroll-link tolt" data-microtip-position="left"  data-tooltip="Viewing Property"><i class="fal fa-paper-plane"></i></a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                        @endif
                                                



                                                <!--box-widget end -->
                                              
                                                <div  style="margin: 30px 30px; float: left; width: 100%;">
                                         @if (Auth::guest())
                                        <a class="tablebtn color-bg modal-open" >I am interested</a>
                                        @else
                                        @php $interstedss = DB::table('interested_property')->where('property_id', $property_rent_details->property_id)
                                        ->where('user_id', Auth::guard('web')->user()->user_id)
                                        ->first();
                                        @endphp
                                        @if($property_rent_details->user_id== Auth::guard('web')->user()->user_id)
                                        @else
                                        @if (!empty($interstedss->user_id))
                                        <a class="tablebtn color-bg" style="color:#fff; background:black; border: 2px solid black;">Applied</a>
                                        @else
                                        <a href="{{ route('user-interstedproperty', $property_rent_details->property_id) }}"
                                        class="tablebtn color-bg"
                                        style="position: relative; margin-top: 0px; margin-left: 25px;">
                                        I am interested
                                        </a>
                                        @endif
                                        @endif
                                        @endif
                                    </div>
                                    <!--box-widget-->
                                    <div class="box-widget fl-wrap">
                                        <div class="box-widget-title fl-wrap">Featured Properties</div>
                                        <div class="box-widget-content fl-wrap">
                                            <!--widget-posts-->
                                            <div class="widget-posts  fl-wrap">
                                                <ul class="no-list-style">
                                                      @foreach ($property_rent as  $item)
                                                    <li>
                                                         @php 
                                                       $bookmark = DB::table('property_images')->where('property_id', $item->property_id)
                                                        ->first();
                                                        $imagescount = DB::table('property_images')->where('property_id', $item->property_id)
                                                        ->count();
                                                        @endphp
                                                        @if (!empty($bookmark))
                                                        <div class="widget-posts-img"><a href="{{ route('users-property-rent-details', $item->property_id) }}"><img src="{{url('/uploads/properties/'.$bookmark->image_name)}}" alt=""></a>  
                                                        </div>
                                                        @else
                                                        <div class="widget-posts-img"><a href="{{ route('users-property-rent-details', $item->property_id) }}"><img src="{{url('/uploads/properties/'.$item->image)}}" alt=""></a>  
                                                        </div>
                                                        @endif
                                                        <div class="widget-posts-descr">
                                                            <h4><a href="listing-single.html">{{ optional($item)->name}}</a></h4>
                                                            <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> {{ optional($item)->address}}</a></div>
                                                            <div class="widget-posts-descr-price"><span>Price: </span><div class="inrusd">{{ optional($item)->price}}</div></div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                    
                                                </ul>
                                            </div>
                                            <!-- widget-posts end-->                                                           
                                            <a href="{{ route('users-property-rent') }}" class="btn float-btn color-bg small-btn">View All Properties</a>
                                        </div>
                                    </div>
                                    <!--box-widget end --> 
                                    <!--box-widget-->
                                    <div class="box-widget fl-wrap hidden-section" style="margin-top: 30px">
                                        <div class="box-widget-content fl-wrap color-bg">
                                            <div class="color-form reset-action">
                                                <div class="color-form-title fl-wrap">
                                                    <h4>Rental Emi Calculator </h4>
                                                    <p> </p>
                                                </div>
                                                <form method="post"  name="mortgage-form">
                                                    <div class="fl-wrap">
                                                        <label for="amt">Loan Amount </label>   
                                                        <input  id="amt" name="amt" type="text"  placeholder="0"    value="0"> 
                                                        <div class="use-current-price tolt" data-microtip-position="left" data-tooltip="Use current price"><i class="fal fa-tag"></i></div>
                                                    </div>
                                                    <label for="apr">Percentage rate</label>
                                                    <div class="price-rage-item fl-wrap">
                                                        <input type="text" id="apr" name="apr" class="price-range" data-min="0" data-max="100"    data-step="1" value="0" data-prefix="%">
                                                    </div>
                                                    <label for="trm">Loan Term (Years) </label>
                                                    <div class="price-rage-item fl-wrap">
                                                        <input type="text" id="trm" name="trm" class="price-range" data-min="0" data-max="5"    data-step="1" value="0" data-prefix="Y">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <button type="button" id="sbt" class="color2-bg">Calculate</button>
                                                    <div class="reset-form reset-btn"> <i class="far fa-sync-alt"></i> Reset Form</div>
                                                    <div class="monterage-title fl-wrap">
                                                        <h5>Monthly payment:</h5>
                                                        <input type="text" id="pmt" name="mPmt" value="0"> 
                                                        <div class="monterage-title-item"><span class="inrusd"></span></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--box-widget end -->                                   
                                    <!--box-widget-->
                                    @if(!empty( $property_rent_details->p_image))
                                    <div class="box-widget fl-wrap">
                                        <div class="box-widget-title fl-wrap">Propertie Documents</div>
                                        <div class="box-widget-content fl-wrap">
                                            <div class="bwc_download-list">
                                                <a href="{{ route('downloadFile', $property_rent_details->property_id) }}" download><span><i class="fal fa-file-pdf"></i></span>Property Presentation</a>
                                                <!-- <a href="#" download><span><i class="fal fa-file-word"></i></span>Energetic Certificate</a> -->
                                                <!-- <a href="#" download><span><i class="fal fa-file-pdf"></i></span>Property Plans</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <!--box-widget end --> 
                                    @else
                                    @endif                               
                                    <!--box-widget-->
                                    <div class="box-widget fl-wrap">
                                        <div class="box-widget-fixed-init fl-wrap" id="sec-contact">
                                            <div class="box-widget-title fl-wrap box-widget-title-color color-bg">Contact Property</div>
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
                                    <!--box-widget end -->                                   
                                </div>
                                <!--  sidebar end-->                            
                            </div>
                            <div class="fl-wrap limit-box"></div>
                            @if(!empty($similar->count()))
                            <div class="listing-carousel-wrapper carousel-wrap fl-wrap">
                                <div class="list-single-main-item-title">
                                    <h3>Similar Properties</h3>
                                </div>
                                <div class="listing-carousel carousel ">

                                    @foreach($similar as $key => $row)
                                    <!-- slick-slide-item -->
                                    <div class="slick-slide-item">
                                        <!-- listing-item -->
                                        <div class="listing-item">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img fl-wrap">
                                                       @php 
                                                       $bookmark = DB::table('property_images')->where('property_id', $row->property_id)
                                                        ->first();
                                                        $imagescount = DB::table('property_images')->where('property_id', $row->property_id)
                                                        ->count();
                                                        @endphp
                                                        @if (!empty($bookmark))
                                                                        <a  href="{{ route('users-property-rent-details', $row->property_id) }}" class="geodir-category-img_item">
                                                                            <img src="{{url('/uploads/properties/'.$bookmark->image_name)}}" alt="" style="height: 200px;">
                                                                            <div class="overlay"></div>
                                                                        </a>
                                                        @else
                                                         <a  href="{{ route('users-property-rent-details', $row->property_id) }}" class="geodir-category-img_item">
                                                                            <img src="{{url('/homey/images/dummyhome.png')}}" alt="" style="height: 200px;">
                                                        <div class="overlay"></div>
                                                    </a>
                                                    @endif
                                                    <div class="geodir-category-location">
                                                        <a href="#4" class="map-item"><i class="fas fa-map-marker-alt"></i> {{$row->address}} </a>
                                                    </div>
                                                    <ul class="list-single-opt_header_cat">
                                                        <li><a href="#" class="cat-opt ">Rent</a></li>
                                                        <li><a href="#" class="cat-opt ">{{$row->categories}}</a></li>
                                                    </ul>
                                                    @if (Auth::guest())
                                                    <a  class="geodir_save-btn tolt  modal-open" data-microtip-position="left" data-tooltip="Save"><span><i class="fal fa-heart"></i></span></a>
                                                    @else
                                                        @php $bookmarks = DB::table('bookmark_property')->where('property_id', $item->property_id)
                                                        ->where('user_id', Auth::guard('web')->user()->user_id)
                                                        ->first();
                                                        @endphp
                                                    @if (!empty($bookmarks->user_id))
                                                    <a class="geodir_save-btn tolt " style="background-color: Black;" data-microtip-position="left" data-tooltip="All Ready Bookmarked"  ><span><i class="fal fa-heart" ></i></span></a>
                                                      
                                                    @else
                                                    <a href="{{ route('users-property-bookmark', $item->property_id) }}" class="geodir_save-btn tolt" data-microtip-position="left" data-tooltip="Bookmark" ><span><i class="fal fa-heart"></i></span></a>
                                                       
                                                    @endif
                                                    @endif
                                                    @if (Auth::guest())
                                                     <a class="compare-btn tolt modal-open" data-microtip-position="left" data-tooltip="Compare"><span><i class="fal fa-random"></i></span></a>
                                                     @else
                                                    @php $compare = DB::table('compare')
                                                        ->where('user_id', Auth::guard('web')->user()->user_id)
                                                        ->count();
                                                    @endphp
                                                    @if ( $compare < 4)
                                                         @php $compareadd = DB::table('compare')->where('property_id', $item->property_id)
                                                            ->where('user_id', Auth::guard('web')->user()->user_id)
                                                            ->count();
                                                        @endphp
                                                        @if($compareadd == 1 )
                                                         <a class="compare-btn tolt "  href="{{ route('compare') }}" data-microtip-position="left" data-tooltip="Added To Compare"><span><i class="fal fa-random"></i></span></a >  
                                                        @else
                                                        <a href="{{route('compareadd',  $item->property_id)}}" class="compare-btn tolt" data-microtip-position="left" data-tooltip="Compare"><span><i class="fal fa-random"></i></span></a >  
                                                        @endif
                                                    @else
                                                    <a href="{{ route('compare') }}" class="compare-btn tolt" data-microtip-position="left" data-tooltip="Compare" ><span><i class="fal fa-random"></i></span></a>
                                                    @endif
                                                 @endif 
                                                    
                                                    <div class="geodir-category-listing_media-list">
                                                        @if(!empty($imagescount))
                                                        <span><i class="fas fa-camera"></i> {{$imagescount}} </span>
                                                        @else
                                                         <span><i class="fas fa-camera"></i> 1 </span>
                                                         @endif
                                                    </div>
                                                </div>
                                                <div class="geodir-category-content fl-wrap">
                                                    <h3><a href="{{ route('users-property-rent-details', $row->property_id) }}">{{$row->name}}</a></h3>
                                                    <div class="geodir-category-content_price">{{$row->price}}</div>
                                                    <p>{{$row->key_words}}</p>
                                                    <div class="geodir-category-content-details">
                                                        <ul>
                                                            <li><i class="fal fa-bed"></i><span>3</span></li>
                                                            <li><i class="fal fa-bath"></i><span>2</span></li>
                                                            <li><i class="fal fa-cube"></i><span>450 ft2</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="geodir-category-footer fl-wrap">
                                                          @php 
                                                        $agent=DB::table('agents')->where('agent_id',$item->agent_id)->first();
                                                        $agentbasicinformation=DB::table('agent_basic_information')->where('agent_id',$item->agent_id)->first();
                                                        @endphp
                                                        @if(!empty($agent))
                                                        <a href="agent-single.html" class="gcf-company"><img src="{{url('/uploads/agents/'.$agentbasicinformation->file)}}" alt=""><span>By {{$agentbasicinformation->fname}}</span></a>
                                                        <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="Good" data-starrating2="4"></div>
                                                        @else
                                                          <a href="#" class="gcf-company"><img src="{{asset('homey/images/favicon.png ')}}" alt=""><span>By Homey</span></a>
                                                        <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="Good" data-starrating2="4"></div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <!-- listing-item end-->							
                                    </div>
                                    <!-- slick-slide-item end-->
                                    @endforeach
                                 								
                                </div>
                                <div class="swiper-button-prev lc-wbtn lc-wbtn_prev"><i class="far fa-angle-left"></i></div>
                                <div class="swiper-button-next lc-wbtn lc-wbtn_next"><i class="far fa-angle-right"></i></div>
                            </div>
                            @else
                            @endif
                        </div>
                    </div>
                </div>
                <!-- content end -->	
                <!-- subscribe-wrap -->	
                <div class="subscribe-wrap fl-wrap">
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


                <div class="main-register-wrap review">
                <div class="reg-overlay"></div>
                <div class="main-register-holder ">
                    <div class="main-register-wrapper modal_main fl-wrap">
                        <div class="main-register"  style="width:100%;border-radius:10px ;">
                            <div class="reviewclose"><i class="fal fa-times"></i></div>
                             <div class="list-single-main-item fl-wrap" id="faq3">
                                 <!-- <div class="list-single-main-item fl-wrap" id="sec15"> -->
                                            <div class="list-single-main-item-title fl-wrap">
                                                    <h3>Add Agent Review</h3>
                                                </div>
                                                <!-- Add Review Box -->
                                                <div id="add-review" class="add-review-box">
                                                    @php
                                                    if(!empty($property_rent_details->agent_id))
                                                    $member_id=$property_rent_details->agent_id;
                                                    elseif(!empty($property_rent_details->user_id))
                                                    $member_id=$property_rent_details->user_id;
                                                    else
                                                    $member_id='Admin';
                                                  
                                                    @endphp
                                                    <form action="{{ route('add-agent-review', ['property_id' => $property_rent_details->property_id, 'member_id' => $member_id]) }}"  method="post" >
                                                        @csrf

                                                    <div class="leave-rating-wrap">
                                                        <span class="leave-rating-title">Your rating  for this listing : </span>
                                                        <div class="leave-rating">
                                                            <input type="radio"    data-ratingtext="Excellent"   name="rating" id="rating-1" value="1"/>
                                                            <label for="rating-1" class="fal fa-star"></label>
                                                            <input type="radio" data-ratingtext="Good" name="rating" id="rating-2" value="2"/>
                                                            <label for="rating-2" class="fal fa-star"></label>
                                                            <input type="radio" name="rating"  data-ratingtext="Average" id="rating-3" value="3"/>
                                                            <label for="rating-3" class="fal fa-star"></label>
                                                            <input type="radio" data-ratingtext="Fair" name="rating" id="rating-4" value="4"/>
                                                            <label for="rating-4" class="fal fa-star"></label>
                                                            <input type="radio" data-ratingtext="Very Bad "   name="rating" id="rating-5" value="5"/>
                                                            <label for="rating-5"    class="fal fa-star"></label>
                                                        </div>
                                                        <div class="count-radio-wrapper">
                                                            <span id="count-checked-radio">Your Rating</span>  
                                                        </div>
                                                    </div>
                                                    <!-- Review Comment -->
                                                    <div class="add-comment custom-form">
                                                        <fieldset>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Your name* <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                                                    <input   name="name" type="text"    onClick="this.select()" value="">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Yourmail* <span class="dec-icon"><i class="fas fa-envelope"></i></span></label>
                                                                    <input   name="email" type="text"    onClick="this.select()" value="">
                                                                </div>
                                                            </div>
                                                            <textarea cols="40" rows="3" placeholder="Your Review:" name="review"></textarea>
                                                        </fieldset>
                                                        <button class="btn big-btn color-bg float-btn">Submit Review <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                                    </div>
                                                     </form>
                                                </div>
                                                <!-- Add Review Box / End -->
                                            <!-- </div> -->
                                           
                            </div>              
                        </div>
                    </div>
                </div>
            </div>

            // Make report on agent
              <div class="main-register-wrap report">
                <div class="reg-overlay"></div>
                <div class="main-register-holder ">
                    <div class="main-register-wrapper modal_main fl-wrap">
                        <div class="main-register"  style="width:100%;border-radius:10px ;">
                            <div class="reportclose"><i class="fal fa-times"></i></div>
                             <div class="list-single-main-item fl-wrap" id="faq3">
                                 <!-- <div class="list-single-main-item fl-wrap" id="sec15"> -->
                                            <div class="list-single-main-item-title fl-wrap">
                                                    <h3>Report</h3>
                                            </div>
                                                <!-- Add Review Box -->
                                                <div id="add-review" class="add-review-box">
                                                    @php
                                                    if(!empty($property_rent_details->agent_id))
                                                    $member_id=$property_rent_details->agent_id;
                                                    elseif(!empty($property_rent_details->user_id))
                                                    $member_id=$property_rent_details->user_id;
                                                    else
                                                    $member_id='Admin';
                                                    @endphp
                                                    <form action="{{ route('add-agent-report', ['property_id' => $property_rent_details->property_id, 'member_id' => $member_id]) }}"  method="post" >
                                                        @csrf
                                                    <!-- Review Comment -->
                                                    <div class="add-comment custom-form">
                                                        <fieldset>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Your name* <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                                                    <input   name="name" type="text"    onClick="this.select()" value="">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Yourmail* <span class="dec-icon"><i class="fas fa-envelope"></i></span></label>
                                                                    <input   name="email" type="text"    onClick="this.select()" value="">
                                                                </div>
                                                            </div>
                                                            <textarea cols="40" rows="3" placeholder="Your Report Message:" name="report_message"></textarea>
                                                        </fieldset>
                                                        <button class="btn big-btn color-bg float-btn">Submit Report <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                                    </div>
                                                     </form>
                                                </div>
                                                <!-- Add Review Box / End -->
                                            <!-- </div> -->
                                           
                            </div>              
                        </div>
                    </div>
                </div>
            </div>
                <!-- footer -->	
@endsection