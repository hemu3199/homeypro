@extends("admin.layouts.app")
@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('title', 'Add BackGround Check')
@section('content')
<div class="dashboard-content">
   <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
        @if(session('message'))   
        <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
         @elseif(session('error'))
         <div class="alert alert-success" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
      @endif
        @if ($errors->any())
         <div class="alert alert-danger">
                  <ul >
                     @foreach ($errors->all() as $error)
                 <li style="color:red">{{ $error }}</li>
              @endforeach
            </ul>
        </div>
       @endif
    

     <form method="post" action="bgaddagent" id="form" enctype="multipart/form-data">
    @csrf
     <div class="dasboard-widget-title fl-wrap">
                                        <h5><i class="fas fa-key"></i>ADD BackGround Verification Agent</h5>
       </div>
       <div class="dasboard-widget-box fl-wrap">
    <!-- <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3"> -->
      <div class="custom-form">
        <div class="row g-3">
          <div class="col-12">
                      <div class="dasboard-widget-box nopad-dash-widget-box fl-wrap">
                                        <div class="edit-profile-photo">
                                            <img src="" name="profile_pic" class="respimg" alt="">
                                            <div class="change-photo-btn">
                                                <div class="photoUpload">
                                                    <span>  Upload New Photo</span>
                                                    <input type="file" class="upload" name="file" id="image1" accept=".gif, .jpg, .png" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-wrap bg-parallax-wrap-gradien">
                                            <div class="bg"  data-bg=""></div>
                                        </div>
                                        <div class="change-photo-btn cpb-2  ">
                                            <div class="photoUpload color-bg">
                                                <span> <i class="fa fa-camera"></i> Change Cover </span>
                                                <input type="file" class="upload" name="background_image" id="image1" accept=".gif, .jpg, .png" >
                                            </div>
                                        </div>
                    </div>
            <div class="card">
              <div class="card-header">
                <h6 class="card-title mb-0">Basic Information </h6>
              </div>
              <div class="card-body">

                <div class="row g-3">
                  <div class="col-sm-6">
                      <label>First Name <sup class="text-danger fs-6" >*</sup><span class="dec-icon"><i class="far fa-user"></i></span></label>
                  
                      <input type="text" class="form-control form-control-lg" name="fname" required placeholder="Enter here">
                    
                    
                  </div>
                  <div class="col-sm-6">
             
                       <label>Last Name<sup class="text-danger fs-6" >*</sup><span class="dec-icon"><i class="far fa-user"></i></span></label>
                      <input type="text" class="form-control form-control-lg" name="lname" required placeholder="Enter here" name="lname">
                     
                  
                  </div>
                  <div class="col-sm-3">
                     <label>Date of Birth <sup class="text-danger fs-6" >*</sup></label>
                  
                      <input type="date" class="form-control form-control-lg" required name="dob" placeholder="Enter here">
                     
              
                  </div>
                  <div class="col-sm-3">
                    <label>Select <sup class="text-danger fs-6" >*</sup></label>
                      <select class="form-control form-select form-control-lg" name="gender" required tabindex="-98">
                        <option value="gender">- Gender - </option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">others</option>
                      </select>
                      
                  
                  </div>
                  <div class="col-sm-3">
                     <label>Speciality <span class="dec-icon"><i class="fa fa-superpowers"></i></span></label>
                  
                      <input type="text" class="form-control form-control-lg" name="speciality" placeholder="Enter here">
                     
                  
                  </div>
                  <div class="col-sm-3">
                    <label>Mobile : <sup class="text-danger fs-6" >*</sup></label>
                      <input type="number" class="form-control form-control-lg" name="mobile" placeholder="Enter here">
                     
                   
                  </div>
                  <div class="col-sm-6">
                    <label>Your Email<sup class="text-danger fs-6" >*</sup><span class="dec-icon"><i class="fa fa-envelope"></i></span></label>
                  
                      <input type="email" class="form-control form-control-lg" name="email" required placeholder="Enter here">
                      
                    
                  </div>
                 
                    <div class="col-sm-6">
                      <label>Location Pincode <sup class="text-danger fs-6" >*</sup>:<span class="dec-icon"><i class="fas fa-map-marker"></i> </span></label>
                   
                      <input type="text" class="form-control form-control-lg" name="agentlocpincode" placeholder="Enter here">
                      
                   
                  </div>
                  <div class="col-sm-12">
                    <label>Address :</label>
                      <textarea  class="form-control form-control-lg" style="height: 100px;" name="agentaddress" placeholder="Enter here"></textarea>
                     
                    
                  </div>
               

                  
                </div>

              </div>
            </div>
          </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title mb-0">BackGround Verification Account Information</h6>
              </div>
              <div class="card-body">
                <div class="row g-3">
          
                    <div class="col-sm-6">
                    <label>Select Country <sup class="text-danger fs-6" >*</sup></label>
                      <select class="form-control form-select form-control-lg" name="country" required tabindex="-98">
                        <option label="Not Selected">- Country - </option>
                         <option value="india">INDIA</option>
                            <option value="usa">USA</option>
                      </select>
                    </div>
                     <div class="col-sm-6">
                    <label>Select State :<sup class="text-danger fs-6" >*</sup></label>
                      <select class="form-control form-select form-control-lg" name="state" required tabindex="-98">
                        
                             <option label="Not Selected">- State -</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Karnataka">Karnataka</option>
                      </select>
                      
                  
                  </div>
      
               </div>
              </div>
            </div>
          </div>
         
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title mb-0">Agents Account Information</h6>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-sm-6">
                    <label>User Company Email <sup class="text-danger fs-6" >*</sup><span class="dec-icon"><i class="far fa-user"></i></span></label>
                      <input type="text" class="form-control form-control-lg" name="company_email" placeholder="Enter here">
                     
                  
                  </div>
                  <div class="col-sm-6">
                      <label>Phone <sup class="text-danger fs-6" >*</sup></label>
                      <input type="number" class="form-control form-control-lg" name="phoneno" placeholder="Enter here">
                   
              
                  </div>
                  <div class="col-sm-6">
                    <label>Password <sup class="text-danger fs-6" >*</sup><span class="dec-icon"><i class="fa fa-key"></i></span></label>
                      <input type="password" class="form-control form-control-lg" name="password" placeholder="Enter here">
                     
                   
                  </div>
                  <div class="col-sm-6">
                        <label>Confirm Password <sup class="text-danger fs-6" >*</sup><span class="dec-icon"><i class="fa fa-key"></i></span></label>
                      <input type="password" class="form-control form-control-lg" name="cpassword" placeholder="Enter here">
                  

                  </div>
                </div>
              </div>
            </div>
          </div>
         
          <div class="col-sm-6 ">
           
          <button type="submit" class="btn btn-icon btn-sm color-bg" name="submit">Submit</button>
        </div>
        <div class="col-sm-6">
                <button type="submit" class="btn btn-default" style="border: 1px solid black; color:#000">Cancel</button>
          </div>
        </div> <!-- .row end -->
      </div>
    </div>
  </form>
    <!-- dashboard-footer -->
                    <div class="dashboard-footer">
                        <div class="dashboard-footer-links fl-wrap">
                          
                        </div>
                        <a href="#main" class="dashbord-totop  custom-scroll-link"><i class="fas fa-caret-up"></i></a>
                    </div>
                    <!-- dashboard-footer end --> 
    </div>
  @endsection