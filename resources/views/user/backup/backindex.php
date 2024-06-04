@extends("user.layouts.app")

@section  ("content")        <!-- header end  -->	
            <!-- wrapper  -->	
            <div id="wrapper">
                <!-- content -->	
                <div class="content">
                    <!--  section  -->
                    <section class="no-padding-section">
                        <div class="hero-slider-wrap carousel-wrap fl-wrap">
                            <div class="hero-slider carousel" >
                                <!-- hero-slider-item -->
                                <div class="hero-slider-item hero-slider-item_first fl-wrap">
                                    <div class="bg"  data-bg=" {{asset('homey/images/bg/1.jpg')}}"></div>
                                    <div class="overlay"></div>
                                    
                                     <div class="container">
                            <div class="hero-title hero-title_small">
                                <h4>Property Platform</h4>
                                <h2>Find The Property of Your Dream  <br>
                                    Using Our Platform
                                </h2>
                            </div>
                            <div class="main-search-input-wrap shadow_msiw">
                                <form method="post" action="{{route('search')}}" >
                                    @csrf
                                <div class="main-search-input fl-wrap">
                                    <div class="main-search-input-item">
                                        <select data-placeholder="All Cities" name="city" class="chosen-select" >
                                            <!-- @foreach($categories as $key => $row) -->

                                            <!-- <option value="{{$row->categories}}">{{$row->categories}}</option> -->
                                            <!-- @endforeach -->
                                            <option value="">Hotels</option>
                                             <option value=""> Apartment</option>

                                            <option value="">Villas</option>

                                            <option value="">Office</option>

                                            <option value="">PG</option>

                                            <option value="">Holiday Guest Houses</option>

                                        </select>
                                    </div>
                                    <div class="main-search-input-item">
                                        <input type="text" placeholder="Rent" value="RENT"/ disabled>
                                    </div>
                                    <div class="main-search-input-item">
                                        <select data-placeholder="All Cities" name="city" class="chosen-select" >
                                            <!-- @foreach($city as $key => $row) -->

                                            <!-- <option value="{{$row->city}}">{{$row->city}}</option> -->
                                            <option>All Cities </option>
                                            <option>Hyderbad</option>
                                            <option>Warangal</option>
                                            <option>Mumbai</option>
                                            <option>Bengaluru</option>
                                            <option>Chennai</option>
                                           <!--  <option></option>
                                            <option>Rome</option>
                                            <option>Beijing</option> -->
                                            <!-- @endforeach -->
                                        </select>
                                    </div>
                                    <button class="main-search-button color-bg" type="submit">  Search <i class="far fa-search"></i> </button>
                                </div>
                            </form>
                            </div>
                            <div class="hero-notifer fl-wrap">Need more search options? <a href="{{ route('users-property-rent') }}">Advanced Search</a> </div>
                            <div class="scroll-down-wrap">
                                <div class="mousey">
                                    <div class="scroller"></div>
                                </div>
                                <span>Scroll Down To Discover</span>
                            </div>
                        </div>
                                </div>
                                <!--  hero-slider-item end  -->
                                <!-- hero-slider-item -->
                                <div class="hero-slider-item fl-wrap">
                                    <div class="bg"  data-bg="{{asset('homey/images/bg/1.jpg')}}"></div>
                                    <div class="overlay"></div>
                                    <div class="hero-listing-item">
                                        <div class="container">
                                            <h2><a href="listing-single.html">House in Financial District</a></h2>
                                            <div class="geodir-category-location fl-wrap">
                                                <a href="#"><i class="fas fa-map-marker-alt"></i>  70 Bright St New York, USA</a>
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="4"><span class="re_stars-title">Good</span></div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <p></p>
                                            <div class="clearfix"></div>
                                            <a href="listing-single.html" class="btn color-bg float-btn">View Details</a> 
                                            <div class="list-single-header-price"><strong>Price:</strong><span>$</span>50.500</div>
                                        </div>
                                    </div>
                                </div>
                                <!--  hero-slider-item end  -->
                            </div>
                            <div class="hs-btn hs-btn_prev  swiper-button-prev"><i class="far fa-angle-left"></i></div>
                            <div class="hs-btn hs-btn_next  swiper-button-next"><i class="far fa-angle-right"></i></div>
                        </div>
                    </section>
                    <!--  section  end-->
                    <!-- breadcrumbs-->
                    <div class="breadcrumbs fw-breadcrumbs sp-brd fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs-list">
                                <a href="#">Home</a>  <span></span>
                            </div>
                            <div class="share-holder hid-share">
                                <a href="#" class="share-btn showshare sfcs">  <i class="fas fa-share-alt"></i>  Share   </a>
                                <div class="share-container  isShare"></div>
                            </div>
                        </div>
                    </div>
                    <!-- breadcrumbs end -->
                 <!--<section style="padding: 30px 0; background-color: #fff;">
                            <div class="container">
                                <div class="col-md-12" style="font-size: 30px; margin: 0px 0px 30px 0px; font-weight: 500; color:#3270FC; ">
                                    <h1 style="text-align: left; ">
                                        Housing
                                    </h1>
                                </div>

                                <div class="col-md-12">
                                    <div style="  display: flex; padding: 0 35px; align-items: center; justify-content: center;">
                                        <div class="wrapper">
                                            <ul class="carousel">
                                                <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Pay_On_Credit_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Pay on Credit</h2>
                                               
                                                </li>
                                                <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Personal_Loan_White.png')}}" alt="img" draggable="false"></div>
                                                 
                                                  <h2>Personal Loans</h2>
                                                 
                                                </li>
                                                <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Quick_Cash_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Quick Cash</h2>
                                                 
                                                </li>
                                                <li class="card">
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Line_of_Credit_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Line of Credit</h2>
                                                 
                                                </li>
                                                <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Pay_later.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Rent Now, Pay Later</h2>
                                                  
                                                </li>
                                                <li class="card">
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Agreement_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Rent Agreement</h2>
                                                 
                                                </li>
                                                <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Movers_Packers_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Packers & Movers</h2>
                                                 
                                                </li>
                                                <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Property_management_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2> Property Management</h2>
                                                  
                                                </li>
                                                 <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Business_Loan_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2> Business Loan</h2>
                                                  
                                                </li>
                                                 <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Auto_Pay_White_1.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Auto Pay</h2>
                                                  
                                                </li>
                                              
                                            </ul>

                                         </div>
                                    </div>
                                </div>

                                <div class="col-md-12" style="margin-top:25px">
                                    <a href="{{route('explore')}}" class="btn float-btn small-btn color-bg">Explore All</a>
                                </div>
                            </div>
                    </section> -->
                    <!-- services -->
                     <section style="padding:30px 0">
                        <div class="container">
                             <div class="listing-carousel-wrapper1 carousel-wrap1 fl-wrap">
                                <div class="list-single-main-item-title1">
                                    <h3>Homey Offeres</h3>
                                </div>
                                <div class="listing-carousel2 carousel1 " >
                                    <!-- slick-slide-item -->
                                    <div class="slick-slide-item1">
                                        <!-- listing-item -->
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                
                                               <li class="card" >
                                                  <div class="img">
                                                    <i  class="fa fa-credit-card" aria-hidden="true"></i></div>
                                                  <h2>Pay on Credit</h2>
                                               
                                                </li>
                                            </article>
                                        </div>
                                        <!-- listing-item end-->                            
                                    </div>
                                    <!-- slick-slide-item end-->
                                    <!-- slick-slide-item -->
                                    <div class="slick-slide-item1">
                                        <!-- listing-item -->
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                
                                                 <li class="card" >
                                                  <div class="img">
                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                </div>
                                                    <!-- <link type="image/png" sizes="16x16" rel="icon" href=".../icons8-euro-money-16.png"></div> -->
                                                 
                                                  <h2>Personal Loans</h2>
                                                 
                                                </li>
                                            </article>
                                        </div>
                                        <!-- listing-item end-->                            
                                    </div>
                                    <!-- slick-slide-item end-->
                                    <!-- slick-slide-item -->
                                    <div class="slick-slide-item1">
                                        <!-- listing-item -->
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                
                                                <li class="card" >
                                                  <div class="img">
                                                    <i class="fa fa-money-bill" aria-hidden="true"></i>
                                                    <!-- <img src=" {{asset('homey/images/icons/Quick_Cash_black.png')}}" alt="img" draggable="false"> -->
                                                </div>
                                                  <h2>Quick Cash</h2>
                                                 
                                                </li>
                                            </article>
                                        </div>
                                        <!-- listing-item end-->                            
                                    </div>
                                    <!-- slick-slide-item end-->
                                    <!-- slick-slide-item -->
                                    <div class="slick-slide-item1">
                                        <!-- listing-item -->
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                
                                                 <li class="card">
                                                  <div class="img">
                                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                                    <!-- <img src=" {{asset('homey/images/icons/Line_of_Credit_black.png')}}" alt="img" draggable="false"> -->
                                                </div>
                                                  <h2>Line of Credit</h2>
                                                 
                                                </li>
                                            </article>
                                        </div>
                                        <!-- listing-item end-->                            
                                    </div>
                                    <!-- slick-slide-item end-->
                                    <!-- slick-slide-item -->
                                    <div class="slick-slide-item1">
                                        <!-- listing-item -->
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                
                                              <li class="card" >
                                                  <div class="img">
                                                    <i class="fa fa-home" aria-hidden="true"></i>
                                                    <!-- <img src=" {{asset('homey/images/icons/Pay_later.png')}}" alt="img" draggable="false"> -->
                                                </div>
                                                  <h2>Rent Now, Pay Later</h2>
                                                  
                                                </li>
                                            </article>
                                        </div>
                                        <!-- listing-item end-->                            
                                    </div>
                                    <!-- slick-slide-item end-->
                                    <!-- slick-slide-item -->
                                    <div class="slick-slide-item1">
                                        <!-- listing-item -->
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                  <li class="card">
                                                  <div class="img">
                                                    <i class="fas fa-file-contract" aria-hidden="true"></i>

                                                    <!-- <img src=" {{asset('homey/images/icons/Agreement_black.png')}}" alt="img" draggable="false"> -->
                                                </div>
                                                  <h2>Rent Agreement</h2>
                                                 
                                                </li>
                                            </article>
                                        </div>
                                        <!-- listing-item end-->                            
                                    </div>
                                    <!-- slick-slide-item end-->
                                     <!-- slick-slide-item -->
                                    <div class="slick-slide-item1">
                                        <!-- listing-item -->
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                               <li class="card" >
                                                  <div class="img">
                                                    <i class="fas fa-truck" aria-hidden="true"></i>

                                                    <!-- <img src=" {{asset('homey/images/icons/Movers_Packers_black.png')}}" alt="img" draggable="false"> -->
                                                </div>
                                                  <h2>Packers & Movers</h2>
                                                 
                                                </li>
                                            </article>
                                        </div>
                                        <!-- listing-item end-->                            
                                    </div>
                                    <!-- slick-slide-item end-->
                                     <!-- slick-slide-item -->
                                    <div class="slick-slide-item1">
                                        <!-- listing-item -->
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                 <li class="card" >
                                                  <div class="img">
                                                    <i class="fas fa-building" aria-hidden="true"></i>

                                                    <!-- <img src=" {{asset('homey/images/icons/Property_management_black.png')}}" alt="img" draggable="false"> -->
                                                </div>
                                                  <h2> Property Management</h2>
                                                  
                                                </li>
                                            </article>
                                        </div>
                                        <!-- listing-item end-->                            
                                    </div>
                                    <!-- slick-slide-item end-->
                                     <!-- slick-slide-item -->
                                    <div class="slick-slide-item1">
                                        <!-- listing-item -->
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                    <li class="card" >
                                                  <div class="img">
                                                    <i class="fas fa-money-bill-wave" aria-hidden="true"></i>

                                                    <!-- <img src=" {{asset('homey/images/icons/Business_Loan_White.png')}}" alt="img" draggable="false"> -->
                                                </div>
                                                  <h2> Business Loan</h2>
                                                  
                                                </li>
                                            </article>
                                        </div>
                                        <!-- listing-item end-->                            
                                    </div>
                                    <!-- slick-slide-item end-->
                                     <!-- slick-slide-item -->
                                    <div class="slick-slide-item1">
                                        <!-- listing-item -->
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                  <li class="card" >
                                                  <div class="img">
                                                    <i class="fas fa-credit-card" aria-hidden="true"></i>

                                                    <!-- <img src=" {{asset('homey/images/icons/Auto_Pay_Black_1.png')}}" alt="img" draggable="false"> -->
                                                </div>
                                                  <h2>Auto Pay</h2>
                                                  
                                                </li>
                                            </article>
                                        </div>
                                        <!-- listing-item end-->                            
                                    </div>
                                    <!-- slick-slide-item end-->
                                                                   
                                </div>
                                <div class="swiper-button-prev lc-wbtn lc-wbtn_prev1"><i class="far fa-angle-left"></i></div>
                                <div class="swiper-button-next lc-wbtn lc-wbtn_next1"><i class="far fa-angle-right"></i></div>
                            </div>
                             <div class="col-md-12" style="margin-top:25px">
                                    <a href="{{route('explore')}}" class="btn float-btn small-btn color-bg">Explore All</a>
                                </div>
                        </div>
                    </section>
                   <!--  <section style="padding: 30px 0; background-color: #fff;">
                            <div class="container">
                                <div class="col-md-12" style="font-size: 30px; margin: 0px 0px 30px 0px; font-weight: 500; color:#3270FC; ">
                                    <h1 style="text-align: left; ">
                                       Services Offered
                                    </h1>
                                </div>
                                <div class="col-md-12">
                                    <div style="  display: flex; padding: 0 35px; align-items: center; justify-content: center;">
                                        <div class="wrapper1">
                                            <ul class="carousel1">
                                                <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Pay_On_Credit_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Online Tenant Portal</h2>
                                               
                                                </li>
                                                <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Personal_Loan_White.png')}}" alt="img" draggable="false"></div>
                                                 
                                                  <h2>Rent Collection and Financial Management</h2>
                                                 
                                                </li>
                                                <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Quick_Cash_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Maintenance Management</h2>
                                                 
                                                </li>
                                                <li class="card">
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Agreement_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Document Storage</h2>
                                                 
                                                </li>
                                                <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Pay_later.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Tenant Screening</h2>
                                                  
                                                </li>
                                                <li class="card">
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Agreement_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Reporting and Analytics</h2>
                                                 
                                                </li>
                                                <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Movers_Packers_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Mobile App</h2>
                                                 
                                                </li>
                                                <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Property_management_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Vendor Management</h2>
                                                  
                                                </li>
                                                 <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Business_Loan_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Lease Management</h2>
                                                  
                                                </li>
                                                 <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Auto_Pay_White_1.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Automated Reminders</h2>
                                                  
                                                </li>
                                                <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Auto_Pay_White_1.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Accounting Integration</h2>
                                                  
                                                </li>
                                              
                                            </ul>

                                         </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top:25px">
                                    <a href="{{route('explore')}}" class="btn float-btn small-btn color-bg">Explore All</a>
                                </div>
                            </div>
                    </section> -->
                  
                    <!-- /end services -->
                  <!--   <section style="padding:30px 0">
                        <div class="container">
                             <div class="listing-carousel-wrapper1 carousel-wrap1 fl-wrap">
                                <div class="list-single-main-item-title1">
                                    <h3> Services Offered</h3>
                                </div>
                                <div class="listing-carousel1 carousel1 " >
                                    <!- slick-slide-item ->
                                    <div class="slick-slide-item1">
                                        <!- listing-item ->
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                
                                                <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Pay_On_Credit_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Online Tenant Portal</h2>
                                               
                                                </li>
                                            </article>
                                        </div>
                                        <!- listing-item end->                            
                                    </div>
                                    <!- slick-slide-item end->
                                    <!- slick-slide-item ->
                                    <div class="slick-slide-item1">
                                        <!- listing-item ->
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                
                                                  <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Personal_Loan_White.png')}}" alt="img" draggable="false"></div>
                                                 
                                                  <h2>Rent Collection and Financial Management</h2>
                                                 
                                                </li>                                            </article>
                                        </div>
                                        <!- listing-item end->                            
                                    </div>
                                    <!- slick-slide-item end->
                                    <!- slick-slide-item ->
                                    <div class="slick-slide-item1">
                                        <!- listing-item ->
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                
                                                  <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Quick_Cash_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Maintenance Management</h2>
                                                 
                                                </li>
                                            </article>
                                        </div>
                                        <!- listing-item end->                            
                                    </div>
                                    <!- slick-slide-item end->
                                    <!- slick-slide-item ->
                                    <div class="slick-slide-item1">
                                        <!- listing-item ->
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                
                                                 <li class="card">
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Agreement_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Document Storage</h2>
                                                 
                                                </li>
                                            </article>
                                        </div>
                                        <!- listing-item end->                            
                                    </div>
                                    <!- slick-slide-item end->
                                    <!- slick-slide-item ->
                                    <div class="slick-slide-item1">
                                        <!- listing-item ->
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                
                                                 <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Pay_later.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Tenant Screening</h2>
                                                  
                                                </li>
                                            </article>
                                        </div>
                                                                  
                                    </div>
                                 
                                    <div class="slick-slide-item1">
                                      
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                 <li class="card">
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Agreement_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Reporting and Analytics</h2>
                                                 
                                                </li>
                                            </article>
                                        </div>
                                                           
                                    </div>
                                   
                                    <div class="slick-slide-item1">
                                      
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                               <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Movers_Packers_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Mobile App</h2>
                                                 
                                                </li>
                                            </article>
                                        </div>
                                                                  
                                    </div>
                               
                                    <div class="slick-slide-item1">
                                      
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Property_management_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Vendor Management</h2>
                                                  
                                                </li>
                                            </article>
                                        </div>
                                                                   
                                    </div>
                                  
                                    <div class="slick-slide-item1">
                                    
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                 <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Business_Loan_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Lease Management</h2>
                                                  
                                                </li>
                                            </article>
                                        </div>
                                                                 
                                    </div>
                                  
                                    <div class="slick-slide-item1">
                                    
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                 <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Auto_Pay_White_1.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Automated Reminders</h2>
                                                  
                                                </li>
                                            </article>
                                        </div>
                                                            
                                    </div>
                                  
                                    <div class="slick-slide-item1">
                                     
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                                    <li class="card" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Auto_Pay_White_1.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Accounting Integration</h2>
                                                  
                                                </li>
                                            </article>
                                        </div>
                                                                
                                    </div>
                                  
                                                                   
                                </div>
                                <div class="swiper-button-prev lc-wbtn lc-wbtn_prev1"><i class="far fa-angle-left"></i></div>
                                <div class="swiper-button-next lc-wbtn lc-wbtn_next1"><i class="far fa-angle-right"></i></div>
                            </div>
                        </div>
                    </section> -->
                      <!-- section -->
                       <section class="gray-bg small-padding">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="section-title fl-wrap">
                                        <h4>Browse Hot Offers</h4>
                                        <h2>Latest <span style="color:#3270FC"> Properties </span>  </h2>
                                    </div>
                                </div>
                               <!--  <div class="col-md-8">
                                    <div class="listing-filters gallery-filters">
                                        <a href="#" class="gallery-filter  gallery-filter-active" data-filter="*"> <span>All Categories</span></a>
                                        <a href="#" class="gallery-filter" data-filter=".for_sale"> <span>For Sale</span></a>
                                        <a href="#" class="gallery-filter" data-filter=".for_rent"> <span>For Rent</span></a>
                                    </div>
                                </div> -->
                            </div>
                            <!-- <div class="clearfix"></div> -->
                            <!-- grid-item-holder-->
                              <div class="grid-item-holder gallery-items gisp fl-wrap">
                                <!-- gallery-item-->
                                @foreach ($property_rents as  $item)
                                <div class="gallery-item for_sale">
                                    <!-- listing-item -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img fl-wrap">
                                         @php 
                                        $bookmark = DB::table('property_images')->where('property_id', $item->property_id)
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
                                                        <img src="{{url('/uploads/properties/'.$item->image)}}" alt="" style="height:200px;">
                                                        <div class="overlay"></div>
                                                    </a>
                                     @endif
                                                <div class="geodir-category-location">
                                                    <a href="#" class="single-map-item tolt" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"   data-microtip-position="top-left" data-tooltip="On the map"><i class="fas fa-map-marker-alt"></i> <span>  {{ optional($item)->address}}</span></a>
                                                </div>
                                                <ul class="list-single-opt_header_cat">
                                                    <li><a href="#" class="cat-opt ">New</a></li>
                                                    <li><a href="#" class="cat-opt ">Apartment</a></li>
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
                                        <a href="{{ route('compare') }}" class="geodir_save-btn tolt" data-microtip-position="left" data-tooltip="Bookmark" ><span><i class="fal fa-heart"></i></span></a>
                                        @endif
                                     @endif 
                                     <div class="geodir-category-listing_media-list">
                                                            <span><i class="fas fa-camera"></i> {{$imagescount}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="geodir-category-content fl-wrap">
                                                        <h3 class="title-sin_item"><a href="{{ route('users-property-rent-details', $item->property_id) }}">{{ optional($item)->name}}</a></h3>
                                                        <div class="geodir-category-content_price inrusd"> {{ optional($item)->price}}</div>
                                                        <span class="para">{{ optional($item)->key_words}}</span>
                                                        
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
                                         @endforeach
                                                                                                
                                    </div>
                                 <!-- grid-item-holder-->    
                            <a href="{{ route('users-property-rent') }}" class="btn float-btn small-btn color-bg">View All Properties</a>
                        </div>
                    </section>
                   
                    <!-- section end-->
                    <!-- section -->
                    @if(!empty($property_rent))
                    <section class="gray-bg " style="padding-top: 10px;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12" >
                                    <div class="section-title fl-wrap" >
                                        <h2 style="text-align: center;" >Explore Featured<span style="color:#3270FC"> Properties </span>  </h2>
                                        <h4 style="text-align: center;">Browse New Properties</h4>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <!-- <div class="clearfix"></div> -->
                            <!-- grid-item-holder-->	
                            <div class="grid-item-holder gallery-items gisp fl-wrap">
                                <!-- gallery-item-->
                                @foreach ($property_rent as  $item)
                                <div class="gallery-item for_sale">
                                    <!-- listing-item -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img fl-wrap">
                                         @php 
                                        $bookmark = DB::table('property_images')->where('property_id', $item->property_id)
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
                                                        <img src="{{url('/uploads/properties/'.$item->image)}}" alt="" style="height:200px;">
                                                        <div class="overlay"></div>
                                                    </a>
                                     @endif
                                                <div class="geodir-category-location">
                                                    <a href="#" class="single-map-item tolt" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"   data-microtip-position="top-left" data-tooltip="On the map"><i class="fas fa-map-marker-alt"></i> <span>  {{ optional($item)->address}}</span></a>
                                                </div>
                                                <ul class="list-single-opt_header_cat">
                                                    <li><a href="#" class="cat-opt ">New</a></li>
                                                    <li><a href="#" class="cat-opt ">Apartment</a></li>
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
                                        <a href="{{ route('compare') }}" class="geodir_save-btn tolt" data-microtip-position="left" data-tooltip="Bookmark" ><span><i class="fal fa-heart"></i></span></a>
                                        @endif
                                     @endif 
                                     <div class="geodir-category-listing_media-list">
                                                            <span><i class="fas fa-camera"></i> {{$imagescount}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="geodir-category-content fl-wrap">
                                                        <h3 class="title-sin_item"><a href="{{ route('users-property-rent-details', $item->property_id) }}">{{ optional($item)->name}}</a></h3>
                                                        <div class="geodir-category-content_price inrusd"> {{ optional($item)->price}}</div>
                                                        <span class="para">{{ optional($item)->key_words}}</span>
                                                        
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
                                         @endforeach
                                       															
                                    </div>
                            <!-- grid-item-holder-->	
                            @if(!empty($property_rent))
                            <a href="{{ route('users-featured') }}" class="btn float-btn small-btn color-bg">View All Properties</a>
                            @endif
                        </div>
                    </section>
                    @endif
                    <!-- section end-->	
                    
                    <!-- section -->
                    <section>
                        <div class="container">
                            <!--about-wrap -->
                            <div class="about-wrap">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="about-title ab-hero fl-wrap">
                                            <h2>Why Choose Our Properties </h2>
                                            <h4>Check video presentation to find out more about us .<a href="#"> <i class="fas fa-camera"></i> click me</a></h4>
                                        </div>
                                        <div class="services-opions fl-wrap">
                                            <ul>
                                                <li>
                                                    <i class="fal fa-headset"></i>
                                                    <h4>24 Hours Support  </h4>
                                                    <p>Ensuring that property owners and tenants can access services and support at any time.</p>
                                                </li>
                                                <li>
                                                    <i class="fal fa-users-cog"></i>
                                                    <h4>User Admin Panel</h4>
                                                    <p>User Admin Panel provides an intuitive and user-friendly interface, making it easy for property owners and tenants to navigate and access various features and functionalities.</p>
                                                </li>
                                                <li>
                                                    <i class="fal fa-phone-laptop"></i>
                                                    <h4>Mobile Friendly</h4>
                                                    <p>This flexibility improves convenience and efficiency, as users can handle tasks and respond to inquiries in real-time, even when away from their desktop computers.</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-6">
                                        <div class="about-img fl-wrap">
                                            <img src="{{asset('homey/images/all/1.jpg')}}" class="respimg" alt="">
                                            <div class="about-img-hotifer">
                                                <p>Your website is fully responsive so visitors can view your content from their choice of device.</p>
                                                <h4>Mark Antony</h4>
                                                <h5>Homeradar CEO</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- about-wrap end  -->							
                        </div>
                    </section>
                    <section class="gray-bg small-padding" >
                        <div class="container"  >
                              <div class="section-title st-center fl-wrap">
                                <h2>How It Works ?</h2>
                                <h4>What Our Clients Say</h4>
                            </div>
                            <div class="row">
                                <!-- services-item -->
                                <div class="col-md-4">
                                    <div class="services-item1 fl-wrap" >
                                        <i class="fal fa-scroll" ></i>
                                        <h4 >Property Registration </h4>
                                        <p >Property managers or owners first register their properties on the platform. They provide essential information such as property address, type (residential, commercial, etc.), number of units, amenities, and rental details.</p>
                                        <!-- <a href="#" class="serv-link">Read more</a> -->
                                    </div>
                                </div>
                                <!-- services-item  end-->
                                <!-- services-item -->
                                <div class="col-md-4">
                                    <div class="services-item1 fl-wrap" >
                                        <i class="fal fa-user" ></i>
                                        <h4 >Tenant Onboarding </h4>
                                        <p >For rental properties, the platform allows property managers to onboard tenants by collecting their information, lease agreements, and payment details. Tenants can also register on the platform to access their tenant portal.</p>
                                        <!-- <a href="#" class="serv-link">Read more</a> -->
                                    </div>
                                </div>
                                <!-- services-item  end-->
                                <!-- services-item -->
                                <div class="col-md-4">
                                    <div class="services-item1 fl-wrap"  >
                                        <i class="fal fa-shield "  ></i>
                                       
                                        <h4 >Mobile Friendly</h4>
                                        <p>This flexibility improves convenience and efficiency, as users can handle tasks and respond to inquiries in real-time, even when away from their desktop computers.</p>
                                        <!-- <a href="#" class="serv-link">Read more</a> -->
                                    </div>
                                </div>
                                <!-- services-item  end-->                              
                            </div>
                        </div>
                    </section>
                    <!-- section end-->	
                    <section class="hidden-section no-padding-section">
                        <div class="half-carousel-wrap">
                            <div class="half-carousel-title color-bg">
                                <div class="half-carousel-title-item fl-wrap">
                                    <h2>Explore Best Cities</h2>
                                    <h5>Assess your individual needs, lifestyle, career goals, and personal values by consulting our property managers can help you make an informed decision based on your unique circumstances.</h5>
                                </div>
                                <div class="pwh_bg"></div>
                            </div>
                            <div class="half-carousel-conatiner">
                                <div class="half-carousel fl-wrap full-height">
                                    <!--slick-item -->
                                    @php
                                    $cities= DB::table('homeyproperties')->select('city')->where('approval_status',1)->distinct()->get();
                                    @endphp
                                    @foreach($cities as $key =>$row)
                                    <div class="slick-item">
                                        <div class="half-carousel-item fl-wrap">
                                            <div class="bg-wrap bg-parallax-wrap-gradien">
                                                <div class="bg"  data-bg="{{asset('homey/images/bg/long/1.jpg')}}"></div>
                                            </div>
                                            <div class="half-carousel-content">
                                                <div class="hc-counter ">{{ DB::table('homeyproperties')->where('city','=',$row->city)->where('approval_status',1)->count();}}</div>
                                                <h3><a href="#">{{$row->city}}</a></h3>
                                                <p>Constant care and attention to the patients makes good record</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!--slick-item end -->
                                    <!--slick-item -->
                                <!--     <div class="slick-item">
                                        <div class="half-carousel-item fl-wrap">
                                            <div class="bg-wrap bg-parallax-wrap-gradien">
                                                <div class="bg"  data-bg="{{asset('homey/images/bg/long/1.jpg')}}"></div>
                                            </div>
                                            <div class="half-carousel-content">
                                                <div class="hc-counter color-bg">89 Properties</div>
                                                <h3><a href="listing.html">Awesome London</a></h3>
                                                <p>Constant care and attention to the patients makes good record</p>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--slick-item end -->									
                                    <!--slick-item -->
                                   <!--  <div class="slick-item">
                                        <div class="half-carousel-item fl-wrap">
                                            <div class="bg-wrap bg-parallax-wrap-gradien">
                                                <div class="bg"  data-bg="{{asset('homey/images/bg/long/1.jpg')}}"></div>
                                            </div>
                                            <div class="half-carousel-content">
                                                <div class="hc-counter color-bg">102 Properties</div>
                                                <h3><a href="listing.html">Find Dream in Paris</a></h3>
                                                <p>Constant care and attention to the patients makes good record</p>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--slick-item end -->
                                    <!--slick-item -->
                                    <!-- <div class="slick-item">
                                        <div class="half-carousel-item fl-wrap">
                                            <div class="bg-wrap bg-parallax-wrap-gradien">
                                                <div class="bg"  data-bg="{{asset('homey/images/bg/long/1.jpg')}}"></div>
                                            </div>
                                            <div class="half-carousel-content">
                                                <div class="hc-counter color-bg">51 Properties</div>
                                                <h3><a href="listing.html">Elite Houses in Dubai</a></h3>
                                                <p>Constant care and attention to the patients makes good record</p>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--slick-item end -->									
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--section end--> 
                   <!--   <section style="padding:30px 0">
                        <div class="container">
                             <div class="listing-carousel-wrapper1 carousel-wrap1 fl-wrap">
                                <div class="list-single-main-item-title1">
                                    <h3>Top Establishments In The City</h3>
                                </div>
                                <div class="listing-carousel3 carousel1 " >
                                       
                                    <div class="slick-slide-item1">
                                        
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                              <div class="custom-form1">
                                                
                                                    <div class="es">
                                                        <label>
                                                            <span class="dec-icon1">
                                                                <i class="far fa-briefcase"></i>
                                                            </span>
                                                        </label>
                                                         <div class="input1">
                                                            <h1 class="text">top one</h1>
                                                             
                                                         </div>
                                                     </div>
                                                    <div class="es">
                                                        <label>
                                                            <span class="dec-icon1">
                                                                <i class="far fa-briefcase"></i>
                                                            </span>
                                                        </label>
                                                         <div class="input1">
                                                            <h1 class="text">top one</h1>
                                                         </div>
                                                     </div>
                                                
                                                 </div>
                                            </article>
                                        </div>
                                                           
                                    </div>
                                   
                                    <div class="slick-slide-item1">
                                     
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                              <div class="custom-form1">
                                          
                                                    <div class="es">
                                                        <label>
                                                            <span class="dec-icon1">
                                                                <i class="far fa-briefcase"></i>
                                                            </span>
                                                        </label>
                                                         <div class="input1">
                                                            <h1 class="text">top one</h1>
                                                             
                                                         </div>
                                                     </div>
                                                    <div class="es">
                                                        <label>
                                                            <span class="dec-icon1">
                                                                <i class="far fa-briefcase"></i>
                                                            </span>
                                                        </label>
                                                         <div class="input1">
                                                            <h1 class="text">top one</h1>
                                                         </div>
                                                     </div>
                                            
                                                 </div>
                                            </article>
                                        </div>
                                                          
                                    </div>
                                
                                    <div class="slick-slide-item1">
                                       
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                              <div class="custom-form1">
                                               
                                                    <div class="es">
                                                        <label>
                                                            <span class="dec-icon1">
                                                                <i class="far fa-briefcase"></i>
                                                            </span>
                                                        </label>
                                                         <div class="input1">
                                                            <h1 class="text">top one</h1>
                                                             
                                                         </div>
                                                     </div>
                                                    <div class="es">
                                                        <label>
                                                            <span class="dec-icon1">
                                                                <i class="far fa-briefcase"></i>
                                                            </span>
                                                        </label>
                                                         <div class="input1">
                                                            <h1 class="text">top one</h1>
                                                         </div>
                                                     </div>
                                                
                                                 </div>
                                            </article>
                                        </div>
                                                                  
                                    </div>
                                   
                                    <div class="slick-slide-item1">
                                      
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                              <div class="custom-form1">
                                               
                                                    <div class="es">
                                                        <label>
                                                            <span class="dec-icon1">
                                                                <i class="far fa-briefcase"></i>
                                                            </span>
                                                        </label>
                                                         <div class="input1">
                                                            <h1 class="text">top one</h1>
                                                             
                                                         </div>
                                                     </div>
                                                    <div class="es">
                                                        <label>
                                                            <span class="dec-icon1">
                                                                <i class="far fa-briefcase"></i>
                                                            </span>
                                                        </label>
                                                         <div class="input1">
                                                            <h1 class="text">top one</h1>
                                                         </div>
                                                     </div>
                                          
                                                 </div>
                                            </article>
                                        </div>
                                                                
                                    </div>
                                   
                                    <div class="slick-slide-item1">
                                      
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                              <div class="custom-form1">
                                              
                                                    <div class="es">
                                                        <label>
                                                            <span class="dec-icon1">
                                                                <i class="far fa-briefcase"></i>
                                                            </span>
                                                        </label>
                                                         <div class="input1">
                                                            <h1 class="text">top one</h1>
                                                             
                                                         </div>
                                                     </div>
                                                    <div class="es">
                                                        <label>
                                                            <span class="dec-icon1">
                                                                <i class="far fa-briefcase"></i>
                                                            </span>
                                                        </label>
                                                         <div class="input1">
                                                            <h1 class="text">top one</h1>
                                                         </div>
                                                     </div>
                                                
                                                 </div>
                                            </article>
                                        </div>
                                                                
                                    </div>
                                   
                                    <div class="slick-slide-item1">
                                       
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                              <div class="custom-form1">
                                                
                                                    <div class="es">
                                                        <label>
                                                            <span class="dec-icon1">
                                                                <i class="far fa-briefcase"></i>
                                                            </span>
                                                        </label>
                                                         <div class="input1">
                                                            <h1 class="text">top one</h1>
                                                             
                                                         </div>
                                                     </div>
                                                    <div class="es">
                                                        <label>
                                                            <span class="dec-icon1">
                                                                <i class="far fa-briefcase"></i>
                                                            </span>
                                                        </label>
                                                         <div class="input1">
                                                            <h1 class="text">top one</h1>
                                                         </div>
                                                     </div>
                                          
                                                 </div>
                                            </article>
                                        </div>
                                                              
                                    </div>
                                   
                                    <div class="slick-slide-item1">
                                     
                                        <div class="listing-item1">
                                            <article class="geodir-category-listing1 fl-wrap">
                                              <div class="custom-form1">
                                              
                                                    <div class="es">
                                                        <label>
                                                            <span class="dec-icon1">
                                                                <i class="far fa-briefcase"></i>
                                                            </span>
                                                        </label>
                                                         <div class="input1">
                                                            <h1 class="text">top one</h1>
                                                             
                                                         </div>
                                                     </div>
                                                    <div class="es">
                                                        <label>
                                                            <span class="dec-icon1">
                                                                <i class="far fa-briefcase"></i>
                                                            </span>
                                                        </label>
                                                         <div class="input1">
                                                            <h1 class="text">top one</h1>
                                                         </div>
                                                     </div>
                                                
                                                 </div>
                                            </article>
                                        </div>
                                                            
                                    </div>
                                        
                                                                   
                                </div>
                                <div class="swiper-button-prev lc-wbtn lc-wbtn_prev1"><i class="far fa-angle-left"></i></div>
                                <div class="swiper-button-next lc-wbtn lc-wbtn_next1"><i class="far fa-angle-right"></i></div>
                            </div>
                        </div>
                    </section> -->
                    
                    <!-- services --> 
                    <!-- <section class="gray-bg">
                        <div class="container" style="background-color: red;">
                           
                           <div style="background-color:lightsteelblue; float: left; width: 25%;
                        scroll-snap-align: start;
                        height: 135px;
                        list-style: none;
                        background: #3270FC;
                        cursor: pointer;
                        padding-bottom: 5px;
                        flex-direction: column;
                        padding: 15px 15px;
                        aborder-radius: 6px;
                        mborder: 3px solid #000;
                        border-radius: 20px;
                        width: 90%;
                    ">
                            <div style="height:50px; width:100%;background-color:greenyellow;"> 
                                <h1>HIIIIIII</h1>
                            </div>
                               
                           </div>
                             <div style="background-color:lightsteelblue; float: left; width: 25%;">
                               <h1>HIIIIIII</h1>
                           </div>
                             <div style="background-color:lightsteelblue; float: left; width: 25%;">
                               <h1>HIIIIIII</h1>
                           </div>
                             <div style="background-color:lightsteelblue; float: left; width: 25%;">
                               <h1>HIIIIIII</h1>
                           </div>

                        </div>
                    </section> -->

                     <section style="padding:50px 0 50px 0" >
                        <div class="container" style="  1background-color:#3270FC;padding: 50px; border-radius: 15px; border:1px solid #3270fc; background: linear-gradient(43deg,#3270fc 55%, rgba(0, 0, 0, 0.1) );
"  >
                            <div class="pwh_bg"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mrb_pin mrb_pin2" style="left:-30px;top: 110px;"></div>
                                    <div class="subscribe-header">
                                        <div class="registerclick" >Become a Property Manager</div>
                                        <div>
                                            <hr style="height:3px; width:50px;border-width:0;color:gray;background-color:red">
                                        </div>
                                        <div class="registersec">Property management can be a rewarding career, it requires dedication, strong interpersonal skills, and a commitment to providing excellent service to clients.</div>
                                    </div>
                                   
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-5">
                                   <!--  <div>
                                        <img src="{{asset('homey/images/res1.png')}}">
                                    </div> -->
                                    
                                    <a  class="register" href="{{route('listing')}}" >Register Now</a>
                                </div>
                            </div>                            
                        </div>
                    </section>					
                    <!-- section -->
                    <section >
                        <div class="container">
                            <!-- section-title -->
                            <div class="section-title st-center fl-wrap">
                                <h4>The Best Agents</h4>
                                <h2>Meet Our <span style="color: #3270FC;">Rental</span> Agents</h2>
                            </div>
                            <!-- section-title end -->
                            <div class="clearfix"></div>
                            <div class="listing-carousel-wrapper lc_hero carousel-wrap fl-wrap">
                                <div class="listing-carousel carousel ">
                                    @foreach ($agents as  $agents)
                                    <!-- slick-slide-item -->
                                    <div class="slick-slide-item">
                                        <!--  agent card item -->
                                        <div class="listing-item">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img fl-wrap  agent_card">
                                                    <a href="agent-single.html" class="geodir-category-img_item">
                                                        <img src="{{asset('homey/images/agency/agent/1.jpg')}}" alt="">
                                                        <ul class="list-single-opt_header_cat">
                                                            <li><span class="cat-opt ">4 listings</span></li>
                                                        </ul>
                                                    </a>
                                                    <div class="agent-card-social fl-wrap">
                                                        <ul>
                                                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"><span class="re_stars-title">Excellent</span></div>
                                                </div>
                                                <div class="geodir-category-content fl-wrap">
                                                    <div class="card-verified tolt" data-microtip-position="left" data-tooltip="Verified"><i class="fal fa-user-check"></i></div>
                                                    <div class="agent_card-title fl-wrap">
                                                        <h4><a href="agent-single.html" >{{$agents->fname}}</a></h4>
                                                        <h5><a href="agency-single.html">Homey agency</a></h5>
                                                    </div>
                                                    <p>{{$agents->description}}</p>
                                                    <div class="geodir-category-footer fl-wrap">
                                                        <a href="agent-single.html" class="btn float-btn color-bg small-btn">View Profile</a>
                                                        <a href="mailto:yourmail@email.com" class="tolt ftr-btn" data-microtip-position="left" data-tooltip="Write Message"><i class="fal fa-envelope"></i></a>
                                                        <a href="tel:123-456-7890" class="tolt ftr-btn" data-microtip-position="left" data-tooltip="Call Now"><i class="fal fa-phone"></i></a>	
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <!--  agent card item end -->
                                    </div>
                                     @endforeach
                                    <!-- slick-slide-item end-->
                                    <!-- slick-slide-item -->
                                    							
                                </div>
                                <div class="swiper-button-prev lc-wbtn lc-wbtn_prev"><i class="far fa-angle-left"></i></div>
                                <div class="swiper-button-next lc-wbtn lc-wbtn_next"><i class="far fa-angle-right"></i></div>
                            </div>
                        </div>
                    </section>
                    <!-- section end-->					
                    <!-- section -->
                    <section class="color-bg small-padding">
                        <div class="container">
                            <div class="main-facts fl-wrap">
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                @php
                                                $agents= DB::table('agents')->count();
                                                @endphp
                                                <div class="num" data-content="0" data-num="{{$agents}}">0</div>
                                            </div>
                                        </div>
                                        <h6>Property Managers</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="12168">0</div>
                                            </div>
                                        </div>
                                        <h6>Happy Customers Every Year</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="2172">0</div>
                                            </div>
                                        </div>
                                        <h6>Won Awards</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="732">0</div>
                                            </div>
                                        </div>
                                        <h6>New Listing Every Week</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                            </div>
                        </div>
                        <div class="svg-bg">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%"
                                height="100%" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMax slice">
                                <defs>
                                    <lineargradient id="bg">
                                        <stop offset="0%" style="stop-color:rgba(255, 255, 255, 0.6)"></stop>
                                        <stop offset="50%" style="stop-color:rgba(255, 255, 255, 0.1)"></stop>
                                        <stop offset="100%" style="stop-color:rgba(255, 255, 255, 0.6)"></stop>
                                    </lineargradient>
                                    <path id="wave" stroke="url(#bg)" fill="none" d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
                                        s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
                                </defs>
                                <g>
                                    <use xlink:href="#wave">
                                        <animatetransform attributeName="transform" attributeType="XML" type="translate" dur="10s" calcMode="spline"
                                            values="270 230; -334 180; 270 230" keyTimes="0; .5; 1" keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
                                            repeatCount="indefinite" />
                                    </use>
                                    <use xlink:href="#wave">
                                        <animatetransform attributeName="transform" attributeType="XML" type="translate" dur="8s" calcMode="spline"
                                            values="-270 230;243 220;-270 230" keyTimes="0; .6; 1" keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
                                            repeatCount="indefinite" />
                                    </use>
                                    <use xlink:href="#wave">
                                        <animatetransform attributeName="transform" attributeType="XML" type="translate" dur="6s" calcMode="spline"
                                            values="0 230;-140 200;0 230" keyTimes="0; .4; 1" keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
                                            repeatCount="indefinite" />
                                    </use>
                                    <use xlink:href="#wave">
                                        <animatetransform attributeName="transform" attributeType="XML" type="translate" dur="12s" calcMode="spline" values="0 240;140 200;0 230"
                                            keyTimes="0; .4; 1" keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
                                    </use>
                                </g>
                            </svg>
                        </div>
                    </section>
                    <!-- section end-->	 
                    <!-- section -->
                    
                </div>    
                             <!-- content end -->
                 <!-- section -->
                
                





                <!-- subscribe-wrap -->	
                <div class="subscribe-wrap fl-wrap">
                    <div class="container">
                        <div class="subscribe-container fl-wrap color-bg" style="margin-top:10px">
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
                                               <form id="subscribe" method="post" action="{{ route('subscribe') }}">
                                                    @csrf
                                                    <input class="enteremail fl-wrap" name="email" id="subscribe-email" placeholder="Enter Your Email" spellcheck="false" type="text">
                                                    <button type="submit" id="subscribe-button" class="subscribe-button ">Subscribe</button>
                                                    @error('email')
                                                    <label>{{ $message }}</label>
                                                    @enderror
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