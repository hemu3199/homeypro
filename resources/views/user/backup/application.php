@extends("user.layouts.homedashboard")

@section  ("content") 
<style type="text/css">
    .td{
        margin: 10px;
    }
</style>      
          
                <div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->	
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item"><span>Your Listings</span></div>
                            <div class="dashbard-menu-header">
                                <div class="dashbard-menu-avatar fl-wrap">
                                    <img src="images/avatar/1.jpg" alt="">
                                    <h4>Welcome, <span>Alica Noory</span></h4>
                                </div>
                                <a href="index.html" class="log-out-btn   tolt" data-microtip-position="bottom"  data-tooltip="Log Out"><i class="far fa-power-off"></i></a>
                            </div>
                            <!--Tariff Plan menu-->
                            <div class="tfp-det-container">
                                <div   class="tfp-btn"><span>Your Tariff Plan : </span> <strong>Extended</strong></div>
                                <div class="tfp-det">
                                    <p>You Are on <a href="#">Extended</a> . Use link bellow to view details or upgrade. </p>
                                    <a href="#" class="tfp-det-btn color-bg">Details</a>
                                </div>
                            </div>
                            <!--Tariff Plan menu end-->						
                        </div>
                        <!-- dashboard-title end -->		
                        <div class="dasboard-wrapper fl-wrap">
                            <div class="dasboard-listing-box fl-wrap">
                                <div class="dasboard-opt sl-opt fl-wrap">
                                    <div class="dashboard-search-listing">
                                        <input type="text" onclick="this.select()" placeholder="Search" value="">
                                        <button type="submit"><i class="far fa-search"></i></button>
                                    </div>
                                    <a href="dashboard-add-listing.html" class="gradient-bg dashboard-addnew_btn">Add New <i class="fal fa-plus"></i></a>	
                                    <!-- price-opt-->
                                    <div class="price-opt">
                                        <span class="price-opt-title">Sort   by:</span>
                                        <div class="listsearch-input-item">
                                            <select data-placeholder="Lastes" class="chosen-select no-search-select" >
                                                <option>Lastes</option>
                                                <option>Oldes</option>
                                                <option>Average rating</option>
                                                <option>Name: A-Z</option>
                                                <option>Name: Z-A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- price-opt end-->
                                </div>
                                <!-- dashboard-listings-wrap-->
                                <div class="dashboard-listings-wrap fl-wrap" style="overflow-x:auto;">
                                    <div class="row">
                                        
                                        <table class="table" >
                                                    <thead>
                                                        <tr >
                                                            <th >S.NO</th>
                                                            <th >Property Name</th>
                                                            <th >User Name</th>
                                                            <th >Application Status</th>
                                                            <th >Application Received</th>
                                                            <th >Action</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody >
                                                        @foreach($application as $key => $row)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td><a href="#">{{DB::table('properties')->where('id','=', $row->property_id)->pluck('name')->first();}}</a></td>
                                                            <td>{{DB::table('users')->where(['user_id' => $row->user_id])->pluck('name')->first();}}</td>
                                                             @php
                                    $applied=  DB::table('application')->where('user_id','=', Auth::guard('web')->user()->user_id)->where('property_id','=',$row->property_id)->pluck('application_status')->first();
                                    @endphp
                                    
                                                             @if ($applied == '1')
                            <td><a class="btn" style="color:#fff; background:black; border: 2px solid black;">Application Submited</a></td>
                            @else
                            <td><a href="#"
                            class="btn btn-base"
                            style="color:#fff; background:black; border: 2px solid black;">
                            Null
                            </a></td>
                            @endif
                                                            <td>{{DB::table('application')->where(['user_id' => $row->user_id])->where(['property_id' => $row->property_id])->pluck('created_at')->first();}}</td>
                                                            <td>
                                                               <!--  <a class="btn btn-base" href="{{ route('users-view-application',$row->property_id) }}" aria-pressed="true" style="color:white;background-color:#3270FC" ><i class='fa fa-eye' style='margin-top:5px; font-size:20px;' ></i></a>
                                                                <a class="btn btn-base" href="{{ route('users-edit-application',$row->property_id) }}" role="button" aria-pressed="true" class="btn btn-base" style="color:white;background-color:#3270FC"><i class='fa fa-edit' style='margin-top:5px; font-size:20px;'></i></a> -->
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                       
                                        
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
                                <li><a href="about.html">About  </a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="pricing.html">Pricing Plans</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="help.html">Help Center</a></li>
                            </ul>
                        </div>
                        <a href="#main" class="dashbord-totop  custom-scroll-link"><i class="fas fa-caret-up"></i></a>
                    </div>
                    <!-- dashboard-footer end -->	
@endsection
                