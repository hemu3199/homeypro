<!doctype html>
<html class="no-js " lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Responsive Bootstrap 5 admin template and web Application ui kit.">
        <meta name="keyword" content="LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects">
        <title>:: HOMEY :: Register</title>
        
        <link rel="icon" href="users/img/HomeyLo1.png" type="image/x-icon">
         <!-- Favicon-->
        <link rel="stylesheet" href="users/css/luno.style.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="users/bundles/libscripts.bundle.js"></script>
    </head>
    <body class="layout-1 font-nunito" data-luno="theme-blue">
        <!-- start: body area -->
        <div class="wrapper">

            <!-- auth: Header -->
            
            <!-- start: page body -->
            <div class="page-body auth px-xl-4 px-sm-2 px-0 py-lg-2 py-1" style="background-image: url('users/img/login-background.jpg');opacity: 1;  ">
                <div class="container-fluid">
                        <div class="row">
        <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center">
            <div style="max-width: 25rem;">
                <div class="mb-4">
                    <img src="users/img/HomeyLo.png" style="width: 500px; margin-left: -50px; margin-top: -160px; border: 1px double white; border-width: 5px;"> 
                </div>
                <div class="mb-5" style="margin-top:140px; ">
                    <h2 class="text-white">Welcome To <span></span> </h2>
                    <span class="d-block mb-1 fs-4 fw-light text-white">HOMEY PROPERTIES</span>

                </div>
                <!-- List Checked -->
               
                <div class="mb-2"  style="margin-top: 100px;">
                    <a href="#" class="me-3 text-white">Home</a>
                    <a href="#" class="me-3 text-white">About Us</a>
                    <a href="#" class="me-3" style="Color:white">FAQs</a>
                </div>
                <div>
                    <a href="#" class="me-3 color-400"><i class="fa fa-facebook-square fa-lg"></i></a>
                    <a href="#" class="me-3 color-400"><i class="fa fa-github-square fa-lg"></i></a>
                    <a href="#" class="me-3 color-400"><i class="fa fa-linkedin-square fa-lg"></i></a>
                    <a href="#" class="me-3 color-400"><i class="fa fa-twitter-square fa-lg"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex justify-content-center align-items-center">
            <div class="card shadow-sm w-100 p-4 p-md-5" style="max-width: 30rem; height: 89%; ">
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="col-12 text-center mb-8">
                        <h1>Create account</h1>
                    </div>
            <!-- Name -->
            <div class="col-12">
                <x-label for="name" :value="__('Full Name')" class="form-label"/>

                <x-input id="name" class="form-control form-control-lg" placeholder="Name" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="col-12">
                <x-label for="email" :value="__('Email address')" class="form-label"/>

                <x-input id="email" class="block mt-1 w-full" type="email" class="form-control form-control-lg" placeholder="Email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="col-12">
                <x-label for="password" :value="__('Password')" class="form-label"/>

                <x-input id="password" class="form-control form-control-lg" placeholder="Password"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="col-12">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="form-control form-control-lg"
                                type="password"
                                placeholder="Password Confirmation"
                                name="password_confirmation" required />
            </div>

            <div class="col-12 text-center mt-4" style="padding-bottom: 30px;">
            <x-button class="btn btn-sml btn-block btn-dark lift text-uppercase" style="color:#000;">
                    {{ __('Register') }}
            </x-button>
        </div>

            <div class="col-12 text-center mt-4" style="padding-bottom:40px;" >
            <span class="text-muted" >Already have an account?<a href="{{ route('login')}}" class="btn btn-base">Sign in here</a></span>

                
            </div>
        </form>
        </div>
    </div>

