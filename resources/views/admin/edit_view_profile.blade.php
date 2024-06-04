@extends("admin.layouts.app")
@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@php
$admin_id = Auth::guard('admin')->user()->id;
$record = DB::table('admin_basic_information')->where('admin_id', $admin_id)->first(); 
@endphp
@section('title', 'Admin')
@section('content')

<div class="dashboard-content">
  <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>

  @if(session('message'))   
    <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
  @elseif(session('error'))
    <div class="alert alert-success" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
  @endif
  @if ($record)
  <form id="form" action="{{ route('admin.editadminprofile') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="dasboard-widget-title fl-wrap">
      <h5><i class="fas fa-key"></i>Basic Information</h5>
    </div>
    <div class="dasboard-widget-box fl-wrap">
      <div class="custom-form">
        <div class="row g-3">
          <div class="col-12">
            <div class="card">
              <div class="dasboard-widget-box nopad-dash-widget-box fl-wrap">
                <div class="edit-profile-photo">
                  <img src="{{url('/uploads/admins/'.$profile_details->profile_image)}}" name="profile_image" class="respimg" alt="">
                  <div class="change-photo-btn">
                    <div class="photoUpload">
                      <span>  Upload New Photo</span>
                      <input type="file" class="upload" name="profile_image" id="image1" accept=".gif, .jpg, .png">
                    </div>
                  </div>
                </div>
                <div class="bg-wrap bg-parallax-wrap-gradien">
                  <div class="bg"  data-bg="{{url('/uploads/admins/'.$profile_details->background_image)}}"></div>
                </div>
                <div class="change-photo-btn cpb-2">
                  <div class="photoUpload color-bg">
                    <span> <i class="fa fa-camera"></i> Change Cover </span>
                    <input type="file" class="upload" name="background_image" id="image1" accept=".gif, .jpg, .png">
                  </div>
                </div>
              </div>
              <div class="card-body">
              <div class="row g-3">
                <div class="col-sm-6">
                    <label class="">{{ __('First Name') }} :<span class="dec-icon"><i class="far fa-user"></i></span></label>
                    <input type="text" name="first_name" class="form-control form-control-lg" value="{{optional($profile_details)->first_name}}">
                </div>
                <div class="col-sm-6">
                    <label class="">{{ __('Last Name') }} :<span class="dec-icon"><i class="far fa-user"></i></span></label>
                    <input type="text" name="last_name" class="form-control form-control-lg" value=" {{optional($profile_details)->last_name}}">
                </div>
                <div class="col-sm-6">
                    <label class="">{{ __('User Name') }} :<span class="dec-icon"><i class="fa fa-user"></i></span></label>
                    <input type="text" name="user_name" class="form-control form-control-lg" value="{{optional($profile_details)->user_name}}">
                </div>
                <div class="col-sm-6">
                    <label class="">{{ __('Email Id') }} :<span class="dec-icon"><i class="fa fa-envelope"></i></span></label>
                    <input type="email" name="email" class="form-control form-control-lg" value="{{Auth::guard('admin')->user()->email}}">
                </div>
                <div class="col-sm-3">
                    <label class="">{{ __('Mobile') }} :</label>
                    <input type="number" name="phoneno" class="form-control form-control-lg" value="{{optional($profile_details)->phoneno}}">
                </div>
                <div class="col-sm-3">
                    <label class="">{{ __('Company Mobile') }} :</label>
                    <input type="number" name="company_phoneno" class="form-control form-control-lg" value="{{optional($profile_details)->company_phoneno}}">
                </div>
                <div class="col-sm-3">
                    <label class="">{{ __('Gender') }} :<span class="dec-icon"><i class="far fa-user"></i></span></label>
                    <input type="text" name="gender" class="form-control form-control-lg" value="{{optional($profile_details)->gender}}">
                </div>
                <div class="col-sm-3">
                    <label class="">{{ __('Date of Birth') }} :</label>
                    <input type="date" name="date_of_birth" class="form-control form-control-lg" value="{{optional($profile_details)->date_of_birth}}">
                </div>
                <div class="col-sm-12">
                    <label class="">{{ __('Description ') }} :</label>
                    <textarea name="description" class="form-control" style="height: 100px">{{optional($profile_details)->description}}</textarea>
                </div>
                <div class="col-sm-6">
                    <label class="">{{ __('Country') }} :<span class="dec-icon"><i class="fa fa-location-arrow"></i></span></label>
                    <input type="text" name="country" class="form-control form-control-lg" value="{{optional($profile_details)->country}}">
                </div>
                <div class="col-sm-6">
                    <label class="">{{ __('State') }} :<span class="dec-icon"><i class="fa fa-address-card"></i></span></label>
                    <input type="text" name="state" class="form-control form-control-lg" value="{{optional($profile_details)->state}}">
                </div>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- .row end -->
    </div>
    <button class="btn btn-primary" type="submit" >Save Details</button>
    <button type="submit" class="btn btn-default" style="color:black;border: 1px solid black;">Cancel</button>
  </form>
  @else
  <form id="form" action="{{ route('admin.updateadminprofile') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="dasboard-widget-title fl-wrap">
      <h5><i class="fas fa-key"></i>Basic Information</h5>
    </div>
    <div class="dasboard-widget-box fl-wrap">
      <div class="custom-form">
        <div class="row g-3">
          <div class="col-12">
            <div class="card">
              <div class="dasboard-widget-box nopad-dash-widget-box fl-wrap">
                <div class="edit-profile-photo">
                  <img src="" name="profile_image" class="respimg" alt="">
                  <div class="change-photo-btn">
                    <div class="photoUpload">
                      <span>  Upload New Photo</span>
                      <input type="file" class="upload" name="profile_image" id="image1" accept=".gif, .jpg, .png">
                    </div>
                  </div>
                </div>
                <div class="bg-wrap bg-parallax-wrap-gradien">
                  <div class="bg"  data-bg=""></div>
                </div>
                <div class="change-photo-btn cpb-2">
                  <div class="photoUpload color-bg">
                    <span> <i class="fa fa-camera"></i> Change Cover </span>
                    <input type="file" class="upload" name="background_image" id="image1" accept=".gif, .jpg, .png">
                  </div>
                </div>
              </div>
              <div class="card-body">
              <div class="row g-3">
                <div class="col-sm-6">
                    <label class="">{{ __('First Name') }} :<span class="dec-icon"><i class="far fa-user"></i></span></label>
                    <input type="text" name="first_name" class="form-control form-control-lg" value="{{optional($profile_details)->first_name}}">
                </div>
                <div class="col-sm-6">
                    <label class="">{{ __('Last Name') }} :<span class="dec-icon"><i class="far fa-user"></i></span></label>
                    <input type="text" name="last_name" class="form-control form-control-lg" value=" {{optional($profile_details)->last_name}}">
                </div>
                <div class="col-sm-6">
                    <label class="">{{ __('User Name') }} :<span class="dec-icon"><i class="fa fa-user"></i></span></label>
                    <input type="text" name="user_name" class="form-control form-control-lg" value="{{optional($profile_details)->user_name}}">
                </div>
                <div class="col-sm-6">
                    <label class="">{{ __('Email Id') }} :<span class="dec-icon"><i class="fa fa-envelope"></i></span></label>
                    <input type="email" name="email" class="form-control form-control-lg" value="{{Auth::guard('admin')->user()->email}}">
                </div>
                <div class="col-sm-3">
                    <label class="">{{ __('Mobile') }} :</label>
                    <input type="number" name="phoneno" class="form-control form-control-lg" value="{{optional($profile_details)->phoneno}}">
                </div>
                <div class="col-sm-3">
                    <label class="">{{ __('Company Mobile') }} :</label>
                    <input type="number" name="company_phoneno" class="form-control form-control-lg" value="{{optional($profile_details)->company_phoneno}}">
                </div>
                <div class="col-sm-3">
                    <label class="">{{ __('Gender') }} :<span class="dec-icon"><i class="far fa-user"></i></span></label>
                    <input type="text" name="gender" class="form-control form-control-lg" value="{{optional($profile_details)->gender}}">
                </div>
                <div class="col-sm-3">
                    <label class="">{{ __('Date of Birth') }} :</label>
                    <input type="date" name="date_of_birth" class="form-control form-control-lg" value="{{optional($profile_details)->date_of_birth}}">
                </div>
                <div class="col-sm-12">
                    <label class="">{{ __('Description ') }} :</label>
                    <textarea name="description" class="form-control" style="height: 100px">{{optional($profile_details)->description}}</textarea>
                </div>
                <div class="col-sm-6">
                    <label class="">{{ __('Country') }} :<span class="dec-icon"><i class="fa fa-location-arrow"></i></span></label>
                    <input type="text" name="country" class="form-control form-control-lg" value="{{optional($profile_details)->country}}">
                </div>
                <div class="col-sm-6">
                    <label class="">{{ __('State') }} :<span class="dec-icon"><i class="fa fa-address-card"></i></span></label>
                    <input type="text" name="state" class="form-control form-control-lg" value="{{optional($profile_details)->state}}">
                </div>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- .row end -->
    </div>
    <button class="btn btn-icon btn-sm color-bg" type="submit" >Add Details</button>
    <button class="btn btn-default" style="color:black;border: 1px solid black;">Cancel</button>
  </form>
  @endif
</div>

@endsection
