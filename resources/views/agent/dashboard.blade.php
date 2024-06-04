@extends("agent.layouts.app")
@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('title', 'Total Properties')
@section  ("content")
<div class="dashboard-content">
@if(session('message'))   
                      <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
                       @elseif(session('error'))
                       <div class="alert alert-success" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
                    @endif
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container1 dasboard-container1">
    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
      <div class="container-fluid">
       <!--  <div class="row g-3 mb-3 align-items-center">
          <div class="col">
            <ol class="breadcrumb bg-transparent mb-0">
              <li><a  href="{{ route('agent.dashboard') }}">Home </a></li>
              <li>/ Agent</li>
              <li class="breadcrumb-item active" aria-current="page">/ Dashboard</li>
            </ol>
          </div>
        </div>  --><!-- .row end -->
       <!--  <div class="row align-items-center">
          <div class="col-auto">
            <h1 class="fs-5 color-900 mt-1 mb-0">Welcome back, asdfd!</h1>
            <small class="text-muted">You have 3 new messages and 1 new notifications.</small>
          </div>
          <div class="col d-flex justify-content-lg-end mt-2 mt-md-0">
            <div class="p-2 me-md-3">
              <div><span class="h6 mb-0">8.18K</span> <small class="text-secondary"><i class="fa fa-angle-up"></i> 1.3%</small></div>
              <small class="text-muted text-uppercase">Income</small>
            </div>
            <div class="p-2 me-md-3">
              <div><span class="h6 mb-0">1.11K</span> <small class="text-secondary"><i class="fa fa-angle-up"></i> 4.1%</small></div>
              <small class="text-muted text-uppercase">Expense</small>
            </div>
            <div class="p-2 pe-lg-0">
              <div><span class="h6 mb-0">3.66K</span> <small class="text-danger"><i class="fa fa-angle-down"></i> 7.5%</small></div>
              <small class="text-muted text-uppercase">Revenue</small>
            </div>
          </div>
        </div> -->
      </div>
    </div>
    <!-- start: page body -->
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
      <div class="container-fluid">
        <div class="row g-3">
          <div class="col-xxl-9 col-xl-8 col-lg-12">
            <div class="row g-3 row-deck">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card">
                  <div class="card-body d-flex align-items-center">
                    <div class="avatar rounded no-thumbnail bg-light"><i class="fa fa-users fa-lg"></i></div>
                    <div class="flex-fill ms-3">
                      <div class="small text-uppercase text-truncate">Total Agents</div>
                      <h6 class="mb-0">{{$agents_count}}</h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card">
                  <div class="card-body d-flex align-items-center">
                    <div class="avatar rounded no-thumbnail bg-light"><i class="fa fa-user-secret fa-lg"></i></div>
                    <div class="flex-fill ms-3">
                      <div class="small text-uppercase text-truncate">PROPERTIES ADDED BY AGENT</div>
                      <h6 class="mb-0">{{$properties_addedby_agent}}</h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-12">
                <div class="card">
                  <div class="card-body d-flex align-items-center">
                    <div class="avatar rounded no-thumbnail bg-light"><i class="fa fa-heart fa-lg"></i></div>
                    <div class="flex-fill ms-3">
                      <div class="small text-uppercase text-truncate">BOOKMARKED PROPERTIES</div>
                      <h6 class="mb-0">{{$agent_bookmarked_properties}}</h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-12">
                <div class="card">
                  <div class="card-body d-flex align-items-center">
                    <div class="avatar rounded no-thumbnail bg-light"><i class="fa fa-home fa-lg"></i></div>
                    <div class="flex-fill ms-3">
                      <div class="small text-uppercase text-truncate">INTERSTED PROPERTIES</div>
                      <h6 class="mb-0">{{$agent_intersted_properties}}</h6>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h6 class="card-title mb-0">Company <strong>Agent</strong> Statistics</h6>
                    <div class="dropdown morphing scale-left">
                      <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                      <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                      <ul class="dropdown-menu shadow border-0 p-2">
                        <li><a class="dropdown-item" href="#">File Info</a></li>
                        <li><a class="dropdown-item" href="#">Copy to</a></li>
                        <li><a class="dropdown-item" href="#">Move to</a></li>
                        <li><a class="dropdown-item" href="#">Rename</a></li>
                        <li><a class="dropdown-item" href="#">Block</a></li>
                        <li><a class="dropdown-item" href="#">Delete</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="apex-CompanyAgentStatistics"></div>
                  </div>
                </div>
              </div> -->
              <div class="col-xxl-6 col-xl-8 col-lg-7">
                <div class="card">
                  <div class="card-header">
                    <h6 class="card-title m-0">MONTLY PROPERTIES REPORT</h6>
                    <!-- widgest: Card more action icon -->
                    <!-- <div class="dropdown morphing scale-left">
                      <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                      <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                      <ul class="dropdown-menu shadow border-0 p-2">
                        <li>
                          <a class="dropdown-item" href="{{route('admin.properties-graph-pdf-download')}}"  style="margin-left: 10px; size: 40px;float:right ;">
                            <i class="feather feather-download" data-bs-toggle="tooltip"
                                data-original-title="#" style=""> Export to PDF</i>
                          </a>
                        </li>
                      </ul>
                    </div> -->
                  </div>
                  <div class="card-body">
                    <div id="apex-AudienceOverview"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="box-widget fl-wrap card">
                  <div class=" fl-wrap" id="sec-contact">
                    <div class="box-widget-title fl-wrap box-widget-title-color color-bg" style="margin-top:-3px;">Contact Admin</div>
                    <div class="box-widget-content fl-wrap">
                      <div class="custom-form">
                        <form method="post" action="{{ route('agent.agentscontactstore') }}" id="form" enctype="multipart/form-data">
                          @csrf
                          <div class="row">
                            <div class="col-sm-6">
                              <label>Your Name * <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                <input name="name" type="text" style="padding: 16px 5px 16px 60px;" value="{{ Auth::guard('agent')->user()->name }}" required readonly>
                            </div>
                            <div class="col-sm-6">
                              <label>Your phone * <span class="dec-icon"><i class="fas fa-phone"></i></span></label>
                                <input name="phone" type="text"  style="padding: 16px 5px 16px 60px;" value="{{ DB::table('agent_basic_information')->where('agent_id', Auth::guard('agent')->user()->agent_id)->pluck('phoneno')->first() }}" required>
                            </div>
                          </div>
                          <label>Your Message * <span class="dec-icon"><i class="fa fa-envelope"></i></span></label>
                          <input name="message" type="text" onClick="this.select()" value="" required>
                          <!-- <textarea name="message" type="text" onClick="this.select()" value="" required rows="4" cols="50"></textarea> -->
                          <div class="row">
                            <div class="col-sm-6">
                              <label>Date <span class="dec-icon"><i class="fas fa-calendar-check"></i></span></label>
                              <div class="date-container fl-wrap">
                                <input type="text" placeholder="" style="padding: 16px 5px 16px 60px;" name="datepicker-here" value=""/>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label>Time</label>
                              <select data-placeholder="9 AM" name="time" class="chosen-select on-radius no-search-select">
                                <option value="09:00">9 AM</option>
                                <option value="10:00">10 AM</option>
                                <option value="11:00">11 AM</option>
                                <option value="12:00">12 AM</option>
                                <option value="13:00">13 PM</option>
                                <option value="14:00">14 PM</option>
                                <option value="15:00">15 PM</option>
                                <option value="16:00">16 PM</option>
                              </select>
                            </div>
                          </div>
                          <button type="submit" class="btn float-btn color-bg fw-btn">Send</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <h6 class="card-title mb-0">Report by Sector</h6>
                    <div class="dropdown morphing scale-left">
                      <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                      <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                      <ul class="dropdown-menu shadow border-0 p-2">
                        <li><a class="dropdown-item" href="#">File Info</a></li>
                        <li><a class="dropdown-item" href="#">Copy to</a></li>
                        <li><a class="dropdown-item" href="#">Move to</a></li>
                        <li><a class="dropdown-item" href="#">Rename</a></li>
                        <li><a class="dropdown-item" href="#">Block</a></li>
                        <li><a class="dropdown-item" href="#">Delete</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="apex-ReportSector"></div>
                  </div>
                </div>
              </div> -->
            </div> <!-- .row end -->
          </div>
          <div class="col-xxl-3 col-xl-4 col-lg-12">
            <div class="row g-3 row-deck">
              <div class="col-xl-12 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h6 class="card-title mb-0">Agents Progress Reports</h6>
                    <!-- <div class="dropdown morphing scale-left">
                      <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                      <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                      <ul class="dropdown-menu shadow border-0 p-2">
                        <li><a class="dropdown-item" href="#">File Info</a></li>
                        <li><a class="dropdown-item" href="#">Copy to</a></li>
                        <li><a class="dropdown-item" href="#">Move to</a></li>
                        <li><a class="dropdown-item" href="#">Rename</a></li>
                        <li><a class="dropdown-item" href="#">Block</a></li>
                        <li><a class="dropdown-item" href="#">Delete</a></li>
                      </ul>
                    </div> -->
                  </div>
                  <div class="card-body">
                    <!-- <div>
                      <span class="text-muted d-block">Yearly Income</span>
                      <h4>22,652.35 Rs</h4>
                    </div> -->
                    <ul class="list-unstyled">
                      <li class="mb-3 mt-3">
                        <div class="d-flex justify-content-between">
                          <span>Total Properties Added</span>
                          @if ($properties_addedby_agent >= 1000)
                            <span>{{ ($properties_addedby_agent / 1000) }}k</span>
                          @else
                            <span>{{ $properties_addedby_agent }}</span>
                          @endif
                        </div>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar bg-success" role="progressbar" style="width: {{ number_format(($properties_addedby_agent / $totalproperties) * 100, 2) }}%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                      <li class="mb-3">
                        <div class="d-flex justify-content-between">
                          <span>Total Properties Verified</span>
                          @if ($agents_total_verfied_property >= 1000)
                            <span>{{ ($agents_total_verfied_property / 1000) }}k</span>
                          @else
                            <span>{{ $agents_total_verfied_property }}</span>
                          @endif
                        </div>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar bg-warning" role="progressbar" style="width:{{ number_format(($agents_total_verfied_property / $total_verfied_property) * 100, 2) }}%;" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                      <li class="mb-3">
                        <div class="d-flex justify-content-between">
                          <span>Bookmarked Properties</span>
                          @if ($agent_bookmarked_properties >= 1000)
                            <span>{{ ($agent_bookmarked_properties / 1000) }}k</span>
                          @else
                            <span>{{ $agent_bookmarked_properties }}</span>
                          @endif
                        </div>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar bg-danger" role="progressbar" style="width: {{ number_format(($agent_bookmarked_properties / $total_bookmarked_properties) * 100, 2) }}%;" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                      <li class="mb-3">
                        <div class="d-flex justify-content-between">
                          <span>Intersted Properties</span>
                          @if ($agent_intersted_properties >= 1000)
                            <span>{{ ($agent_intersted_properties / 1000) }}k</span>
                          @else
                            <span>{{ $agent_intersted_properties }}</span>
                          @endif
                        </div>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: {{ number_format(($agent_intersted_properties / $total_intersted_properties) * 100, 2) }}%;" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                      <li class="mb-3">
                        <div class="d-flex justify-content-between">
                          <span>Approved Application</span>
                          @if ($application_approved >= 1000)
                            <span>{{ ($application_approved / 1000) }}k</span>
                          @else
                            <span>{{ $application_approved }}</span>
                          @endif
                        </div>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar bg-info" role="progressbar" style="width: 34%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                      <!-- <li class="mb-3">
                        <div class="d-flex justify-content-between">
                          <span>Approved Application</span>
                          <span>34K</span>
                        </div>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar bg-info" role="progressbar" style="width: 34%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li> -->
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xl-12 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h6 class="card-title mb-0">Latest Agents</h6>
                    <!-- <div class="dropdown morphing scale-left">
                      <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                      <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                      <ul class="dropdown-menu shadow border-0 p-2">
                        <li><a class="dropdown-item" href="#">File Info</a></li>
                        <li><a class="dropdown-item" href="#">Copy to</a></li>
                        <li><a class="dropdown-item" href="#">Move to</a></li>
                        <li><a class="dropdown-item" href="#">Rename</a></li>
                        <li><a class="dropdown-item" href="#">Block</a></li>
                        <li><a class="dropdown-item" href="#">Delete</a></li>
                      </ul>
                    </div> -->
                  </div>
                  <div class="card-body">
                  @foreach ($agentsData as $key => $agents)
                    <div class="d-flex {{$key === 0 ? '' : 'mt-4'}}">
                      @if ($agents->file !== '-')
                          <img class="avatar rounded-circle" src="{{ url('/uploads/agents/' . $agents->file) }}" alt="">
                      @else
                          <img class="avatar rounded-circle" src="{{ asset('homey/images/favicon.png') }}" alt="">
                      @endif
                        <div class="flex-fill ms-3">
                            <div class="h6 mb-0"><span class="fw-bold">{{ $agents->fname }} {{ $agents->lname }}</span></div>
                            <small class="text-muted">{{ $agents->country_id }}, {{ $agents->state }}</small>
                        </div>
                    </div>
                @endforeach
                  </div>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="card-title mb-0">Average Agent Rating</h6>
                    <!--<div class="dropdown morphing scale-left">-->
                    <!--  <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>-->
                    <!--  <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>-->
                      <!--<ul class="dropdown-menu shadow border-0 p-2">-->
                      <!--  <li><a class="dropdown-item" href="#">File Info</a></li>-->
                      <!--  <li><a class="dropdown-item" href="#">Copy to</a></li>-->
                      <!--  <li><a class="dropdown-item" href="#">Move to</a></li>-->
                      <!--  <li><a class="dropdown-item" href="#">Rename</a></li>-->
                      <!--  <li><a class="dropdown-item" href="#">Block</a></li>-->
                      <!--  <li><a class="dropdown-item" href="#">Delete</a></li>-->
                      <!--</ul>-->
                    <!--</div>-->
                  </div>
                  <div class="card-body">
           @php
    $avg_rating_count = DB::table('agent_reviews')
                        ->where('member_id', Auth::guard('agent')->user()->agent_id)
                        ->avg('rating');
