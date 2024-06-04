@extends("admin.layouts.app")
@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('title', 'Add Agent')
@section('content')

<div class="dashboard-content">
     <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>

     <form method="post" action="addagent" id="form" enctype="multipart/form-data">
    @csrf

 <div class="dasboard-widget-title fl-wrap">

                                        <h5><i class="fas fa-key"></i>Basic Information</h5>
                                        @if(session('message'))   
  <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
   @elseif(session('error'))
   <div class="alert alert-success" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
@endif
                                              @if ($errors->any())
        <div class="alert alert-danger">
                                                                        <ul >
                                                                            @foreach ($errors->all() as $error)
                                                                                <li style="color:red" class="alert alert-danger">{{ $error }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endif
                                    </div>
  <div class="dasboard-widget-box fl-wrap">


  <!--  1 <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
      1<div class="container-fluid"> -->
        <div class="custom-form">
        <div class="row g-3">
          <div class="col-12">
            <!-- <div class="card"> -->
              <div class="dasboard-widget-box nopad-dash-widget-box fl-wrap">
                                        <div class="edit-profile-photo">
                                            <img src="" name="profile_pic" class="respimg" alt="">
                                            <div class="change-photo-btn">
                                                <div class="photoUpload">
                                                    <span>  Upload New Photo</span>
                                                    <input type="file" class="upload" name="file" id="image1" accept=".gif, .jpg, .png"  >
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
                    
                        <label>Mobile <sup style="color:red;"> *</sup></label>
                      <input type="number" required class="form-control form-control-lg" name="mobile" placeholder="Enter here">
                    
                  
                  </div>
                  <div class="col-sm-6">
                   
                           <label>Your Personal Email<sup class="text-danger fs-6" >*</sup><span class="dec-icon"><i class="fa fa-envelope"></i></span></label>
                      <input type="email" class="form-control form-control-lg" name="email" required placeholder="Enter here">
                 
                
                  </div>
                  <div class="col-sm-6">
                   
                       <label>Website URL: <span class="dec-icon"><i class="fa fa-globe"></i></span></label>
                      <input type="text"  class="form-control form-control-lg" name="url" placeholder="Enter here">
                     
                   
                  </div>
                  <div class="col-sm-3">
                   
                       <label>Agent location <sup class="text-danger fs-6" >*</sup><span class="dec-icon"><i class="fas fa-map-marker"></i> </span></label>
                      <input type="text" required class="form-control form-control-lg" name="agentlocation" placeholder="Enter here">
                     
              
                  </div>
                    <div class="col-sm-3">
                   
                       <label>Agent location Pincode <sup class="text-danger fs-6" >*</sup><span class="dec-icon"><i class="fas fa-map-marker"></i> </span></label>
                      <input type="text" required class="form-control form-control-lg" name="agentlocpincode" placeholder="Enter here">
                     
                    
                  </div>
                  <div class="col-sm-6">
                      <label>Agent Address <sup class="text-danger fs-6" >*</sup></label>
                      <textarea  class="form-control form-control-lg" style="height: 100px;" required name="agentaddress" placeholder="Enter here"></textarea>
                      
                  
                  </div>
                 <!--  <div class="col-lg-12">
                    <b><label style="form-floating:left">Image : </label></b>
                    <input type="file" class="form-control" name="file" >
                  </div> -->
                  <div class="col-sm-12">
                   
                        <label>Description</label>
                      <textarea class="form-control" placeholder="Description"name="description" style="height: 100px"></textarea>
                    
                   
                  </div>
                  <div class="col-sm-12">
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
              </div>
            <!-- </div> -->
          </div>
          
        </div> 

        <!-- .row end -->
      </div>
      </div>
      <div>
            <div class="dasboard-widget-title fl-wrap">
                                        <h5><i class="fas fa-key"></i>Agents Account Information</h5>
                                    </div>
            <!-- <div class="card"> -->
              <!-- <div class="card-header">
                <h6 class="card-title mb-0">Agents Account Information</h6>
              </div> -->
               <div class="dasboard-widget-box fl-wrap">
              <div class="custom-form">
              <!-- <div class="card-body"> -->
                <div class="row g-3">
                  <div class="col-sm-6">
                   
                      <label>Company Email ID <sup class="text-danger fs-6" >*</sup><span class="dec-icon"><i class="far fa-user"></i></span></label>
                      <input type="text" class="form-control form-control-lg" name="company_email" required placeholder="Enter here">
                      
                  
                  </div>
                  <div class="col-sm-6">
                
                         <label>Phone <sup class="text-danger fs-6" >*</sup><span class="dec-icon"><i class="fa fa-phone"></i></span></label>
                      <input type="text" required class="form-control form-control-lg" name="phoneno" placeholder="Enter here">
                   
                    
                  </div>
                  <div class="col-sm-6">
                   
                        <label>Password <sup class="text-danger fs-6" >*</sup><span class="dec-icon"><i class="fa fa-key"></i></span></label>

                      <input type="password" class="form-control form-control-lg" name="password" required  placeholder="Enter here">
                    
               
                  </div>
                  <div class="col-sm-6">
                    
                             <label>Confirm Password <sup class="text-danger fs-6" >*</sup>
                             <span class="dec-icon"><i class="fa fa-key"></i></span></label>
                      <input type="password" class="form-control form-control-lg" name="cpassword" required placeholder="Enter here">
               

                  </div>

                 <!-- <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn btn-default">Cancel</button>
                  </div>-->
                </div>
              </div>
            </div>
            <!-- </div> -->
          </div>
          <div>
              <div class="dasboard-widget-title fl-wrap">
                                        <h5><i class="fas fa-key"></i>Social Information</h5>
                                    </div>
           
               <div class="dasboard-widget-box fl-wrap">
              <div class="custom-form">
                <div class="row g-3">
                  <div class="col-sm-6">
                   
                       <label>Facebook <span class="dec-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span></label>
                      <input type="text" class="form-control form-control-lg" name="face" placeholder="Enter here">
                     
                   
                  </div>
                  <div class="col-sm-6">
                   
                        <label>Twitter <span class="dec-icon"><i class="fa fa-twitter" aria-hidden="true"></i></span></label>
                      <input type="text" class="form-control form-control-lg" name="twitter" placeholder="Enter here">
                    
                  
                  </div>
                  <div class="col-sm-6">
               
                       <label>Google <span class="dec-icon"><i class="fa fa-google" aria-hidden="true"></i></span></label>
                      <input type="text" class="form-control form-control-lg" name="google" placeholder="Enter here">
                     
                 
                  </div>
                  <div class="col-sm-6">
                    
                      <label>Linkedin  <span class="dec-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></span></label>
                      <input type="text" class="form-control form-control-lg" name="linkedin" placeholder="Enter here">
                      
                   
                  </div>
                  <!--<div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn btn-default">Cancel</button>
                  </div>-->
                </div>
              </div>
            </div>
            <!-- </div> -->
          </div>
          <div class="col-sm-12 ">
           
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button type="submit" class="btn btn-default" style="border:1px solid black;color: black;">Cancel</button>
          </div>
    <!-- </div>1 -->
  </form>
</div>
  @endsection