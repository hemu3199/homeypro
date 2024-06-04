@extends("users.layouts.app")

@section  ("content")

    <!-- breadcrumb start -->
    <div class="breadcrumb-area" style="background-image:url('users/img/banner/5.png')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title text-center">
                            <h1 class="page-title">Property</h1>
                            <ul class="page-list">
                                <li><a href="{{ route('users-dashboard') }}">Home</a></li>
                                <li>Property For Rent</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- property-Area Start-->
    <section class="property-page pd-top-80 pd-bottom-110">
        <div class="btn-area" style="float:right;margin-right: 50px;">
                <a>
                   <a class="btn btn-base" href="{{ route('users-property-rent') }}"> <span class="glyphicon glyphicon-th-large"><i class="fa fa-th-large"></i>   </span></a>   
               </a>
            </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="filter-area filter-area-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#pills-home">Buy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link border-0" data-toggle="pill" href="#pills-profile">Rent</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                <div class="filter-wrap">
                                    <div class="single-input-wrap">
                                        <input type="text" class="form-control" placeholder="Search Location">
                                    </div>
                                    <div class="single-select-wrap">
                                        <select>
                                            <option>Residental</option>
                                            <option value="1">Residental 1</option>
                                            <option value="2">Residental 2</option>
                                        </select>
                                    </div>
                                    <div class="single-select-wrap">
                                        <select>
                                            <option>Bed</option>
                                            <option value="1">2 Bed</option>
                                            <option value="2">3 Bed</option>
                                        </select>
                                    </div>
                                    <div class="single-select-wrap">
                                        <select>
                                            <option>Bath</option>
                                            <option value="1">2 bath</option>
                                            <option value="2">3 bath</option>
                                        </select>
                                    </div>
                                    <div class="single-select-wrap">
                                        <select>
                                            <option>Price(USD)</option>
                                            <option value="1">Price(Euro)</option>
                                            <option value="2">Price(Rupee)</option>
                                        </select>
                                    </div> 
                                    <a class="btn btn-base" href="#"><i class="fas fa-search-location"></i>Search</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel">
                                <div class="filter-wrap">
                                    <div class="single-input-wrap">
                                        <input type="text" class="form-control" placeholder="Search Location">
                                    </div>
                                    <div class="single-select-wrap">
                                        <select>
                                            <option>Residental</option>
                                            <option value="1">Residental 1</option>
                                            <option value="2">Residental 2</option>
                                        </select>
                                    </div>
                                    <div class="single-select-wrap">
                                        <select>
                                            <option>Bed</option>
                                            <option value="1">2 Bed</option>
                                            <option value="2">3 Bed</option>
                                        </select>
                                    </div>
                                    <div class="single-select-wrap">
                                        <select>
                                            <option>Bath</option>
                                            <option value="1">2 bath</option>
                                            <option value="2">3 bath</option>
                                        </select>
                                    </div>
                                    <div class="single-select-wrap">
                                        <select>
                                            <option>Price(USD)</option>
                                            <option value="1">Price(Euro)</option>
                                            <option value="2">Price(Rupee)</option>
                                        </select>
                                    </div> 
                                    <a class="btn btn-base" href="#"><i class="fas fa-search-location"></i>Search</a>
                                </div>      
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                @foreach ($property_rent_list as  $item)
                    <div class="single-property-wrap media">
                        <div class="thumb">
                            <img src="{{url('/uploads/properties/'.$item->image)}}">
                        </div>
                        <div class="media-body property-wrap-details">
                            <h4><a href="{{ route('users-property-rent-details', $item->id) }}">{{ optional($item)->name}}</a></h4>
                            <span class="price">Rs {{ optional($item)->price}}</span>
                            <div class="meta meta-2">
                                <span><i class="fa fa-building"></i>{{ optional($item)->property_status}}</span>
                                <span><i class="fa fa-map-marker"></i>{{ optional($item)->property_address}}</span>
                                <span class="mr-0"><i class="fa fa-calculator"></i>{{ optional($item)->total_sqft}} sqft</span>
                            </div>
                            <div class="btn-area">
                                <a class="btn btn-base" href="{{ route('users-property-rent-details', $item->id) }}">View Details</a>
                                @if (Auth::guest())
                                    <a class="btn btn-base" href="{{ route('login') }}"><i class="fa fa-heart"></i></a>
                                @else
                                    @php $bookmark = DB::table('bookmark_property')->where('property_id', $item->id)
                                    ->where('user_id', Auth::guard('web')->user()->id)
                                    ->first();
                                    @endphp
                                @if (!empty($bookmark->user_id))
                                    <a class="btn btn-icon" style="color:#000"><i class="fa fa-bookmark" style="color:#fff; margin-top:12px;"></i></a>
                                @else
                                    <a class="btn btn-black" href="{{ route('users-property-bookmark', $item->id) }}"><i class="fa fa-bookmark green-color" style="margin-top:6px; color:;"></i></a>
                                @endif
                                @endif
                                <!-- <a class="btn btn-icon" href="#"><i class="fa fa-phone"></i></a> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                <div class="col-lg-12 text-center">
                    <ul class="pagination pagination-2">
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="#">01</a></li>
                        <li class="page-item"><a class="page-link" href="#">02</a></li>
                        <li class="page-item"><a class="page-link" href="#">03</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    </ul>-->
                    <!-- {!! $property_rent_list->links() !!} -->
                </div>
            </div>
        </div>
    </section>  
    <!-- property-Area End-->

    @endsection