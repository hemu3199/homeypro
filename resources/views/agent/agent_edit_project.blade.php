  @extends("agent.layouts.app")

  @section  ("content")

     
      <!-- start: page body -->
      <form method="post" action="" id="form" enctype="multipart/form-data">
        @csrf
      <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
          <div class="row g-3">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h6 class="card-title mb-0">Basic Information</h6>

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
                  <div class="row g-3">
                    <div class="col-md-6 col-sm-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="project_name" placeholder="Project Name" value="{{$projectviewdetails->project_name}}">
                        <label>Project Name <b style="color: red;">*</b> :</label>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="project_location" placeholder="Project Location" value="{{$projectviewdetails->project_location}}">
                        <label>Project Location <b style="color: red;">*</b> :</label>
                      </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <div class="form-floating">
                        <textarea class="form-control" rows="4" name="project_description"  placeholder="Description">{{$projectviewdetails->project_description}}</textarea>
                        <label>Project Description <b style="color: red;">*</b> :</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="d-flex">
                        <div class="form-check mb-0">
                          <label><h6>Project Type : <b style="color: red;">*</b></h6></label>
                        </div>
                        <div class="form-check mb-0 ms-0">
                          <select name="project_type">
                            <option label="select">Select</option>
                            <option value="Residential" {{ $projectviewdetails->project_type == "Residential" ? 'selected' : '' }}>Residential</option>
                            <option value="Commercial" {{ $projectviewdetails->project_type == "Commercial" ? 'selected' : '' }}>Commercial</option>
                           <!--  <option value="Sold">Sold</option>
                            <option value="Under Constrution">Under Constrution</option>
                            <option value="Under Legal Agreement">Under Legal Agreement</option>
                            <option value="Under Registration">Under Registration</option>
                            <option value="Under Contract">Under Contract</option> -->
                          </select>
                          </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="d-flex">
                        <div class="form-check mb-0">
                          <label><h6>Project Status: <b style="color: red;">*</b></h6></label>
                        </div>
                        <div class="form-check mb-0 ms-1">
                          <select name="project_status">
                            <option label="select" >Select</option>
                            <option value="Ready Plot" {{ $projectviewdetails->project_status == "Ready Plot" ? 'selected' : '' }}>Ready Plot</option>
                            <option value="Sold" {{ $projectviewdetails->project_status == "Sold" ? 'selected' : '' }}>Sold</option>
                            <option value="Under Constrution" {{ $projectviewdetails->project_status == "Under Constrution" ? 'selected' : '' }}>Under Constrution</option>
                            <!-- <option value="Under Legal Agreement">Under Legal Agreement</option>
                            <option value="Under Registration">Under Registration</option>
                            <option value="Under Contract">Under Contract</option> -->
                          </select>
                          </div>
                      </div>
                    </div>
                    
                    
                    
                    <!--<div class="col-12">
                      <div class="d-flex">
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="radio" id="Rent" name="property" value="Rent">
                          <label class="form-check-label" name="property" for="Rent">For Rent</label>
                        </div>
                        <div class="form-check mb-0 ms-3">
                          <input class="form-check-input" type="radio" id="Sell" name="property" value="Sell">
                          <label class="form-check-label" name="property" for="Sell">For Sell</label>
                        </div>
                      </div>
                    </div>-->
                    <div class="col-12">
                      <div class="d-flex">
                        <div class="form-check mb-0">
                          <label><h6>Project Payment Type: <b style="color: red;">*</b></h6></label>
                        </div>
                        <div class="form-check mb-0 ms-1  ">
                          <select name="project_payment_type">
                            <option label="select">Select</option>
                            <option value="One Time" {{ $projectviewdetails->project_payment_type == "One Time" ? 'selected' : '' }}>One Time</option>
                            <option value="EMI" {{ $projectviewdetails->project_payment_type == "EMI" ? 'selected' : '' }}>EMI</option>
                            <!-- <option value="villa">Villa</option>
                            <option value="corporate office">Corporate Office</option>
                            <option value="shoppingmall">Shopping Mall</option> -->

                          </select>
                          </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <h6 class="mt-5 mb-1">Property Information</h6>
                    </div>
                    
                   <div class="col-12">
                      <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-3">
                        <div class="col">
                          <div class="form-floating">
                            <input type="text" class="form-control" name="avg_price" placeholder="Price / Rent" value="{{$projectviewdetails->avg_price}}"> 
                            <label>Avg Price / Rent: <b style="color: red;">*</b></label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-floating">
                            <input type="text" class="form-control" name="portion_sizes" placeholder="BedroomsSquare ft" value="{{$projectviewdetails->portion_sizes}}">
                            <label>Portion Sizes </label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-floating">
                            <input type="text" class="form-control" name="project_area" placeholder="Square ft" value="{{$projectviewdetails->project_area}}">
                            <label>Project Area : <b style="color: red;">*</b></label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-floating">
                            <input type="text" class="form-control" name="configurations" placeholder="Car Parking" value="{{$projectviewdetails->configurations}}">
                            <label>Configurations</label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-floating">
                            <input type="text" class="form-control" name="launch_date" placeholder="Year Built" value="{{$projectviewdetails->launch_date}}">
                            <label>Launch Date: <b style="color: red;">*</b></label>
                          </div>
                        </div>
                      </div>
                      <div class="form-floating mt-3">
                        <textarea class="form-control" rows="4" name="project_address" placeholder="Property Address">{{$projectviewdetails->project_address}}</textarea>
                        <label>Project Address: <b style="color: red;">*</b></label>
                      </div>
                    </div> 
                  </div><!-- Row end  -->
                  <div class="row g-3">
                    <!--<div class="col-12">
                      <h6 class="mt-5 mb-1">Dimension</h6>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="diningroom" placeholder="Dining Room">
                        <label>Dining Room</label>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="kitchen" placeholder="Kitchen">
                        <label>Kitchen</label>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="livingroom" placeholder="Living Room">
                        <label>Living Room</label>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="masterbedroom" placeholder="Master Bedroom">
                        <label>Master Bedroom</label>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="bedroom2" placeholder="Bedroom 2">
                        <label>Bedroom 2</label>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="other" placeholder="Other Room">
                        <label>Other Room</label>
                      </div>
                    </div>-->
                   <!--  <div class="col-sm-2">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="total_sqft" placeholder="Total Sqft">
                        <label>Total Sqft: <b style="color: red;">*</b></label>
                      </div>
                    </div> -->

                  </div> <!-- Row end  -->
                  <div class="row g-3">
                    <!-- <div class="col-12">
                      <h6 class="mt-5 mb-1">General Amenities </h6>
                    </div> -->
                    <div class="col-12">
                      <div class="d-flex flex-wrap">
                 <!--        <div class="form-check mb-2 me-3">
                          <input class="form-check-input" type="checkbox" value="Swimming pool" name="general[]">
                          <label class="form-check-label" for="Swimming">Swimming pool</label>
                        </div>
                        <div class="form-check mb-2 me-3">
                          <input class="form-check-input" type="checkbox" value="Terrace" name="general[]">
                          <label class="form-check-label" for="Terrace">Terrace</label>
                        </div>
                        <div class="form-check mb-2 me-3">
                          <input class="form-check-input" type="checkbox" value="Air conditioning" name="general[]">
                          <label class="form-check-label" for="Air">Air conditioning</label>
                        </div>
                        <div class="form-check mb-2 me-3">
                          <input class="form-check-input" type="checkbox" value="Internet" name="general[]">
                          <label class="form-check-label" for="Internet">Internet</label>
                        </div>
                        <div class="form-check mb-2 me-3">
                          <input class="form-check-input" type="checkbox" value="Balcony" name="general[]">
                          <label class="form-check-label" for="Balcony">Balcony</label>
                        </div>
                        <div class="form-check mb-2 me-3">
                          <input class="form-check-input" type="checkbox" value="Cable tv" name="general[]">
                          <label class="form-check-label" for="Cable">Cable TV</label>
                        </div>
                        <div class="form-check mb-2 me-3">
                          <input class="form-check-input" type="checkbox" vale="Computer" name="general[]">
                          <label class="form-check-label" for="Computer">Computer</label>
                        </div>
                        <div class="form-check mb-2 me-3">
                          <input class="form-check-input" type="checkbox" value="Dishwasher" name="general[]">
                          <label class="form-check-label" for="Dishwasher">Dishwasher</label>
                        </div>
                        <div class="form-check mb-2 me-3">
                          <input class="form-check-input" type="checkbox" value="Near Green Zone" name="general[]">
                          <label class="form-check-label" for="Near">Near Green Zone</label>
                        </div>
                        <div class="form-check mb-2 me-3">
                          <input class="form-check-input" type="checkbox" value="Church" name="general[]">
                          <label class="form-check-label" for="Church">Near Church</label>
                        </div>
                        <div class="form-check mb-2 me-3">
                          <input class="form-check-input" type="checkbox" vale="Near Estate" name="general[]">
                          <label class="form-check-label" for="Estate">Near Estate</label>
                        </div>
                        <div class="form-check mb-2 me-3">
                          <input class="form-check-input" type="checkbox" value="Cofee pot" name="general[]">
                          <label class="form-check-label" for="Cofee">Cofee pot</label>
                        </div> -->
                      </div>
                    </div>
                    <div class="col-12">
                      <label>Project Image <b style="color: red;">*</b></label>
                      <input class="form-control" type="file" name="project_image" id="imageUpload">
                    </div>
                     <div class="col-12">
                      <label>Project Broucher <b style="color: red;">*</b></label>
                      <input class="form-control" type="file" name="project_broucher" id="imageUpload">
                    </div>
                  </div> <!-- Row end -->
                </div>
                <div class="card-footer">
                  <!--<button type="submit" class="btn btn-primary" name="submit">Submit</button>-->
                  
                    <button class="btn btn-primary" type="submit" herf="{{ route('agent.project_edit_details',$projectviewdetails->property_id) }}">Update</button>
                   <button type="submit" class="btn btn-default">Cancel</button>
                </div>
              </div>
            </div>
          </div> <!-- Row end  -->
        </div>
      </div>
    </form>

    @endsection
   