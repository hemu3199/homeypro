@extends("user.layouts.app")

@section  ("content")       
          
            <!-- wrapper  -->	
            <div id="wrapper">
                <!-- content -->	
                <div class="content">
                    <!--  section  -->
                    <section class="parallax-section single-par color-bg">
                        <div class="container">
                            <div class="section-title center-align big-title">
                                <h2><span>Listings </span></h2>
                                <h4></h4>
                            </div>
                        </div>
                        <div class="pwh_bg"></div>
                        <div class="mrb_pin vis_mr mrb_pin3 "></div>
                        <div class="mrb_pin vis_mr mrb_pin4 "></div>
                    </section>
                    <!--  section  end-->
                    <!-- breadcrumbs-->
                    <div class="breadcrumbs fw-breadcrumbs sp-brd fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs-list">
                                <a href="{{route('users-dashboard')}}">Home</a><a href="{{ route('users-property-rent') }}">Listings</a> 
                                @if(!empty($city))
                                <span>{{$city}}</span>
                                @else
                                @endif
                            </div>
                            <div class="share-holder hid-share">
                                <a href="#" class="share-btn showshare sfcs">  <i class="fas fa-share-alt"></i>  Share   </a>
                                <div class="share-container  isShare"> {!! $sharebutton !!}</div>
                            </div>
                        </div>
                    </div>
                    <!-- breadcrumbs end -->
                    <!-- col-list-wrap -->
                    <section class="gray-bg small-padding ">
                        <div class="container">
                            <div class="row">
                                <!-- search sidebar-->
                                <div class="col-md-4">
                                    <div class="mob-nav-content-btn  color-bg show-list-wrap-search ntm fl-wrap">Show  Filters</div>
                                    <div class="fl-wrap lws_mobile">
                                        <div class="list-searh-input-wrap-title   fl-wrap"><i class="far fa-sliders-h"></i><span>Search Filters</span></div>
                                        <form  method="post" action="{{route('search_lis')}}">
                                            @csrf
                                        <div class="block-box fl-wrap search-sb" id="filters-column">
                                            <!-- listsearch-input-item-->
                                           <!--  <div class="listsearch-input-item">
                                                <label>Status</label>
                                                <select data-placeholder="Status" class="chosen-select on-radius no-search-select" >
                                                    <option>Any Status</option>
                                                    <option>For Rent</option>
                                                    <option>For Sale</option>
                                                </select>
                                            </div> -->
                                            <!-- listsearch-input-item end-->
                                            <!-- listsearch-input-item -->
                                            <div class="listsearch-input-item">
                                                <label>Keywords</label>
                                                <input type="text"  placeholder="Address , Street , State..." value=""/>										
                                            </div>
                                            <!-- listsearch-input-item end-->
                                            <!-- listsearch-input-item -->
                                            <div class="listsearch-input-item">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Cities</label>
                                                        <select data-placeholder="All Cities" name="city" class="chosen-select on-radius no-search-select" >
                                                         
                                                        @php
                                                         $test=DB::table('homeyproperties')->select('city')->distinct()->get();
                                                        @endphp
                                                         @foreach($test as $key => $row)
                                                         <option value="{{$row->city}}">{{$row->city}}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Categories</label>
                                                        <select data-placeholder="Categories"  name="cat"  class="chosen-select on-radius no-search-select" >
                                                        @php
                                                         $categories= DB::table('homeyproperties')->select('categories')->distinct()->get();
                                                        @endphp
                                                        @foreach($categories as $key => $row)
                                                        <option value="{{$row->categories}}">{{$row->categories}}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- listsearch-input-item end-->											
                                            <!-- listsearch-input-item -->
                                            <div class="listsearch-input-item">
                                                <div class="price-rage-item fl-wrap">
                                                    <span class="pr_title">Price:</span>
                                                       <input type="text" class="price-range-double" data-min="100" data-max="100000" data-step="100" value="1" data-prefix="INR ">

                                                </div>
                                            </div>
                                            <!-- listsearch-input-item end-->
                                            <!-- listsearch-input-item -->
                                            <div class="listsearch-input-item">
                                                <div class="price-rage-item fl-wrap">
                                                    <span class="pr_title">Area:</span>                   
                                                    <input type="text" class="price-range-double" data-min="1" data-max="1000"   data-step="1" value="1" data-prefix="">
                                                </div>
                                            </div>
                                            <!-- listsearch-input-item end-->										
                                            <!-- listsearch-input-item ->
                                            <div class="listsearch-input-item">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Bedrooms</label>
                                                        <select data-placeholder="Bedrooms" class="chosen-select on-radius no-search-select" >
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Bathrooms</label>
                                                        <select data-placeholder="Bathrooms" class="chosen-select on-radius no-search-select" >
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!- listsearch-input-item end-->										
                                            <!-- listsearch-input-item -->
                                            <div class="listsearch-input-item">
                                                <div class="row">
                                                   <!--  <div class="col-sm-6">
                                                        <label>Floors</label>
                                                        <select data-placeholder="Bathrooms" class="chosen-select on-radius no-search-select" >
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                        </select>
                                                    </div> -->
                                                    <div class="col-sm-6">
                                                        <label>Property Id</label>
                                                        <input type="text" name="property_id" placeholder="Id" value=""/>												
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- listsearch-input-item end-->										
                                            <!-- listsearch-input-item-->
                                       <!--      <div class="listsearch-input-item">
                                                <label>Amenities</label>
                                                <div class=" fl-wrap filter-tags">
                                                    <ul class="no-list-style">
                                                        <li>
                                                            <input id="check-aa" type="checkbox" name="check">
                                                            <label for="check-aa">Elevator in building</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-b" type="checkbox" name="check">
                                                            <label for="check-b"> Laundry Room</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-c" type="checkbox" name="check" checked>
                                                            <label for="check-c">Equipped Kitchen</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-d" type="checkbox" name="check">
                                                            <label for="check-d">Air Conditioned</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-d2" type="checkbox" name="check" checked>
                                                            <label for="check-d2">Parking</label> 
                                                        </li>
                                                        <li>
                                                            <input id="check-d3" type="checkbox" name="check" checked>
                                                            <label for="check-d3">Swimming Pool</label> 
                                                        </li>
                                                        <li>   
                                                            <input id="check-d4" type="checkbox" name="check">
                                                            <label for="check-d4">Fitness Gym</label>
                                                        </li>
                                                        <li>   
                                                            <input id="check-d5" type="checkbox" name="check">
                                                            <label for="check-d5">Security</label>
                                                        </li>
                                                        <li>   
                                                            <input id="check-d6" type="checkbox" name="check">
                                                            <label for="check-d6">Garage Attached</label>
                                                        </li>
                                                        <li>   
                                                            <input id="check-d7" type="checkbox" name="check">
                                                            <label for="check-d7">Back yard</label>
                                                        </li>
                                                        <li>   
                                                            <input id="check-d8" type="checkbox" name="check">
                                                            <label for="check-d8">Fireplace</label>
                                                        </li>
                                                        <li>   
                                                            <input id="check-d9" type="checkbox" name="check">
                                                            <label for="check-d9">Window Covering</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> -->
                                            <!-- listsearch-input-item end--> 										
                                            <div class="msotw_footer">
                                                <input type="submit" class="btn small-btn float-btn color-bg"></input>
                                                <!-- <div class="reset-form reset-btn"> <i class="far fa-sync-alt"></i> Reset Filters</div> -->
                                            </div>
                                        </div>
                                    </form>
                                        <a class="back-tofilters color-bg custom-scroll-link fl-wrap scroll-to-fixed-fixed" href="#filters-column">Back to filters <i class="fas fa-caret-up"></i></a>
                                    </div>
                                </div>
                                <!-- search sidebar end-->
                                <div class="col-md-8">
                                    <!-- list-main-wrap-header-->
                                    <div class="list-main-wrap-header box-list-header fl-wrap">
                                        <!-- list-main-wrap-title-->
                                        <div class="list-main-wrap-title">
                                            @if(!empty($city))
                                            <h2>Results For : <span>{{$city}} </span><strong>{{DB::table('homeyproperties')->where('approval_status','=', 1 )->where('status',0)->where('property_deleted',0)->where('city','=',$city)->count();}}</strong></h2>
                                            @else
                                          <h2>Results For : <strong>{{DB::table('homeyproperties')->where('approval_status','=', 1 )->where('status',0)->where('property_deleted',0)->count();}}</strong></h2>

                                            @endif
                                        </div>
                                        <!-- list-main-wrap-title end-->
                                        <!-- list-main-wrap-opt-->
                                        <div class="list-main-wrap-opt">
                                            <!-- price-opt-->
                                            <!--<div class="price-opt">-->
                                            <!--    <span class="price-opt-title">Sort   by:</span>-->
                                            <!--    <div class="listsearch-input-item">-->
                                            <!--        <select data-placeholder="Popularity" class="chosen-select no-search-select" >-->
                                            <!--            <option>Popularity</option>-->
                                            <!--            <option>Average rating</option>-->
                                            <!--            <option>Price: low to high</option>-->
                                            <!--            <option>Price: high to low</option>-->
                                            <!--        </select>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!-- price-opt end-->
                                            <!-- price-opt-->
                                            <div class="grid-opt">
                                                <ul class="no-list-style">
                                                    <li class="grid-opt_act"><span class="two-col-grid act-grid-opt tolt" data-microtip-position="bottom" data-tooltip="Grid View"><i class="far fa-th"></i></span></li>
                                                    <li class="grid-opt_act"><span class="one-col-grid tolt" data-microtip-position="bottom" data-tooltip="List View"><i class="far fa-list"></i></span></li>
                                                </ul>
                                            </div>
                                            <!-- price-opt end-->
                                        </div>
                                        <!-- list-main-wrap-opt end-->                    
                                    </div>
                                    <!-- list-main-wrap-header end-->					
                                    <!-- listing-item-wrap-->
                                    <div class="listing-item-container  box-list_ic fl-wrap">
                                        <!-- listing-item -->
                                        @forelse ($property_rent as  $item)
                                                    <div class="listing-item">
                                                        <article class="geodir-category-listing fl-wrap">
                                                            <div class="geodir-category-img fl-wrap">
                                                                 @php $bookmark = DB::table('property_images')->where('property_id', $item->property_id)
                                                ->first();
                                                 $imagescount = DB::table('property_images')->where('property_id', $item->property_id)
                                                ->count();
                                                @endphp
                                                @if (!empty($bookmark))
                                                    <a  href="{{ route('users-property-rent-details', $item->property_id) }}" class="geodir-category-img_item">
                                                        <img src="{{url('/uploads/properties/'.$bookmark->image_name)}}" alt="" style="height:200px;">
                                                        <div class="overlay"></div>
                                                    </a>
                                    @else
                                     <a  href="{{ route('users-property-rent-details', $item->property_id) }}" class="geodir-category-img_item">
                                                        <img src="{{url('/homey/images/dummyhome.png')}}" alt="" style="height:200px;">
                                                        <div class="overlay"></div>
                                                    </a>
                                     @endif
                                                                        <div class="geodir-category-location">
                                                                            <a href="#" class="single-map-item tolt" data-newlatitude="{{ optional($item)->latitude}}" data-newlongitude="{{ optional($item)->longitude}}"   data-microtip-position="top-left" data-tooltip="On the map"><i class="fas fa-map-marker-alt"></i> <span>{{ optional($item)->city}}</span></a>
                                                                        </div>
                                                                        <ul class="list-single-opt_header_cat">
                                                                            <li><a href="#" class="cat-opt ">Rent</a></li>
                                                                            <li><a href="#" class="cat-opt "> {{ optional($item)->categories}}</a></li>
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
                                                                        <!-- <a href="#" class="geodir_save-btn tolt" data-microtip-position="left" data-tooltip="Save"><span><i class="fal fa-heart"></i></span></a> -->
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
                                                                        <a href="{{ route('compare') }}" class="compare-btn tolt" data-microtip-position="left" data-tooltip="Compare Container Full" ><span><i class="fal fa-random"></i></span></a>
                                                                        @endif
                                                                     @endif                                                    <div class="geodir-category-listing_media-list">
                                                                            <span><i class="fas fa-camera"></i> {{$imagescount}}</span>
                                                                        </div>
                                                                    </div>
                                                <div class="geodir-category-content fl-wrap">
                                                    <h3 class="title-sin_item"><a href="{{ route('users-property-rent-details', $item->property_id) }}">{{ optional($item)->name}}</a></h3>
                                                    <div class="geodir-category-content_price inrusd"> {{ optional($item)->price}}</div>
                                                     <span class="para">{{ optional($item)->key_words}}</span>
                                                
                                                    <!-- <h6 style="text-align: left;">{{ optional($item)->key_words}} </h6> -->
                                                    <!-- <p>{{ optional($item)->key_words}}</p> -->
                                                    <div class="geodir-category-content-details">
                                                        <ul>
                                                            <li><i class="fal fa-bed"></i><span>{{ optional($item)->bedrooms}}  </span></li>
                                                            <li><i class="fal fa-bath"></i><span>{{ optional($item)->bathrooms}} </span></li>
                                                            <li><i class="fal fa-cube"></i><span>{{ optional($item)->area}}  ft</span></li>
                                                        </ul>
                                                    </div>
                                                   <div class="geodir-category-footer fl-wrap">
                                                                   @php 
                                                                $agent=DB::table('agents')->where('agent_id',$item->agent_id)->first();
                                                                $agentbasicinformation=DB::table('agent_basic_information')->where('agent_id',$item->agent_id)->first();
                                                                @endphp
                                                                @if(!empty($agent))
                                                                <a  class="gcf-company"><img src="{{url('/uploads/agents/'.$agentbasicinformation->file)}}" alt=""><span>By {{$agentbasicinformation->fname}}</span></a>
                                                                @php
                                                                $avg_rating_count=DB::table('agent_reviews')
                                                        ->where('member_id', $item->agent_id )
                                                        ->avg('rating');
                                                                @endphp
                                                                <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="@if(5<=$avg_rating_count)
                                                Excellent
                                            @elseif(4<=$avg_rating_count)
                                                Good
                                            @elseif(3<=$avg_rating_count)
                                                Average
                                            @elseif(2<=$avg_rating_count)
                                                Fair
                                            @elseif(1<=$avg_rating_count)
                                                Very Bad
                                            @else
                                                No Rating
                                            @endif" data-starrating2="{{$avg_rating_count}}"></div>
                                                                @else
                                                                  <a  class="gcf-company"><img src="{{asset('homey/images/favicon.png ')}}" alt=""><span>By Homey</span></a>
                                                                   @php
                                                                  $avg_rating=DB::table('agent_reviews')
                                                        ->where('member_id', $item->user_id )
                                                        ->count('rating');
                                                           $user_name = DB::table('homeyproperties')->where('property_id',$item->property_id)->pluck('user_id')->first();
                                                        if(!empty($user_name))
                                                        $avg_rating_count=DB::table('agent_reviews')
                                                        ->where('member_id', $item->user_id )
                                                        ->avg('rating');
                                                        else
                                                        $avg_rating_count=DB::table('agent_reviews')
                                                        ->where('member_id', 'Admin')
                                                        ->avg('rating');

                                                                  @endphp
                                                                <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="@if(5<=$avg_rating_count)
                                                Excellent
                                            @elseif(4<=$avg_rating_count)
                                                Good
                                            @elseif(3<=$avg_rating_count)
                                                Average
                                            @elseif(2<=$avg_rating_count)
                                                Fair
                                            @elseif(1<=$avg_rating_count)
                                                Very Bad
                                            @else
                                                No Rating
                                            @endif" data-starrating2="{{$avg_rating_count}}"></div>
                                                                @endif
                                                        </div>
                                                </div>
                                            </article>
                                        </div>
                                          @empty
                                          <div class="listing-item-container  box-list_ic fl-wrap">
                                           <div>
                                               <img src="{{asset('homey/images/nodata-found.png')}}">
                                           </div> 
                                          </div>
                                          
                                          @endforelse
                                        <!-- listing-item end-->

                                       
                                        					
                                    </div>
                                    <!-- listing-item-wrap end-->
                                    <!-- pagination-->
                                    <!-- <div class="pagination"> -->
                                               {!! $property_rent->links() !!} 
                                    <!-- </div> -->
                                    <!-- pagination end-->  
                                </div>
                                <!-- col-md 8 end -->
                                <div> 
                          
                              </div>
                            </div>
                        </div>
                    </section>
                    <div class="limit-box fl-wrap"></div>
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
@endsection	
        