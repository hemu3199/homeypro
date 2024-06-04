@extends("admin.layouts.app")
@php
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('title', 'Admin')
@section('content')

<div class="dashboard-content">
    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dashboard Menu</div>
    <form id="form" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="dashboard-widget-title fl-wrap">
            <h5><i class="fas fa-key"></i> Basic Information</h5>
        </div>
        <div class="dashboard-widget-box fl-wrap">
            <div class="custom-form">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="card">
                            @if(session('message'))   
                            <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
                            @elseif(session('error'))
                            <div class="alert alert-success" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
                            @endif
                            <div class="dasboard-widget-box nopad-dash-widget-box fl-wrap">
                                <div class="edit-profile-photo">
                                    <img src=" {{url('/uploads/admins/'.$profile_details->profile_image)}}" name="profile_image" class="respimg" alt="">
                                </div>
                                <div class="bg-wrap bg-parallax-wrap-gradien">
                                    <div class="bg"  data-bg="{{url('/uploads/admins/'.$profile_details->background_image)}}"></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label class="">{{ __('First Name') }} :<span class="dec-icon"><i class="far fa-user"></i></span></label>
                                        <input type="text" name="first_name" class="form-control form-control-lg" value="{{optional($profile_details)->first_name}}" disabled>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="">{{ __('Last Name') }} :<span class="dec-icon"><i class="far fa-user"></i></span></label>
                                        <input type="text" name="last_name" class="form-control form-control-lg" value=" {{optional($profile_details)->last_name}}" disabled>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="">{{ __('User Name') }} :<span class="dec-icon"><i class="fa fa-user"></i></span></label>
                                        <input type="text" name="user_name" class="form-control form-control-lg" value="{{optional($profile_details)->user_name}} " disabled>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="">{{ __('Email Id') }} :<span class="dec-icon"><i class="fa fa-envelope"></i></span></label>
                                        <input type="email" name="email" class="form-control form-control-lg" value="{{optional($profile_details)->email}}" disabled>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="">{{ __('Mobile') }} :</label>
                                        <input type="number" name="phoneno" class="form-control form-control-lg" value="{{optional($profile_details)->phoneno}}" disabled>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="">{{ __('Company Mobile') }} :</label>
                                        <input type="number" name="company_phoneno" class="form-control form-control-lg" value="{{optional($profile_details)->company_phoneno}}" disabled>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="">{{ __('Gender') }} :<span class="dec-icon"><i class="far fa-user"></i></span></label>
                                        <input type="text" name="gender" class="form-control form-control-lg" value="{{optional($profile_details)->gender}} " disabled>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="">{{ __('Date of Birth') }} :</label>
                                        <input type="date" name="date_of_birth" class="form-control form-control-lg" value="{{optional($profile_details)->date_of_birth}}" disabled>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="">{{ __('Description ') }} :</label>
                                        <textarea name="description" class="form-control" readonly style="height: 100px" readonly>{{optional($profile_details)->description}}</textarea>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="">{{ __('Country') }} :<span class="dec-icon"><i class="fa fa-location-arrow"></i></label>
                                        <input type="text" name="country" class="form-control form-control-lg" value="{{optional($profile_details)->country}}" disabled>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="">{{ __('State') }} :<span class="dec-icon"><i class="fa fa-address-card"></i></label>
                                        <input type="text" name="state" class="form-control form-control-lg" value="{{optional($profile_details)->state}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                        @php
                        $admin_id = Auth::guard('admin')->user()->id;
                        $record = DB::table('admin_basic_information')->where('admin_id', $admin_id)->first(); 
                        @endphp
                        @if ($record)
                        <div class="col-sm-12 ">
                            <a class="btn btn-primary" href="{{ route('admin.editview') }}">Edit Details</a>
                        </div>
                        @else
                        <div class="col-sm-12 ">
                            <a class="btn btn-primary" href="{{ route('admin.add.profile.details') }}">Update Details</a>
                        </div>
                        @endif
                      <!-- <div class="col-sm-12 ">
                        <a class="btn btn-primary" href="{{ route('admin.editview') }}">Edit Details</a>
                    </div> -->
                </div>
            </div> <!-- .row end -->
        </div>
        <!-- </div> -->
    </form>
</div>

@endsection
