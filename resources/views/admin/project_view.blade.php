@extends("admin.layouts.app")
@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('title', 'Admin Projects')
@section  ("content")
    <!-- start: page body -->
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
      <div class="container-fluid">
        <div class="row g-3">
          <div class="col-lg-8 col-md-12">
            <div class="card mb-3">
              <div class="card-body">
                <div class="d-flex flex-column">
                  <img src="{{url('/uploads/project_image/'.$projectviewdetails->project_image)}}" alt="" class="img-fluid rounded-2">
                  <div class="media-body m-0 mt-4 text-md-start text-center">
                    <h5 class="fw-bold">{{$projectviewdetails->project_name}} <span class="text-danger"> {{$projectviewdetails->project_status}}</span></h5>
                    <p><strong>Address:</strong> {{$projectviewdetails->project_address}}</p>
                    <h5></h5>
                    <h5>{{$projectviewdetails->project_description}}</h5>
                    <h5></h5>
                    <div class="d-flex flex-wrap align-items-center mt-2">
                      <!-- <div class="me-3 me-md-5">
                        <small class="text-muted">Bed</small>
                        <div class="mb-0 fw-bold">3</div>
                      </div> -->
                     <!--  <div class="me-3 me-md-5">
                        <small class="text-muted">Baths</small>
                        <div class="mb-0 fw-bold">2</div>
                      </div> -->
                      <div class="me-3 me-md-5">
                        <small class="text-muted">Sq Ft:</small>
                        <div class="mb-0 fw-bold">{{$projectviewdetails->project_area}}</div>
                      </div>
                      <div class="me-3 me-md-5">
                        <small class="text-muted">Review</small>
                        <div class="mb-0">
                          <i class="fa fa-star text-warning"></i>
                          <i class="fa fa-star text-warning"></i>
                          <i class="fa fa-star text-warning"></i>
                          <i class="fa fa-star text-warning"></i>
                          <i class="fa fa-star-half-full text-warning"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-4">
              <div class="card-header">
                <h6 class="card-title mb-0">General Amenities</h6>
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
                @php
                $generalss= json_decode($projectviewdetails->general_amenities)
                @endphp
                @foreach($generalss as $key)
                {{$key}},

                @endforeach
                <!--<table class="table mb-0">
                  <tr>
                    <td>Swimming pool</td>
                    <td>Air Conditioning</td>
                    <td>Internet</td>
                  </tr>
                  <tr>
                    <td>Radio</td>
                    <td>Balcony</td>
                    <td>Roof terrace</td>
                  </tr>
                  <tr>
                    <td>Cable TV</td>
                    <td>Electricity</td>
                    <td>Terrace</td>
                  </tr>
                  <tr>
                    <td>Cofee pot</td>
                    <td>Oven</td>
                    <td>Towelwes</td>
                  </tr>
                  <tr>
                    <td>Computer</td>
                    <td>Grill</td>
                    <td>Parquet</td>
                  </tr>
                  <tr>
                    <td>Dishwasher</td>
                    <td>Near Green Zone</td>
                    <td>Near Church</td>
                  </tr>
                  <tr>
                    <td>Near Hospital</td>
                    <td>Near School</td>
                    <td>Near Shop</td>
                  </tr>
                  <tr>
                    <td>Natural Gas</td>
                    <td></td>
                    <td></td>
                  </tr>
                </table>-->
              </div>
            </div>
            <!--<div class="card mb-4 fieldset border border-primary">
              <span class="fieldset-tile text-primary bg-body">Nearby Education <i class="fa fa-graduation-cap mx-2"></i></span>
              <table class="table card-table mb-0">
                <tr>
                  <td>Eladia's Kids (3.13 km)</td>
                  <td align="right">
                    <span class="me-4">10k reviews</span>
                  </td>
                  <td align="right">
                    <span class="rating ms-4 hidden-xs">
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star-half-full text-warning"></i>
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Gear Up With ACLS (4.66 km)</td>
                  <td align="right">
                    <span class="me-4">5k reviews</span>
                  </td>
                  <td align="right">
                    <span class="rating ms-4 hidden-xs">
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star-o text-warning"></i>
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Brooklyn Brainery (3.31 km)</td>
                  <td align="right"><span class="me-4">2k reviews</span></td>
                  <td align="right">
                    <span class="rating ms-4 hidden-xs">
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star-half-full text-warning"></i>
                    </span>
                  </td>
                </tr>
              </table>
            </div>-->
            <!--<div class="card mb-4 fieldset border border-primary">
              <span class="fieldset-tile text-primary bg-body"><i class="fa fa-heartbeat mx-2"></i> Health & Medical</span>
              <table class="table card-table mb-0">
                <tr>
                  <td>Anata Medical Store (1.55km)</td>
                  <td align="right">
                    <span class="me-4">584k reviews</span>
                  </td>
                  <td align="right">
                    <span class="rating ms-4 hidden-xs">
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star-half-full text-warning"></i>
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Surgon Care (5.25km)</td>
                  <td align="right">
                    <span class="me-4">5k reviews</span>
                  </td>
                  <td align="right">
                    <span class="rating ms-4 hidden-xs">
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star-o text-warning"></i>
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div>City Center Helth (1.00km)</div>
                  </td>
                  <td align="right"><span class="me-4">2k reviews</span></td>
                  <td align="right">
                    <span class="rating ms-4 hidden-xs">
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star-half-full text-warning"></i>
                    </span>
                  </td>
                </tr>
              </table>
            </div>-->
            <!--<div class="card mb-3 fieldset border border-primary">
              <span class="fieldset-tile text-primary bg-body"><i class="fa fa-truck mx-2"></i> Transportation</span>
              <table class="table card-table mb-0">
                <tr>
                  <td>Metro Station (3.55km)</td>
                  <td align="right">
                    <span class="me-4">584k reviews</span>
                  </td>
                  <td align="right">
                    <span class="rating ms-4 hidden-xs">
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star-half-full text-warning"></i>
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Bus Stop (3.75km)</td>
                  <td align="right">
                    <span class="me-4">5k reviews</span>
                  </td>
                  <td align="right">
                    <span class="rating ms-4 hidden-xs">
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star-o text-warning"></i>
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div>Airport (22.55km)</div>
                  </td>
                  <td align="right"><span class="me-4">2k reviews</span></td>
                  <td align="right">
                    <span class="rating ms-4 hidden-xs">
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star-half-full text-warning"></i>
                    </span>
                  </td>
                </tr>
              </table>
            </div>-->
            <div class="card">
              <div class="card-header">
                <h6 class="card-title">Property Location</h6>
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
                @if($projectviewdetails->project_location == null)

              <iframe src="{{$projectviewdetails->project_location}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              @else
              <h5>Not Available</h5>
              @endif
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12">
            <div class="card mb-3">
              <div class="card-body">
                <div class="text-center">
                  <img src="{{url('/uploads/agents/'.DB::table('agent_basic_information')->where(['agent_id' => $projectviewdetails->agent_id])->pluck('file')->first())}}" alt="" class="rounded-circle">
                  <div class="media-body mt-4 text-center">
                    <h5 class="fw-bold mb-1">{{DB::table('agents')->where(['agent_id' => $projectviewdetails->agent_id])->pluck('name')->first()}}</h5>
                    <div class="text-muted mb-1"><i class="fa fa-phone">{{DB::table('agent_basic_information')->where(['agent_id' => $projectviewdetails->agent_id])->pluck('phoneno')->first()}}</i> </div>
                    <div class="text-muted mb-3"><i class="fa fa-envelope"></i> {{DB::table('agents')->where(['agent_id' => $projectviewdetails->agent_id])->pluck('email')->first()}}</div>
                    <ul class="d-flex justify-content-center list-unstyled">
                      <li><a title="facebook" href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                      <li class="mx-3"><a title="twitter" href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                      <li><a title="instagram" href="javascript:void(0);"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                    <!--<ul class="list-unstyled mb-0 px-lg-5 px-md-4 p-0">
                      <li class="mb-3">
                        <div class="mb-1">Marketing</div>
                        <div class="progress" style="height: 3px;">
                          <div class="progress-bar" role="progressbar" style="width: 89%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                      <li class="mb-3">
                        <div class="mb-1">Maths</div>
                        <div class="progress" style="height: 3px;">
                          <div class="progress-bar bg-warning" role="progressbar" style="width: 76%;" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                      <li class="mb-3">
                        <div class="mb-1">Communication</div>
                        <div class="progress" style="height: 3px;">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                      <li>
                        <div class="mb-1">English</div>
                        <div class="progress" style="height: 3px;">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                    </ul>-->
                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-3">
              <div class="card-body">
                <h6 class="card-title mb-3">More Details</h6>
                <div class="table-responsive">
                  <table class="table table-sm table-striped align-middle table-bordered mb-0">
                    <tbody>
                      <tr>
                        <th scope="row">Avg Price:</th>
                        <td>{{$projectviewdetails->avg_price}}  /- Rs</td>
                      </tr>
                      <tr>
                        <th scope="row">Contract type: </th>
                        <td><span class="badge bg-primary">{{$projectviewdetails->project_payment_type}}</span></td>
                      </tr>
                      <tr>
                        <th scope="row">Portion Sizes:</th>
                        <td>{{$projectviewdetails->portion_sizes}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Project Area</th>
                        <td>{{$projectviewdetails->project_area}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Configurations :</th>
                        <td>{{$projectviewdetails->configurations}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Launch Date:</th>
                        <td>{{$projectviewdetails->launch_date}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Project Location:</th>
                        <td>{{$projectviewdetails->project_location}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Listed for:</th>
                        <td>15 days</td>
                      </tr>
                      <tr>
                        <th scope="row">Available:</th>
                        <td><span class="badge bg-primary">{{$projectviewdetails->project_status}}</span></td>
                      </tr>
                      <tr>
                        <th scope="row">Pets:</th>
                        <td>Pets Allowed</td>
                      </tr>
                      <tr>
                        <th scope="row">Bedrooms:</th>
                        <td>3</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
      <!--       <div class="card mb-3">
              <div class="card-body">
                <h6 class="card-title mb-3">Request Inquiry</h6>
                <form>
                  <div class="form-floating mb-2">
                    <input type="text" class="form-control" placeholder="Name">
                    <label>Name</label>
                  </div>
                  <div class="form-floating mb-2">
                    <input type="text" class="form-control" placeholder="Mobile No.">
                    <label>Mobile No.</label>
                  </div>
                  <div class="form-floating mb-2">
                    <input type="text" class="form-control" placeholder="Email">
                    <label>Email</label>
                  </div>
                  <div class="form-floating mb-2">
                    <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                    <label>Description</label>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="submit" class="btn btn-default">Cancel</button>
                </form>
              </div>
            </div> -->
          </div>
        </div> <!-- Row end  -->
      </div>
    </div>
@endsection
    