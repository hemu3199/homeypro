@extends("admin.layouts.app")
@section  ("content")
<style>
        /* Styles for tabs and tab content */
        .tab {
            display: none;
        }
        .tab.active {
            display: block;
        }
        .tab-button {
            cursor: pointer;
        }
    </style>
   <div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container1 dasboard-container1">
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
                            <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
                              <div class="container-fluid">
                                <div class="row g-3 row-deck">
                                  <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card overflow-hidden">
                                      <div class="card-body">
                                        <div class="position-absolute top-0 end-0 mt-4 me-3"><i class='fas fa-user-tie' style="font-size: 22px; color: #3270FC"></i></div>
                                        <div class="mb-2 text-uppercase">NO OF AGENTS</div>
                                        <div>
                                          <span class="h4">{{$agents_count}}</span> <span class="small text-muted"><i class="fa fa-level-up"></i> 
                                            @if ($agents_count > 0)
                                              {{ number_format(($agents_count_last_week / $agents_count) * 100, 2) }}%
                                            @else
                                                0%
                                            @endif
                                          </span>
                                        </div>
                                        <small class="text-muted">Analytics for last week</small>
                                      </div>
                                      <div class="progress" style="height: 4px;">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ $agents_count / 10 }}%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card overflow-hidden">
                                      <div class="card-body">
                                        <div class="position-absolute top-0 end-0 mt-4 me-3"><i class='fa-solid fa-house' style="font-size: 21px; color: #3270FC"></i></div>
                                        <div class="mb-2 text-uppercase">TOTAL PROPERTY</div>
                                        <div>
                                          <span class="h4">{{$total_property}}</span> <span class="small text-muted"><i class="fa fa-level-up"></i> 
                                            @if ($total_property > 0)
                                              {{ number_format(($total_property_count_last_week / $total_property) * 100, 2) }}%
                                            @else
                                                0%
                                            @endif
                                          </span>
                                        </div>
                                        <small class="text-muted">Analytics for last week</small>
                                      </div>
                                      <div class="progress" style="height: 4px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $total_property / 10 }}%" aria-valuenow="13" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card overflow-hidden">
                                      <div class="card-body">
                                        <div class="position-absolute top-0 end-0 mt-4 me-3"><i class='fas fa-check-circle' style="font-size: 21px; color: #3270FC"></i></div>
                                        <div class="mb-2 text-uppercase">VERIFIEED PROPERTIES</div>
                                        <div>
                                          <span class="h4">{{$verfied_property}}</span> <span class="small text-muted"><i class="fa fa-level-up"></i> 
                                            @if ($verfied_property > 0)
                                              {{ number_format(($verfied_property_count_last_week / $verfied_property) * 100, 2) }}%
                                            @else
                                                0%
                                            @endif
                                          </span>
                                        </div>
                                        <small class="text-muted">Analytics for last week</small>
                                      </div>
                                      <div class="progress" style="height: 4px;">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ $verfied_property / 10 }}%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card overflow-hidden">
                                      <div class="card-body">
                                        <div class="position-absolute top-0 end-0 mt-4 me-3"><i class='fa fa-users' style="font-size: 21px; color: #3270FC"></i></div>
                                        <div class="mb-2 text-uppercase">NO OF USERS</div>
                                        <div>
                                          <span class="h4">{{$user_count}}</span> <span class="small text-muted"><i class="fa fa-level-up"></i> 
                                            @if ($user_count > 0)
                                              {{ number_format(($user_count_last_week / $user_count) * 100, 2) }}%
                                            @else
                                                0%
                                            @endif
                                          </span>
                                        </div>
                                        <small class="text-muted">Analytics for last week</small>
                                      </div>
                                      <div class="progress" style="height: 4px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $user_count / 10 }}%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12">
                                    <div class="card text-center bg-primary-gradient">
                                      <div class="card-body d-flex align-items-center justify-content-center">
                                        <div>
                                          <h4 class="mt-4">Welcome Back, {{Auth::guard('admin')->user()->name}}!!</h4>
                                          <p class="card-text fs-6 mb-5" style="color:black;"><strong>Need help?</strong> Check out the documentation of Luno Admin. It includes tons of <strong>Widgets</strong>, <strong>Components</strong>, and Elements with <strong>easy-to-follow</strong> documentation.</p>
                                          <a class="btn btn-lg color-bg text-uppercase px-4 lift" href="docs/index.html" title="">Visit Documentation</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div> -->
                                  <div class="col-xxl-6 col-xl-8 col-lg-8">
                                    <div class="card">
                                      <div class="card-header">
                                        <h6 class="card-title m-0">PROPERTIES</h6>
                                        <!-- widgest: Card more action icon -->
                                       <div class="dropdown morphing scale-left">
                                          <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                                          <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                          <ul class="dropdown-menu shadow border-0 p-2">
                                            <!-- <li><a class="dropdown-item" href="#">File Info</a></li>
                                            <li><a class="dropdown-item" href="#">Copy to</a></li>
                                            <li><a class="dropdown-item" href="#">Move to</a></li>
                                            <li><a class="dropdown-item" href="#">Rename</a></li>
                                            <li><a class="dropdown-item" href="#">Block</a></li>
                                            <li><a class="dropdown-item" href="#">Delete</a></li> -->
                                            <li>
                                              <a class="dropdown-item" href="{{route('admin.properties-graph-pdf-download')}}"  style="margin-left: 10px; size: 40px;float:right ;">
                                               <i class="feather feather-download" data-bs-toggle="tooltip"
                                                   data-original-title="#" style=""> Export to PDF</i>
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                        
                                      </div>
                                      <div class="card-body">
                                        <div id="apex-AudienceOverview"></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6">
                                    <div class="card">
                                      <div class="card-header">
                                        <h6 class="card-title mb-0">Sales by Category</h6>
                                        <!-- widgest: Card more action icon -->
                                       <!--  <div class="dropdown morphing scale-left">
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
                                        <div id="apex-SalesbyCategory"></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                    <div class="card">
                                      <div class="card-header">
                                        <h6 class="card-title mb-0">My Wallet</h6>
                                        <!-- widgest: Card more action icon -->
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
                                        <div>Available BTC <a href="crypto/index.html">View Account</a></div>
                                        <h3>0.0386245 BTC</h3>
                                        <div class="py-4">
                                          <div class="text-uppercase text-muted small">Buy this month</div>
                                          <h5>3.0675432 BTC</h5>
                                          <div class="mt-3 text-uppercase text-muted small">Sell this month</div>
                                          <h5>2.0345618 BTC</h5>
                                        </div>
                                        <div class="btn-group d-flex">
                                          <input type="radio" class="btn-check" name="gm-btnradio" id="gm-btnradio1" checked="">
                                          <label class="btn btn-outline-secondary" for="gm-btnradio1">Rent</label>
                                          <!-- <input type="radio" class="btn-check" name="gm-btnradio" id="gm-btnradio2">
                                          <label class="btn btn-outline-secondary" for="gm-btnradio2">Sell</label> -->
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                    <div class="card">
                                      <div class="card-header">
                                        <h6 class="card-title mb-0"> Download</h6>
                                        <!-- widgest: Card more action icon -->
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
                                        <ul class="list-unstyled">
                                          <li class="d-flex py-2 mb-2">
                                            <div class="avatar rounded no-thumbnail"><i class="fa fa-file-zip-o fa-lg"></i></div>
                                            <div class="flex-fill ms-3">
                                              <a href="{{route('admin.agent.list.pdf')}}"><span>Agent_List.pdf <i class='fa fa-download'></i></span></a>
                                              <div class="progress mt-2" style="height: 5px;">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="44" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                            </div>
                                          </li>
                                          <li class="d-flex py-2 mb-2">
                                            <div class="avatar rounded no-thumbnail"><i class="fa fa-file-pdf-o fa-lg"></i></div>
                                            <div class="flex-fill ms-3">
                                              <a href="{{route('admin.bg.agent.list.pdf')}}"><span>BG_Agent_List.pdf <i class='fa fa-download'></i></span></a>
                                              <div class="progress mt-2" style="height: 5px;">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                            </div>
                                          </li>
                                          <li class="d-flex py-2 mb-2">
                                            <div class="avatar rounded no-thumbnail"><i class="fa fa-file-code-o fa-lg"></i></div>
                                            <div class="flex-fill ms-3">
                                              <a href="{{route('admin.properties.report.pdf')}}"><span>Property_Report.pdf <i class='fa fa-download'></i></span></a>
                                              <div class="progress mt-2" style="height: 5px;">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                            </div>
                                          </li>
                                          <!-- <li class="d-flex py-2 mb-2">
                                            <div class="avatar rounded no-thumbnail"><i class="fa fa-file-code-o fa-lg"></i></div>
                                            <div class="flex-fill ms-3">
                                              <span>bootstrap.min.css</span>
                                              <div class="progress mt-2" style="height: 5px;">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                            </div>
                                          </li> -->
                                        </ul>
                                        <!-- <small class="text-muted">Showing 4 out of 24 downloads.</small> -->
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                    <div class="card">
                                      <div class="card-header">
                                        <h6 class="card-title m-0">Latest Activities</h6>
                                        <!-- widgest: Card more action icon -->
                                       <!--  <div class="dropdown morphing scale-left">
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
                                      <!-- <div class="card-body">
                                        <h3>$7,431.14 USD</h3>
                                        
                                        <div class="progress rounded-pill mb-2" style="height: 5px;">
                                          <div class="progress-bar chart-color1" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                          <div class="progress-bar chart-color2" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                          <div class="progress-bar chart-color3" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                          <span>0%</span>
                                          <span>100%</span>
                                        </div>
                                      </div> -->
                                      <!-- <div class="table-responsive border-top">
                                        <table class="table card-table table-nowrap mb-0">
                                          <tbody>
                                            <tr>
                                              <td><i class="fa fa-circle me-2 chart-text-color1"></i>Gross value</td>
                                              <td>$3,500.71</td>
                                              <td><span class="badge bg-success">+12.1%</span></td>
                                            </tr>
                                            <tr>
                                              <td><i class="fa fa-circle me-2 chart-text-color2"></i>Net volume from sales</td>
                                              <td>$2,980.45</td>
                                              <td><span class="badge bg-warning">+6.9%</span></td>
                                            </tr>
                                            <tr>
                                              <td><i class="fa fa-circle me-2 chart-text-color3"></i>New volume from sales</td>
                                              <td>$950.00</td>
                                              <td><span class="badge bg-danger">-1.5%</span></td>
                                            </tr>
                                            <tr>
                                              <td><i class="fa fa-circle me-2"></i>Other</td>
                                              <td>32</td>
                                              <td><span class="badge bg-success">1.9%</span></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div> -->

                                      <!-- Tab buttons -->
                                      <ul class="nav nav-pills mb-3 tabs" >
                                        <li class="nav-item">
                                          <button class="tab-button nav-link tab-button active" onclick="openTab(event, 'tab1')">Latest Properties</button>
                                        </li>
                                        <li class="nav-item">
                                          <button class="tab-button nav-link tab-button" onclick="openTab(event, 'tab2')">Latest Verified Properties</button>
                                        </li>
                                        <li class="nav-item">
                                          <button class="tab-button nav-link tab-button" onclick="openTab(event, 'tab3')">Latest Agents</button>
                                        </li>
                                        <li class="nav-item">
                                          <button class="tab-button nav-link tab-button" onclick="openTab(event, 'tab4')">Latest Bg Agents</button>
                                        </li>
                                      </ul>
                                      <!-- Tab content -->
                                      <div id="tab1" class="tab active">
                                        <table class="table dash_list" width="100%">
                                          <thead>
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">Property Id</th>
                                              <th scope="col">Property Name</th>
                                              <th scope="col">Property Price</th>
                                              <th scope="col">Country</th>
                                              <th scope="col">City</th>
                                              <th scope="col">Added By</th>
                                              <th scope="col">Agent Id / User Id</th>
                                                 <th scope="col">Approval Status</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($latest_properties as $latest_pro)
                                              <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><span class="badge rounded-pill bg-success">{{ $latest_pro->property_id }}</span></td>
                                                <td>{{ $latest_pro->name }}</td>
                                                <td>{{ $latest_pro->price }}</td>
                                                <td>{{ $latest_pro->country }}</td>
                                                <td>{{ $latest_pro->city }}</td>
                                                @if($latest_pro->agent_id == NULL)
                                                <td><span class="badge rounded-pill bg-primary">User</span></td>
                                                @elseif($latest_pro->user_id == 0 && $latest_pro->agent_id == 0)
                                                <td><span class="badge rounded-pill bg-primary">Admin</span></td>
                                                @elseif($latest_pro->user_id == NULL)
                                                <td><span class="badge rounded-pill bg-primary">Agent</span></td>
                                                @endif

                                                @if($latest_pro->agent_id == NULL)
                                                  <td><span class="badge rounded-pill bg-success">{{ $latest_pro->user_id }}</span></td>
                                                @elseif($latest_pro->user_id == NULL)
                                                  <td><span class="badge rounded-pill bg-success">{{ $latest_pro->agent_id }}</span></td>
                                                @elseif($latest_pro->user_id == 0 && $latest_pro->agent_id == 0)
                                                  <td><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                                                   @endif
                                                  <td>
                                                      @if($latest_pro->approval_status == 0)
                                                      <span class="badge rounded-pill bg-warning" style="color:white;">Pending</span>
                                                      
                                                      
                                                      @elseif($latest_pro->approval_status == 1)
                                                      
                                                       <span class="badge rounded-pill bg-primary">Approved</span>
                                                       @else
                                                        <span class="badge rounded-pill bg-danger" style="color:white;">Rejected</span>
                                                      @endif
                                                  </td>
                                               
                                              </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
                                      </div>
                                      <div id="tab2" class="tab">
                                        <table class="table dash_list" width="100%">
                                          <thead>
                                            <tr>
                                              <th scope="col">S.NO</th>
                                              <th scope="col">Property Id</th>
                                              <th scope="col">Property Name</th>
                                              <th scope="col">Property Price</th>
                                              <th scope="col">Country</th>
                                              <th scope="col">City</th>
                                              <th scope="col">Added By</th>
                                              <th scope="col">Agent Id / User Id</th>
                                              <th>
                                                Property  Status
                                                  
                                              </th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($latest_verified_properties as $verfied_property)
                                              <tr>
                                                  <td>{{ $loop->iteration }}</td>
                                                  <td><span class="badge rounded-pill bg-success">{{ $verfied_property->property_id }}</span></td>
                                                  <td>{{ $verfied_property->name }}</td>
                                                  <td>{{ $verfied_property->price }}</td>
                                                  <td>{{ $verfied_property->country }}</td>
                                                  <td>{{ $verfied_property->city }}</td>
                                                  @if($verfied_property->agent_id == NULL)
                                                  <td><span class="badge rounded-pill bg-primary">User</span></td>
                                                  @elseif($verfied_property->user_id == 0 && $verfied_property->agent_id == 0)
                                                  <td><span class="badge rounded-pill bg-primary">Admin</span></td>
                                                  @elseif($verfied_property->user_id == NULL)
                                                  <td><span class="badge rounded-pill bg-primary">Agent</span></td>
                                                  @endif

                                                  @if($verfied_property->agent_id == NULL)
                                                    <td><span class="badge rounded-pill bg-success">{{ $verfied_property->user_id }}</span></td>
                                                  @elseif($verfied_property->user_id == NULL)
                                                    <td><span class="badge rounded-pill bg-success">{{ $verfied_property->agent_id }}</span></td>
                                                  @elseif($verfied_property->user_id == 0 && $verfied_property->agent_id == 0)
                                                    <td><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                                                  @endif
                                                  <td>
                                                      @if($verfied_property->status == 0)
                                                      <span class="badge rounded-pill bg-success">Active</span>
                                                      
                                                      @else
                                                      <span class="badge rounded-pill bg-danger">Inactive</span>
                                                      @endif
                                                  </td>
                                                  
                                                  
                                              </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
                                      </div>
                                      <div id="tab3" class="tab">
                                        <table class="table dash_list" width="100%">
                                          <thead>
                                            <tr>
                                              <th scope="col">S.NO</th>
                                              <th scope="col">Agent Id</th>
                                              <th scope="col">Name</th>
                                              <th scope="col">Email</th>
                                              <th scope="col">Phone</th>
                                              <th scope="col">Country</th>
                                              <th scope="col">State</th>
                                              <th scope="col">Status</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($latest_agents as $agents)
                                                  <tr>
                                                  
                                                  @php
                                                  $agent= DB::table('agent_basic_information')->where('agent_id', $agents->agent_id)->first();
                                                  @endphp
                                                <td>{{ $loop->iteration }}</td>
                                                <td><span class="badge rounded-pill bg-success">{{ $agent->agent_id }}</span></td>
                                                <td>{{ $agents->name}}</td>
                                                @php
                                                $agents_info = DB::table('agents')->where('agent_id', $agent->agent_id)->pluck('email')->first();
                                            @endphp
                                            
                                            <td>
                                                @if(!empty($agents_info))
                                                    {{ $agents_info }}
                                                @endif
                                            </td>
                                                <td>{{ $agent->mobile }}</td>
                                                <td>{{ $agent->country_id }}</td>
                                                <td>{{ $agent->state }}</td>
                                                   @php
                                                $agents_status = DB::table('agents')->where('agent_id', $agents->agent_id)->pluck('status')->first();
                                            @endphp
                                            
                                            <td>@if($agents_status == 0)
                                                     <span class="badge rounded-pill bg-success">   Active</span>
                                                    @else
                                                      <span class="badge rounded-pill bg-danger">  Inactive </span>
                                            @endif
                                             
                                            </td>
                                              </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
                                      </div>
                                      <div id="tab4" class="tab">
                                        <table class="table dash_list" width="100%">
                                          <thead>
                                            <tr>
                                              <th scope="col">S.NO</th>
                                              <th scope="col">Agent Id</th>
                                              <th scope="col">Name</th>
                                              <th scope="col">Email</th>
                                              <th scope="col">Phone</th>
                                              <th scope="col">Country</th>
                                              <th scope="col">State</th>
                                              <th scope="col">Status</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($latest_bgagents as $agents)
                                            <tr>
                                                  
                                                  @php
                                                  $agent= DB::table('agent_basic_information')->where('agent_id', $agents->agent_id)->first();
                                                  @endphp
                                                <td>{{ $loop->iteration }}</td>
                                                <td><span class="badge rounded-pill bg-success">{{ $agent->agent_id }}</span></td>
                                                <td>{{ $agents->name}}</td>
                                                @php
                                                $agents_info = DB::table('agents')->where('agent_id', $agent->agent_id)->pluck('email')->first();
                                            @endphp
                                            
                                            <td>
                                                @if(!empty($agents_info))
                                                    {{ $agents_info }}
                                                @endif
                                            </td>
                                                <td>{{ $agent->mobile }}</td>
                                                <td>{{ $agent->country_id }}</td>
                                                <td>{{ $agent->state }}</td>
                                                   @php
                                                $agents_status = DB::table('agents')->where('agent_id', $agents->agent_id)->pluck('status')->first();
                                            @endphp
                                            
                                            <td>@if($agents_status == 0)
                                                     <span class="badge rounded-pill bg-success">   Active</span>
                                                    @else
                                                      <span class="badge rounded-pill bg-danger">  Inactive </span>
                                            @endif
                                             
                                            </td>
                                              </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
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
    <script>
      // JavaScript function to switch between tabs
      function openTab(evt, tabName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tab");
          for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tab-button");
          for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(tabName).style.display = "block";
          evt.currentTarget.className += " active";
      }

      // Show the first tab by default
      document.getElementById("tab1").style.display = "block";
    </script>

@endsection