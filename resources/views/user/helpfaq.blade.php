@extends("user.layouts.app")

@section  ("content")  	
            <!-- wrapper  -->	
            <div id="wrapper">
                <!-- content -->	
                <div class="content">
                    <!--  section  -->
                    <section class="hidden-section single-par2  " data-scrollax-parent="true">
                        <div class="bg-wrap bg-parallax-wrap-gradien">
                            <div class="bg par-elem "  data-bg="{{asset('homey/images/bg/1.jpg')}}" data-scrollax="properties: { translateY: '30%' }"></div>
                        </div>
                        <div class="container">
                            <div class="section-title center-align big-title">
                                <h2><span>Frequently Asked Questions</span></h2>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit amet fermentum sem.</h4>
                            </div>
                            <div class="scroll-down-wrap">
                                <div class="mousey">
                                    <div class="scroller"></div>
                                </div>
                                <span>Scroll Down To Discover</span>
                            </div>
                        </div>
                    </section>
                    <!--  section  end--> 		
                    <!-- breadcrumbs-->
                    <div class="breadcrumbs fw-breadcrumbs sp-brd fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs-list">
                                <a href="{{route('users-dashboard')}}">Home</a><span>Help FAQ</span>
                            </div>
                            <div class="share-holder hid-share">
                                <a href="#" class="share-btn showshare sfcs">  <i class="fas fa-share-alt"></i>  Share   </a>
                                <div class="share-container  isShare">{!! $sharebutton !!}</div>
                            </div>
                        </div>
                    </div>
                    <!-- breadcrumbs end -->
                    <!-- col-list-wrap -->
                    <section class="gray-bg small-padding ">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="box-widget fl-wrap fixed-column_menu-init">
                                        <div class="box-widget-content fl-wrap  ">
                                            <div class="box-widget-title fl-wrap">FAQ Navigation</div>
                                            <div class="faq-nav scroll-init fl-wrap">
                                                <ul>
                                                    <li><a class="act-scrlink" href="#faq1">Pricing</a></li>
                                                    <li><a  href="#faq2">Subscription Plan:</a></li>
                                                    <!-- <li><a   href="#faq3">Reccomendations</a></li>
                                                    <li><a   href="#faq4">Booking</a></li>
                                                    <li><a   href="#faq5">Listing</a></li> -->
                                                    <li><a   href="#faq6">About Homey</a></li>
                                                </ul>
                                            </div>
                                            <div class="search-widget fns fl-wrap">
                                                <form action="#" class="fl-wrap custom-form">
                                                    <input name="se" id="se" type="text" class="search" placeholder="Keywords" value="" />
                                                    <button class="search-submit" id="submit_btn"><i class="far fa-search"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="list-single-main-container">
                                        <!--   list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap" id="faq1">
                                            <div class="list-single-main-item-title big-lsmt fl-wrap">
                                                <h3>Pricing</h3>
                                            </div>
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">How is Homey's pricing structured? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Homey's pricing is typically structured based on the number of properties or units managed, and it may offer different pricing tiers or plans to accommodate the needs of various property managers or owners.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                             <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Does Homey offer a free trial? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Homey may offer a free trial period during which users can explore the platform's features and functionalities before committing to a paid plan. The trial period duration may vary, so check the website for details.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                             <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Is there a setup fee for using Homey?<i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Homey may or may not charge a setup fee, depending on the plan or services chosen. Some plans might include a one-time setup fee, while others may offer a no-setup fee option.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                             <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Are there any additional fees besides the subscription cost? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Some plans may include additional fees for specific services or features. These could include fees for tenant screening, credit checks, or integration with third-party services.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                             <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Can I upgrade or downgrade my plan at any time? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Yes, Homey typically allows users to upgrade or downgrade their plans based on their changing needs. Users can adjust their subscription level to align with the number of properties they manage or other requirements.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                             <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Is Homey's pricing dependent on the number of users accessing the platform?<i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Homey's pricing may be based on the number of properties or units managed, rather than the number of users accessing the platform. However, some plans may have limitations on the number of user accounts available.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Are there any discounts for annual subscriptions? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p> Homey offers discounts for customers who choose to pay for an annual subscription upfront instead of a monthly billing cycle. This can lead to cost savings over time.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->										
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Can I cancel my subscription at any time? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Most subscription plans with Homey are likely to be flexible, allowing users to cancel their subscriptions at any time. However, cancellation terms and conditions may vary based on the plan selected.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->	
                                               <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">How can I find the most up-to-date pricing information for Homey? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>For the latest and most accurate pricing information, visit Homey's official website or contact sales or customer support team. They can provide detailed pricing based on your specific requirements and the latest plan offerings.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->   
                                               <!--   accordion-lite -->
                                            <!-- <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Can I cancel my subscription at any time? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Most subscription plans with Homey are likely to be flexible, allowing users to cancel their subscriptions at any time. However, cancellation terms and conditions may vary based on the plan selected.</p>
                                                </div>
                                            </div> -->
                                            <!--   accordion-lite end -->   									
                                        </div>
                                        <!--   list-single-main-item end -->
                                        <!--   list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap" id="faq2">
                                            <div class="list-single-main-item-title big-lsmt fl-wrap">
                                                <h3>Subscription Plan</h3>
                                            </div>
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">What is a Subscription Plan in Homey Property Management Platform?<i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p> A subscription plan in Homey is a paid service that grants users access to various features and functionalities offered by the platform. It is typically based on a recurring payment model, billed either monthly or annually.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">What features are included in Homey's Subscription Plans? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p> The features included in Homey's Subscription Plans may vary depending on the plan level. Common features may include online tenant portals, rent collection tools, maintenance management, communication tools, financial reporting, and document storage.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">How does the pricing for Subscription Plans work? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p> Homey's pricing for Subscription Plans is usually based on the number of properties or units managed. The pricing tiers may offer different levels of features and support based on the needs of the property managers or owners.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Can I try out the Subscription Plan before committing to it?<i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p> Yes, Homey may offer a free trial period for users to explore the Subscription Plan's features and functionalities before making a payment. The trial period duration may vary, so check the website for details.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Can I change or upgrade my Subscription Plan at any time?<i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p> Yes, users can typically change or upgrade their Subscription Plan to align with their changing needs. Homey allows users to adjust their plan level based on the number of properties managed or other requirements.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Can I pay my own taxes and insurance? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p> Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat .</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Is customer support included in the Subscription Plan?<i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Customer support is often included as part of the Subscription Plan. Homey provides assistance to users with any platform-related inquiries or technical issues.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Are there any additional fees besides the Subscription Plan cost? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p> Depending on the plan or specific services chosen, there might be additional fees for certain features, such as tenant screening, credit checks, or integration with third-party services.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Can I cancel my Subscription Plan at any time?<i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Most Subscription Plans with Homey are likely to be flexible, allowing users to cancel their subscriptions at any time. However, cancellation terms and conditions may vary based on the plan selected.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->										
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Is there a discount for an annual Subscription Plan?<i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Homey may offer discounts for customers who choose to pay for an annual subscription upfront instead of a monthly billing cycle. This can lead to cost savings over time.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                             <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">How can I find the most up-to-date information about Homey's Subscription Plans and pricing?<i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>For the latest and most accurate information about Homey's Subscription Plans and pricing, visit the official website or contact the sales or customer support team.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                        </div>
                                        <!--   list-single-main-item end -->                                
                                        <!--   list-single-main-item -->
                                        
                                        <!--   list-single-main-item end -->                                
                                        <!--   list-single-main-item -->
                                        
                                        <!--   list-single-main-item end -->                                
                                        <!--   list-single-main-item -->
                                       
                                        <!--   list-single-main-item end -->
                                         <!--   list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap" id="faq6">
                                            <div class="list-single-main-item-title big-lsmt fl-wrap">
                                                <h3>About Homey</h3>
                                            </div>
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">What is Homey Property Management Platform? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Homey is an advanced property management platform designed to streamline property operations, improve tenant experience, and enhance the efficiency of managing rental properties. It offers a range of features and tools for property managers, property owners, and tenants to simplify various property-related tasks and interactions.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->                                       
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">How can I access Homey's services?<i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>To access Homey's services, you need to sign up for an account on the Homey platform or mobile app. Depending on your role (property manager, property owner, or tenant), you will have access to specific features and functionalities.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                             <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Is Homey available as a mobile app?<i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>HYes, Homey is available as a mobile-friendly app, allowing property managers, property owners, and tenants to manage their properties and access essential features on-the-go from their smartphones or tablets.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                             <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">How does Homey handle rent collection?<i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Homey simplifies rent collection by providing automated payment options. Tenants can set up recurring payments, while property managers can track and manage rent payments, streamlining the rent collection process.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                             <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Can I use Homey to communicate with my tenants or property manager?<i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Yes, Homey offers communication tools such as messaging features or push notifications, enabling real-time communication between property managers and tenants. This helps ensure prompt responses to inquiries and announcements.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                             <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">How does Homey handle maintenance requests?<i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Tenants can submit maintenance requests through Homey's online tenant portal. Property managers can then review, assign tasks to maintenance staff or vendors, and track the progress of work orders using the platform.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                             <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Can Homey provide financial reports for property owners?<i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Yes, Homey offers detailed financial reporting that provides property owners with insights into income, expenses, occupancy rates, and overall property performance. This helps property owners make informed decisions about their investments.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                             <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Is Homey integrated with other property management tools?<i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Homey may offer integration with third-party services such as accounting software, marketing platforms, and maintenance management tools to create a more efficient property management workflow.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                             <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">How secure is Homey in terms of data privacy?<i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Homey prioritizes data security and privacy, employing industry-standard measures to safeguard sensitive information and protect the privacy of users' data.</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                             <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Does Homey provide tenant screening services?<i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Depending on the platform's offerings, Homey may provide tenant screening services to help property managers make informed decisions when selecting new tenants.</p>
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