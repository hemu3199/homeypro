@extends("user.layouts.app")

@section  ("content")	
            <div id="wrapper">
                <!-- content -->	
                <div class="content">
                    <!--  section  -->
                    <section class="parallax-section single-par color-bg">
                        <div class="container">
                            <div class="section-title center-align big-title">
                                <h2><span>Your Compare List</span></h2>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit amet fermentum sem.</h4>
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
                                <a href="#">Home</a><a href="#">Pages</a> <span>Compare</span>
                            </div>
                            <div class="share-holder hid-share">
                                <a href="#" class="share-btn showshare sfcs">  <i class="fas fa-share-alt"></i>  Share   </a>
                                <div class="share-container  isShare"></div>
                            </div>
                        </div>
                    </div>
                    <!-- breadcrumbs end -->
                    <!-- section -->
                    <section class="gray-bg small-padding ">
                        <div class="container">
                            <div class="compare-container fl-wrap">
                                <div class="compare-counter"><span>{{DB::table('compare')->where('user_id',Auth::guard('web')->user()->user_id)->count() }}</span> Option</div>
                                <div class="compare-header">
                                    <ul>
                                        <li>Price</li>
                                        <li>Bedrooms</li>
                                        <li>Bathrooms</li>
                                        <li>Garages</li>
                                        <li>Area</li>
                                        <li>Kitchens</li>
                                        <li>Livingrooms</li>
                                        <li>Building Age</li>
                                        <li>Floors</li>
                                        <li>Property Status</li>
                                    </ul>
                                </div>
                                <div class="compare-slider fl-wrap">
                                    @foreach($compare as $key => $row)
                                    <!-- slick-slide-item -->
                                    <div class="slick-slide-item">
                                        <div class="compare-column">
                                            <div class="compare-link fl-wrap">
                                                <div class="compare-link-meia fl-wrap">
                                                    @php 
                                                    $bookmark = DB::table('property_images')->where('property_id', $row->property_id)
                                                        ->first();
                                                        $imagescount = DB::table('property_images')->where('property_id', $row->property_id)
                                                        ->count();
                                                    @endphp
                                                    @if (!empty($bookmark))
                                                     <div class="bg par-elem "  data-bg="{{url('/uploads/properties/'.$bookmark->image_name)}}"></div>
                                                    @else
                                                     <div class="bg par-elem "  data-bg="{{url('/homey/images/dummyhome.png')}}"></div>
                                                     @endif
                                                   
                                                    <a href="{{route('removecompare',$row->property_id)}}" class="remove-compare color-bg"><i class="fal fa-times"></i></a>
                                                </div>
                                                <h4 class="single_line"><a href="{{ route('users-property-rent-details', $row->property_id) }}">{{DB::table('homeyproperties')->where('property_id',$row->property_id)->pluck('name')->first() }}</a></h4>
                                            </div>
                                            <div class="compare-content">
                                                <ul>
                                                    @php
                                                    $property_details=DB::table('homeyproperties')->where('property_id',$row->property_id)->first();
                                                    @endphp
                                                    <li>
                                                    @if(!empty($property_details->price))
                                                    {{$property_details->price}}
                                                    @else
                                                    N/A
                                                    @endif
                                                        </li>
                                                    <li>
                                                        @if(!empty($property_details->bedrooms))
                                                    {{$property_details->bedrooms}}
                                                     @else
                                                    N/A
                                                  
                                                    @endif
                                                        
                                                        </li>
                                                    <li>
                                                         @if(!empty($property_details->bathrooms))
                                                    {{$property_details->bathrooms}}
                                                    @else
                                                    N/A
                                                    @endif
                                                        
                                                        </li>
                                                    <li>
                                                         @if(!empty($property_details->garage))
                                                    {{$property_details->garage}}
                                                    @else
                                                    N/A
                                                    @endif
                                                        
                                                        </li>
                                                    <li>
                                                         @if(!empty($property_details->area))
                                                    {{$property_details->area}}
                                                    @else
                                                    N/A
                                                    @endif
                                                       </li>
                                                    <li>10</li>
                                                    @php 
                                                    $roomscount=DB::table('rooms_list')->where('property_id',$row->property_id)->count();
                                                    @endphp
                                                    <li>@if(!empty($roomscount))
                                                    {{$roomscount}}
                                                    @else
                                                    N/A
                                                    @endif
                                                        </li>
                                                    <li>1-2</li>
                                                    @php
                                                    $houseplanscount=DB::table('houseplan')->where('property_id',$row->property_id)->count();
                                                    @endphp
                                                    <li>
                                                        @if(!empty($houseplanscount))
                                                    {{$houseplanscount}}
                                                    @else
                                                    N/A
                                                    @endif</li>
                                                    <li>
                                                       
                                                            @php
                                                            $status=DB::table('homeyproperties')->where('property_id',$row->property_id)->pluck('status')->first(); 
                                                            @endphp
                                                            @if($status == 0)
                                                            <h4 style="color:green;font-weight:500;" >Active</h4>
                                                            @else
                                                            <h4 style="color:red;font-weight:500;">Inactive</h4>
                                                            @endif</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- slick-slide-item end-->
                                    @endforeach
                                    <!-- slick-slide-item -->
                                   <!--  <div class="slick-slide-item">
                                        <div class="compare-column">
                                            <div class="compare-link fl-wrap">
                                                <div class="compare-link-meia fl-wrap">
                                                    <div class="bg par-elem "  data-bg="images/all/1.jpg"></div>
                                                    <div class="remove-compare color-bg"><i class="fal fa-times"></i></div>
                                                </div>
                                                <h4><a href="listing-single.html">Kayak Point House</a></h4>
                                            </div>
                                            <div class="compare-content">
                                                <ul>
                                                    <li>$97.000</li>
                                                    <li>2</li>
                                                    <li>2</li>
                                                    <li>-</li>
                                                    <li>856</li>
                                                    <li>1</li>
                                                    <li>3</li>
                                                    <li>1-2</li>
                                                    <li>1</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- slick-slide-item end-->									
                                    <!-- slick-slide-item -->
                                  <!--   <div class="slick-slide-item">
                                        <div class="compare-column">
                                            <div class="compare-link fl-wrap">
                                                <div class="compare-link-meia fl-wrap">
                                                    <div class="bg par-elem "  data-bg="images/all/1.jpg"></div>
                                                    <div class="remove-compare color-bg"><i class="fal fa-times"></i></div>
                                                </div>
                                                <h4><a href="listing-single.html">Contemporary Apartment</a></h4>
                                            </div>
                                            <div class="compare-content">
                                                <ul>
                                                    <li>$60.000</li>
                                                    <li>3</li>
                                                    <li>1</li>
                                                    <li>-</li>
                                                    <li>1565</li>
                                                    <li>1</li>
                                                    <li>5</li>
                                                    <li>1-2</li>
                                                    <li>1/3</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- slick-slide-item end-->									
                                    <!-- slick-slide-item -->
                                  <!--   <div class="slick-slide-item">
                                        <div class="compare-column">
                                            <div class="compare-link fl-wrap">
                                                <div class="compare-link-meia fl-wrap">
                                                    <div class="bg par-elem "  data-bg="images/all/1.jpg"></div>
                                                    <div class="remove-compare color-bg"><i class="fal fa-times"></i></div>
                                                </div>
                                                <h4><a href="listing-single.html">Luxury Family Home</a></h4>
                                            </div>
                                            <div class="compare-content">
                                                <ul>
                                                    <li>$82.000</li>
                                                    <li>4</li>
                                                    <li>2</li>
                                                    <li>1</li>
                                                    <li>648</li>
                                                    <li>1</li>
                                                    <li>2</li>
                                                    <li>1-2</li>
                                                    <li>2/4</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- slick-slide-item end-->
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- section end-->
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
                <!-- footer -->	
               @endsection