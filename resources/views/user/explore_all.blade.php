  @extends("user.layouts.app")

@section  ("content")   
<div id="wrapper">
                <!-- content -->	
                <div class="content">
                    <!--  section  -->
                                     <!--  section  end-->
                    <!-- breadcrumbs-->
                    <!-- <div class="breadcrumbs fw-breadcrumbs sp-brd fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs-list">
                                <a href="#">Home</a><a href="#">Housing</a> <span></span>
                            </div>
                            <div class="share-holder hid-share">
                                <a href="#" class="share-btn showshare sfcs">  <i class="fas fa-share-alt"></i>  Share   </a>
                                <div class="share-container  isShare"></div>
                            </div>
                        </div>
                    </div> -->
                    <!-- breadcrumbs end -->
                    <!-- col-list-wrap -->
                    <section class="gray-bg small-padding " style="background-color: white; padding: 50px 10px;">
                        <div class="container">
                        <div class="row">
                           <div class="explorewidth">
                            
                                <div class="explore" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Pay_On_Credit_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Pay on Credit</h2>
                                               
                                                </div>
                             </div>
                              <div class="explorewidth">
                            <a href="{{route('homeinsurance')}}">
                                <div class="explore" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Pay_On_Credit_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>HOME INSURANCE</h2>
                                               
                                                </div>
                                            </a>
                             </div>
                              <div class="explorewidth">
                            <a href="{{route('line-of-credit')}}">
                                <div class="explore" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Pay_On_Credit_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>line of credit</h2>
                                               
                                                </div>
                                            </a>
                             </div>
                              <div class="explorewidth">
                            <a href="{{route('rent-now-pay-later')}}">
                                <div class="explore" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Pay_On_Credit_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>rent now pay later</h2>
                                               
                                                </div>
                                            </a>
                             </div>

                              <div class="explorewidth">
                            
                                <div class="explore" >
                                                  <div class="img"><img src="{{asset('homey/images/icons/Personal_Loan_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Personal Loans</h2>
                                               
                                                </div>
                             </div>
                              <div class="explorewidth">
                            
                                <div class="explore" >
                                                  <div class="img"><img src="{{asset('homey/images/icons/Quick_Cash_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Quick Cash</h2>
                                               
                                                </div>
                             </div>
                              <div class="explorewidth">
                            
                                <div class="explore" >
                                                  <div class="img"><img src="{{asset('homey/images/icons/Line_of_Credit_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Line of Credit</h2>
                                               
                                                </div>
                             </div>
                              <div class="explorewidth">
                            
                                <div class="explore" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Pay_later.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Rent Now, Pay Later</h2>
                                               
                                                </div>
                             </div>
                              <div class="explorewidth">
                            
                                <div class="explore" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Agreement_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Rent Agreement</h2>
                                               
                                                </div>
                             </div>
                              <div class="explorewidth">
                            
                                <div class="explore" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Movers_Packers_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Packers & Movers</h2>
                                               
                                                </div>
                             </div>
                              <div class="explorewidth">
                            
                                <div class="explore" >
                                                  <div class="img"><img src="{{asset('homey/images/icons/Property_management_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Property Management</h2>
                                               
                                                </div>
                             </div>
                              <div class="explorewidth">
                            
                                <div class="explore" >
                                                  <div class="img"><img src="{{asset('homey/images/icons/Business_Loan_White.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Business Loan</h2>
                                               
                                                </div>
                             </div>
                              <div class="explorewidth">
                            
                                <div class="explore" >
                                                  <div class="img"><img src=" {{asset('homey/images/icons/Auto_Pay_White_1.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Auto Pay</h2>
                                               
                                                </div>
                             </div>
                           <!--    <div class="col-md-3">
                            
                                <div class="explore" style="border: 1px solid black; border-radius: 20px;">
                                                  <div class="img"><img src=" {{asset('homey/images/img-1.png')}}" alt="img" draggable="false"></div>
                                                  <h2>Pay on Credit</h2>
                                               
                                                </div>
                             </div>
 -->                        </div>
                                                
                                
                            
                           </div>

                        </div>
                    </section>
                    <!-- <div class="limit-box fl-wrap"></div> -->
                    <section class="gray-bg small-padding " >
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="box-widget fl-wrap fixed-column_menu-init">
                                        <div class="box-widget-content fl-wrap  ">
                                            <div class="box-widget-title fl-wrap" style="color:black;">FAQ</div>
                                            <div class="faq-nav scroll-init fl-wrap">
                                                <ul>
                                                    <li><a class="act-scrlink" href="#faq1">Pay on Credit</a></li>
                                                    <li><a  href="#faq2">Personal Loans</a></li>
                                                    <li><a   href="#faq3">Quick Cash</a></li>
                                                    <li><a   href="#faq4">Line of Credit</a></li>
                                                    <li><a   href="#faq5">Rent Now, Pay Later</a></li>
                                                </ul>
                                            </div>
                                           <!--  <div class="search-widget fns fl-wrap">
                                                <form action="#" class="fl-wrap custom-form">
                                                    <input name="se" id="se" type="text" class="search" placeholder="Keywords" value="" />
                                                    <button class="search-submit" id="submit_btn"><i class="far fa-search"></i></button>
                                                </form>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="list-single-main-container">
                                        <!--   list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap" id="faq1">
                                            <div class="list-single-main-item-title big-lsmt fl-wrap">
                                                <h3 style="color:black;">Pay On Credit</h3>
                                            </div>
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap" >
                                                <div class="accordion-lite-header fl-wrap" >How long does the sending process take? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p style="color:black;font-weight: 600;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat .</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Can I use more than one payment method to pay for a reservation? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p style="color:black;font-weight: 600;"> Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat .</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->                                       
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">How do I edit or remove a payment method? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p style="color:black;font-weight: 600;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt.  </p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->                                       
                                        </div>
                                        <!--   list-single-main-item end -->
                                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="limit-box fl-wrap"></div>
                    </section>
                </div>
                <!-- content end -->	
                <!-- subscribe-wrap -->	
                <!-- <div class="subscribe-wrap fl-wrap">
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
                </div> -->
                <!-- subscribe-wrap end -->	
                @endsection