@extends("agent.bg-layouts.bgagenthomey")
@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('title', 'Agent Properties')
@section('content')

<div class="dashboard-content">
                      <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>

  @if(session('message'))   
  <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
   @elseif(session('error'))
   <div class="alert alert-danger" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
@endif
  <form id="form" action="" method="post" enctype="multipart/form-data">
   @csrf
      <div class="dasboard-widget-title fl-wrap">
             <h5><i class="fas fa-key"></i>Basic Information</h5>
      </div>
      <div class="dasboard-widget-box fl-wrap">
          <div class="custom-form">
            <div class="row g-3">
              <div class="col-12">
                <div class="card">
                  <!-- <div class="card-header">
                    <h6 class="card-title mb-0">Basic Information</h6>
                  </div> -->
                     <div class="dasboard-widget-box nopad-dash-widget-box fl-wrap">
                                        <div class="edit-profile-photo">
                                            <img src="{{url('/uploads/agents/'.$profile_details->file)}}" name="profile_pic" class="respimg" alt="">
                                            <div class="change-photo-btn">
                                                <div class="photoUpload">
                                                   <!--  <span>  Upload New Photo</span>
                                                    <input type="file" class="upload" name="profile_pic" id="image1" accept=".gif, .jpg, .png" > -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-wrap bg-parallax-wrap-gradien">
                                            <div class="bg"  data-bg="{{url('/uploads/agents/'.$profile_details->background_image)}}"></div>
                                        </div>
                                       <!--  <div class="change-photo-btn cpb-2  ">
                                            <div class="photoUpload color-bg">
                                                <span> <i class="far fa-camera"></i> Change Cover </span>
                                                <input type="file" class="upload" name="cover_pic" id="image1" accept=".gif, .jpg, .png" >
                                            </div>
                                        </div> -->
                    </div>
                  <div class="card-body">
                    <div class="row g-3">
                              <div class="col-sm-6">
                                <label class="">{{ __('First Name') }} :<span class="dec-icon"><i class="far fa-user"></i></span></label>
                                <input type="text" name="fname" class="form-control form-control-lg" value="{{$profile_details->fname}}" disabled>
                              </div>
                              <div class="col-sm-6">
                                <label class="">{{ __('Last Name') }} :<span class="dec-icon"><i class="far fa-user"></i></span></label>
                                <input type="text" name="lname" class="form-control form-control-lg" value=" {{$profile_details->lname}}" disabled>
                              </div>
                              <div class="col-sm-3">
                                <label class="">{{ __('Date of Birth') }} :</label>
                                <input type="date" name="dob" class="form-control form-control-lg" value="{{$profile_details->dateofbirth}}" disabled>
                              </div>
                              <div class="col-sm-3">
                                <label class="">{{ __('Gender') }} :<span class="dec-icon"><i class="far fa-user"></i></span></label>
                                <input type="text" name="gender" class="form-control form-control-lg" value="{{$profile_details->gender}} " disabled>
                              </div>
                               <div class="col-sm-3">
                                <label class="">{{ __('Speciality') }} :<span class="dec-icon"><i class="fa fa-superpowers"></i></span></label>
                                <input type="text" name="speciality" class="form-control form-control-lg" value="{{$profile_details->speciality}} " disabled>
                              </div>
                              <div class="col-sm-3">
                                <label class="">{{ __('Mobile') }} :</label>
                                <input type="number" name="mobile" class="form-control form-control-lg" value="{{$profile_details->mobile}}" disabled>
                              </div>
                              <div class="col-sm-6">
                                <label class="">{{ __('Email Id') }} :<span class="dec-icon"><i class="fa fa-envelope"></i></span></label>
                                <input type="email" name="email" class="form-control form-control-lg" value="{{$profile_details->a_email}}" disabled>
                              </div>
                              <div class="col-sm-6">
                                <label class="">{{ __('Website URL') }} :<span class="dec-icon"><i class="fa fa-globe"></i></span></label>
                                <input type="text" name="url" class="form-control form-control-lg" value="{{$profile_details->url}} " disabled>
                              </div>
                              <div class="col-sm-12">
                                <label class="">{{ __('Description ') }} :</label>
                                <textarea name="description" class="form-control" readonly style="height: 100px" readonly>{{$profile_details->description}}</textarea>
                              </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="card-title mb-0">Agents Account Information :</h6>
                  </div>
                  <div class="card-body">
                    <div class="row g-3">
                            <div class="col-sm-6">
                              <label>User Name :<span class="dec-icon"><i class="far fa-user"></i></span></label>
                              <input type="text" class="form-control form-control-lg" name="username" value="{{$profile_details->username}}" disabled>
                            </div>
                            <div class="col-sm-6">
                              <label>Phone :</label>
                              <input type="number" class="form-control form-control-lg" name="phoneno" value="{{$profile_details->phoneno}}"disabled>
                            </div>
                            <!--  <div class="col-sm-6">
                              <label>Password :<span class="dec-icon"><i class="fa fa-key"></i></span></label>
                              <input type="Password" class="form-control form-control-lg" name="password" value="{{$profile_details->password}}"disabled>
                             </div>
                             <div class="col-sm-6">
                              <label>Conform Password :<span class="dec-icon"><i class="fa fa-key"></i></span></label>
                              <input type="Password" class="form-control form-control-lg" name="cpassword" value="{{$profile_details->cpassword}}" disabled>
                            </div> -->
                            <div class="col-sm-6">
                              <label>Agent location :<span class="dec-icon"><i class="fas fa-map-marker"></i> </span></label>
                              <input type="text" class="form-control form-control-lg" name="agentlocation" value="{{$profile_details->agentlocation}}" disabled>
                           </div>
                           <div class="col-sm-6">
                              <label>Agent location Pincode :<span class="dec-icon"><i class="fas fa-map-marker"></i> </span></label>
                              <input type="text" class="form-control form-control-lg" name="agentlocpincode" value="{{$profile_details->agentlocpincode}}" disabled>
                            </div>
                            <div class="col-sm-12">
                              <label>Address :</label>
                               <textarea  class="form-control " name="agentaddress"  style="height:100px;" readonly>{{$profile_details->agentaddress}}</textarea>
                             </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                 <div class="card">
                  <div class="card-header">
                    <h6 class="card-title mb-0">Social Information</h6>
                  </div>
                  <div class="card-body">
                    <div class="row g-3">
                      <div class="col-sm-6">
                        <label>Facebook <span class="dec-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span></label>
                          <input type="text" class="form-control form-control-lg" name="face" value="{{$profile_details->facebook}}" disabled>
                      </div>
                      <div class="col-sm-6">
                        <label>Twitter  <span class="dec-icon"><i class="fa fa-twitter" aria-hidden="true"></i></span></label>
                        <input type="text" class="form-control form-control-lg" name="twitter" value="{{$profile_details->twitter}}" disabled>
                       </div>
                      <div class="col-sm-6">
                        <label>Google  <span class="dec-icon"><i class="fa fa-google" aria-hidden="true"></i></span></label>
                        <input type="text" class="form-control form-control-lg" name="google" value="{{$profile_details->google}}" disabled>
                      </div>
                      <div class="col-sm-6">
                        <label>Linkedin  <span class="dec-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></span></label>
                          <input type="text" class="form-control form-control-lg" name="linkedin" value="{{$profile_details->linkedin}}" disabled>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            <div class="col-sm-12 ">
                 <a class="btn btn-primary" href="{{ route('agent.bgeditview') }}">Edit Details</a>
                <!-- <button type="submit" class="btn btn-default" style="color:black;border: 1px solid black;">Cancel</button> -->
              
              </div> 
            </div>
            </div> <!-- .row end -->
      </div>
    <!-- </div> -->
  </form>
</div>

@endsection