@endphp

<h3>{{ $avg_rating_count }}/ <small class="fs-5">5</small></h3>

@if($avg_rating_count >= 5)
    <button class="btn btn-warning btn-sm"><i class="fa fa-star"></i></button>
    <button class="btn btn-warning btn-sm"><i class="fa fa-star"></i></button>
    <button class="btn btn-warning btn-sm"><i class="fa fa-star"></i></button>
    <button class="btn btn-warning btn-sm"><i class="fa fa-star"></i></button>
    <button class="btn btn-warning btn-sm"><i class="fa fa-star"></i></button>
@elseif($avg_rating_count >= 4)
    <button class="btn btn-warning btn-sm"><i class="fa fa-star"></i></button>
    <button class="btn btn-warning btn-sm"><i class="fa fa-star"></i></button>
    <button class="btn btn-warning btn-sm"><i class="fa fa-star"></i></button>
    <button class="btn btn-warning btn-sm"><i class="fa fa-star"></i></button>
@elseif($avg_rating_count >= 3)
    <button class="btn btn-warning btn-sm"><i class="fa fa-star"></i></button>
    <button class="btn btn-warning btn-sm"><i class="fa fa-star"></i></button>
    <button class="btn btn-warning btn-sm"><i class="fa fa-star"></i></button>
