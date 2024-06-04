@extends("agent.bg-layouts.bgagenthomey")
@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@section  ("content")

<div class="dashboard-content">
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
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card">
                  <div class="card-body d-flex align-items-center">
                    <div class="avatar rounded no-thumbnail bg-light"><i class="fa fa-users fa-lg"></i></div>
                    <div class="flex-fill ms-3">
                      <div class="small text-uppercase text-truncate">Total Agents</div>
                      <h6 class="mb-0">15</h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card">
                  <div class="card-body d-flex align-items-center">
                    <div class="avatar rounded no-thumbnail bg-light"><i class="fa fa-user-secret fa-lg"></i></div>
                    <div class="flex-fill ms-3">
                      <div class="small text-uppercase text-truncate">CORPORATE AGENTS</div>
                      <h6 class="mb-0">10</h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-12">
                <div class="card">
                  <div class="card-body d-flex align-items-center">
                    <div class="avatar rounded no-thumbnail bg-light"><i class="fa fa-black-tie fa-lg"></i></div>
                    <div class="flex-fill ms-3">
                      <div class="small text-uppercase text-truncate">SELLING Agents</div>
                      <h6 class="mb-0">5</h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
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
              </div>
              <div class="col-md-6">
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
              </div>
             
            </div> <!-- .row end -->
          </div>
          <div class="col-xxl-3 col-xl-4 col-lg-12">
            <div class="row g-3 row-deck">
              <div class="col-xl-12 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h6 class="card-title mb-0">Agents Progress Reports</h6>
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
                    <div>
                      <span class="text-muted d-block">Yearly Income</span>
                      <h4>22,652.35 Rs</h4>
                    </div>
                    <ul class="list-unstyled">
                      <li class="mb-3 mt-3">
                        <div class="d-flex justify-content-between">
                          <span>Hyderabad</span>
                          <span>89K</span>
                        </div>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 89%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                      <li class="mb-3">
                        <div class="d-flex justify-content-between">
                          <span>Mumbai</span>
                          <span>76K</span>
                        </div>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar bg-warning" role="progressbar" style="width: 76%;" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                      <li class="mb-3">
                        <div class="d-flex justify-content-between">
                          <span>Pune</span>
                          <span>52K</span>
                        </div>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar bg-danger" role="progressbar" style="width: 52%;" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                      <li class="mb-3">
                        <div class="d-flex justify-content-between">
                          <span>New Delhi</span>
                          <span>46K</span>
                        </div>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 46%;" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                      <li>
                        <div class="d-flex justify-content-between">
                          <span>Chennai</span>
                          <span>34K</span>
                        </div>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar bg-info" role="progressbar" style="width: 34%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xl-12 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h6 class="card-title mb-0">New Agents</h6>
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
                    <div class="d-flex">
                      <img class="avatar rounded-circle" src="{{asset('users/img/b.jpg')}}" alt="">
                      <div class="flex-fill ms-3">
                        <div class="h6 mb-0"><span class="fw-bold">Rama Krishna</span></div>
                        <small class="text-muted">Corporate Agent</small>
                      </div>
                    </div>
                    <div class="d-flex mt-4">
                      <img class="avatar rounded-circle" src="{{asset('users/img/c.jpg')}}" alt="">
                      <div class="flex-fill ms-3">
                        <div class="h6 mb-0"><span class="fw-bold">Raju</span></div>
                        <small class="text-muted">Sales Executive</small>
                      </div>
                    </div>
                    <div class="d-flex mt-4">
                      <img class="avatar rounded-circle" src="{{asset('users/img/d.jpg')}}" alt="">
                      <div class="flex-fill ms-3">
                        <div class="h6 mb-0"><span class="fw-bold">Krishna</span></div>
                        <small class="text-muted">Corporate Agent</small>
                      </div>
                    </div>
                    <div class="d-flex mt-4">
                      <img class="avatar rounded-circle" src="{{asset('users/img/e.jpg')}}" alt="">
                      <div class="flex-fill ms-3">
                        <div class="h6 mb-0"><span class="fw-bold">Pream</span></div>
                        <small class="text-muted">Buying Agent</small>
                      </div>
                    </div>
                    <div class="d-flex mt-4">
                      <img class="avatar rounded-circle" src="{{asset('agent/assets/img/th (43).jpg')}}" alt="">
                      <div class="flex-fill ms-3">
                        <div class="h6 mb-0"><span class="fw-bold">Ravi Kiran</span></div>
                        <small class="text-muted">HR</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="card-title mb-0">Average Agent Rating</h6>
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
                    <h3>4.4 / <small class="fs-5">5</small></h3>
                    <button class="btn btn-warning btn-sm"><i class="fa fa-star"></i></button>
                    <button class="btn btn-warning btn-sm"><i class="fa fa-star"></i></button>
                    <button class="btn btn-warning btn-sm"><i class="fa fa-star"></i></button>
                    <button class="btn btn-warning btn-sm"><i class="fa fa-star-half-empty"></i></button>
                    <button class="btn btn-warning btn-sm"><i class="fa fa-star-o"></i></button>
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
    </div>
 @endsection