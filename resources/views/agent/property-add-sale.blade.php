@extends("agent.layouts.app")

@section  ("content")
    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
      <div class="container-fluid">
        <div class="row g-3 mb-3 align-items-center">
          <div class="col">
            <ol class="breadcrumb bg-transparent mb-0">
              <li><a  href="Dashboard.php">Home </a></li>
              <li>/ Agent</li>
              <li class="breadcrumb-item active" aria-current="page">/ Add Property For Sale</li>
            </ol>
          </div>
        </div> <!-- .row end -->
        <div class="row align-items-center">
          <div class="col-auto">
          <h4 class=""> Hey, <span style="color: #BF9456">{{ Auth::guard('agent')->user()->name }}</span>! Welcome back, nice to see you again
           </h4>
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
        </div>
      </div>
    </div>
    <!-- start: page body -->
    <form method="post" action="property-sale-store" id="form">
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
                      <input type="text" class="form-control" name="name" placeholder="Property Name">
                      <label>Property Name: <b style="color: red;">*</b></label>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="location" placeholder="Property Location">
                      <label>Property Location: <b style="color: red;">*</b></label>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <div class="form-floating">
                      <textarea class="form-control" rows="4" name="description"  placeholder="Description"></textarea>
                      <label>Property Description: <b style="color: red;">*</b></label>
                    </div>
                  </div>
                  <div class="col-12">
                      <div class="d-flex">
                        <div class="form-check mb-0">
                          <label><h5>Property Status: <b style="color: red;">*</b></h5></label>
                        </div>
                        <div class="form-check mb-0 ms-3">
                          <select name="property_status">
                            <option value="Not Selected">Not Selected</option>
                            <option value="Active">Active</option>
                            <option value="Sold">Sold</option>
                            <option value="Under Constrution">Under Constrution</option>
                            <option value="Under Legal Agreement">Under Legal Agreement</option>
                            <option value="Under Registration">Under Registration</option>
                            <option value="Under Contract">Under Contract</option>
                          </select>
                          </div>
                      </div>
                    </div>
                    
                  <div class="col-12">
                    <h6 class="mt-5 mb-1">Property Information</h6>
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
                        <label><h5>Property Type: <b style="color: red;">*</b></h5></label>
                      </div>
                      <div class="form-check mb-0 ms-3">
                        <select name="appartment_type">
                          <option value="Not Selected">Not Selected</option>
                          <option value="appartment">Apartment</option>
                          <option value="farm house">Farm house</option>
                          <option value="villa">Villa</option>
                          <option value="corporate office">Corporate Office</option>
                          <option value="shoppingmall">Shopping Mall</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-3">
                      <div class="col">
                        <div class="form-floating">
                          <input type="text" class="form-control" name="price" placeholder="Price / Rent">
                          <label>Price / Rent: <b style="color: red;">*</b></label>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-floating">
                          <input type="text" class="form-control" name="bedsqft" placeholder="BedroomsSquare ft">
                          <label>BedroomsSquare ft</label>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-floating">
                          <input type="text" class="form-control" name="sqft" placeholder="Square ft">
                          <label>Square ft: <b style="color: red;">*</b></label>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-floating">
                          <input type="text" class="form-control" name="carparking" placeholder="Car Parking">
                          <label>Car Parking</label>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-floating">
                          <input type="text" class="form-control" name="year" placeholder="Year Built">
                          <label>Year Built: <b style="color: red;">*</b></label>
                        </div>
                      </div>
                    </div>
                    <div class="form-floating mt-3">
                      <textarea class="form-control" rows="4" name="propertyadd" placeholder="Property Address"></textarea>
                      <label>Property Address: <b style="color: red;">*</b></label>
                    </div>
                  </div>
                </div> <!-- Row end  -->
                <div class="row g-3">
                  <div class="col-12">
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
                  </div>
                  <div class="col-sm-2">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="total_sqft" placeholder="Total Sqft">
                      <label>Total Sqft: <b style="color: red;">*</b></label>
                    </div>
                  </div>

                </div> <!-- Row end  -->
                <div class="row g-3">
                  <div class="col-12">
                    <h6 class="mt-5 mb-1">General Amenities </h6>
                  </div>
                  <div class="col-12">
                    <div class="d-flex flex-wrap">
                      <div class="form-check mb-2 me-3">
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
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <label>Property Image <b style="color: red;">*</b></label>
                    <input class="form-control" type="file" name="image" id="formFile">
                  </div>
                  
                </div> <!-- Row end -->
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button type="submit" class="btn btn-default">Cancel</button>
              </div>
            </div>
          </div>
        </div> <!-- Row end  -->
      </div>
    </div>
  </form>
  @endsection