@elseif($avg_rating_count >= 2)
    <button class="btn btn-warning btn-sm"><i class="fa fa-star"></i></button>
    <button class="btn btn-warning btn-sm"><i class="fa fa-star"></i></button>
    
@elseif($avg_rating_count >= 1)
    <button class="btn btn-warning btn-sm"><i class="fa fa-star-half-empty"></i></button>
@else
    No Rating
@endif

                    
                    
                    
                    
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- .row end -->
      </div>
    </div>

    </div>
                    <!-- dashboard-footer -->
                    <div class="dashboard-footer">
                        <div class="dashboard-footer-links fl-wrap">
                            <!--<span>Helpfull Links:</span>-->
                            <!--<ul>-->
                            <!--    <li><a href="about.html">About  </a></li>-->
                            <!--    <li><a href="blog.html">Blog</a></li>-->
                            <!--    <li><a href="pricing.html">Pricing Plans</a></li>-->
                            <!--    <li><a href="contacts.html">Contacts</a></li>-->
                            <!--    <li><a href="help.html">Help Center</a></li>-->
                            <!--</ul>-->
                        </div>
                        <a href="#main" class="dashbord-totop  custom-scroll-link"><i class="fas fa-caret-up"></i></a>
                    </div>
                    <!-- dashboard-footer end -->               
    </div>
    @endsection