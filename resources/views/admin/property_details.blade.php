@extends("admin.layouts.app")

@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('title', 'Agent Properties')
@section  ("content")
    <div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container1 dasboard-container1">
                        @if(session('message'))   
                          <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
                           @elseif(session('error'))
                           <div class="alert alert-danger" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
                        @endif
                            <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
                                     <div class="container-fluid">
                                 <!-- .row end -->
                                            <div class="row align-items-center">
                                              <!-- <div class="col">
                                                <h1 class="fs-5 color-900 mt-1 mb-0">Welcome back, Allie!</h1>
                                                <small class="text-muted">You have 12 new messages and 7 new notifications.</small>
                                              </div> -->
                                              <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-12 mt-2 mt-md-0">
                                                <!-- daterange picker -->
                                               <!--  <div class="input-group">
                                                  <input class="form-control" type="text" name="daterange">
                                                  <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Send Report"><i class="fa fa-envelope"></i></button>
                                                  <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Download Reports"><i class="fa fa-download"></i></button>
                                                  <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Generate PDF"><i class="fa fa-file-pdf-o"></i></button>
                                                  <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Share Dashboard"><i class="fa fa-share-alt"></i></button>
                                                </div> -->
                                                <!-- Plugin Js -->
                                                <script src="assets/js/bundle/daterangepicker.bundle.js"></script>
                                                <!-- Jquery Page Js -->
                                                <script>
                                                  // date range picker
                                                  $(function() {
                                                    $('input[name="daterange"]').daterangepicker({
                                                      opens: 'left'
                                                    }, function(start, end, label) {
                                                      console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                                                    });
                                                  })
                                                </script>
                                              </div>
                                            </div> <!-- .row end -->
                              </div>
                            </div>
                            <!-- start: page body -->
                             <div class="gray-bg small-padding fl-wrap" style="text-align: center;">
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
                                                    <i class="fal fa-home"></i>
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
                                    

                                             
                                         </div>
                                    </div>
                                </div>
                             
                                <!-- listing-single content end-->

                                <!-- sidebar -->
                                <div class="col-md-4">
                                    <!-box-widget->
                                  <!--   <div class="box-widget fl-wrap">
                                        <div class="profile-widget">
                                            <div class="profile-widget-header color-bg smpar fl-wrap">
                                                <div class="pwh_bg"></div>
                                                <div class="call-btn"><a href="tel:123-456-7890" class="tolt color-bg" data-microtip-position="right"  data-tooltip="Call Now"><i class="fas fa-phone-alt"></i></a></div>
                                                <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                                <div class="show-more-snopt-tooltip bxwt">
                                                    <a href="#"> <i class="fas fa-comment-alt"></i> Write a review</a>
                                                    <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                                </div>
                                                <div class="profile-widget-card">
                                                    <div class="profile-widget-image">
                                                        <img src="images/avatar/1.jpg" alt="">
                                                    </div>
                                                    <div class="profile-widget-header-title">
                                                        <h4><a href="agent-single.html">Jessie Wilcox</a></h4>
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
                                                        <li><span><i class="fal fa-phone"></i> Phone :</span> <a href="#">+7(123)987654</a></li>
                                                        <li><span><i class="fal fa-envelope"></i> Mail :</span> <a href="#">JessieWilcox@domain.com</a></li>
                                                        <li><span><i class="fal fa-browser"></i> Website :</span> <a href="#">themeforest.net</a></li>
                                                    </ul>
                                                </div>
                                                <div class="profile-widget-footer fl-wrap">
                                                    <a href="agent-single.html" class="btn float-btn color-bg small-btn">View Profile</a>
                                                    <a href="#sec-contact" class="custom-scroll-link tolt" data-microtip-position="left"  data-tooltip="Viewing Property"><i class="fal fa-paper-plane"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                   
                                    <!--box-widget-->
                                  
                                    <!--box-widget end --> 
                                    <!--box-widget-->
                                   <!--  <div class="box-widget fl-wrap hidden-section" style="margin-top: 30px">
                                        <div class="box-widget-content fl-wrap color-bg">
                                            <div class="color-form reset-action">
                                                <div class="color-form-title fl-wrap">
                                                    <h4>Calculate Your Mortgage</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. </p>
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
                                                        <div class="monterage-title-item">$<span></span></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--box-widget end -->                                   
                                    <!--box-widget-->
                                    @if($property_rent_details->properties_documents != '-')
                                    <div class="box-widget fl-wrap">
                                        <div class="box-widget-title fl-wrap">Property Document</div>
                                        <div class="box-widget-content fl-wrap">
                                            <div class="bwc_download-list">
                                                <a href="{{ route('admin.downloadfile', $property_rent_details->property_id) }}" ><span><i class="fal fa-file-pdf"></i></span>Property Presentation</a>
                                                <!-- <a href="#" download><span><i class="fal fa-file-word"></i></span>Energetic Certificate</a>
                                                <a href="#" download><span><i class="fal fa-file-pdf"></i></span>Property Plans</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    @endif
                                    <!--box-widget end -->                                
                                    <!--box-widget-->
                                   <!--  <div class="box-widget fl-wrap">
                                        <div class="box-widget-fixed-init fl-wrap" id="sec-contact">
                                            <div class="box-widget-title fl-wrap box-widget-title-color color-bg">Contact Property</div>
                                            <div class="box-widget-content fl-wrap">
                                                <div class="custom-form">
                                                    <form method="post"  name="contact-property-form">
                                                        <label>Your name* <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                                        <input   name="phone" type="text"    onClick="this.select()" value="">
                                                        <label>Your phone  * <span class="dec-icon"><i class="fas fa-phone"></i></span></label>
                                                        <input   name="phone" type="text"    onClick="this.select()" value="">      
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Date   <span class="dec-icon"><i class="fas fa-calendar-check"></i></span></label>
                                                                <div class="date-container fl-wrap">
                                                                    <input type="text" placeholder="" style="padding: 16px 5px 16px 60px;"     name="datepicker-here"   value=""/>                                                 
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Time  </label>
                                                                <select data-placeholder="9 AM" class="chosen-select on-radius no-search-select" >
                                                                    <option>9 AM</option>
                                                                    <option>10 AM</option>
                                                                    <option>11 AM</option>
                                                                    <option>12 AM</option>
                                                                    <option>13 PM</option>
                                                                    <option>14 PM</option>
                                                                    <option>15 PM</option>
                                                                    <option>16 PM</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn float-btn color-bg fw-btn"> Send</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--box-widget end -->                                   
                                </div>
                                <!--  sidebar end-->                            
                            </div>
                            <div class="fl-wrap limit-box"></div>
                           
                        </div>
                    </div>
                     </div>
                    <!-- dashboard-footer -->
                    <div class="dashboard-footer">
                        <div class="dashboard-footer-links fl-wrap">
                          <!--  -->
                        </div>
                        <a href="#main" class="dashbord-totop  custom-scroll-link"><i class="fas fa-caret-up"></i></a>
                    </div>
                    <!-- dashboard-footer end -->               
    </div>
@endsection