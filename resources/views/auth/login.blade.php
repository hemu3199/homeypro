
<!doctype html>
<html class="no-js " lang="en">
    <!-- Added by HTTrack -><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Responsive Bootstrap 5 admin template and web Application ui kit.">
        <meta name="keyword" content="LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects">
        <title>:: HOMEY :: Login</title>
        <link rel="icon" href="users/img/HomeyLo1.png" type="image/x-icon">
         <!-- Favicon-->
        <link rel="stylesheet" href="users/css/luno.style.min.css">
        <script src="users/bundles/libscripts.bundle.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript">
 function preventBack() {
 window.history.forward(); 
 }
 
 setTimeout("preventBack()", 0);
 
 window.onunload = function () { null };
 </script>
    </head>
    <body class="layout-1 font-nunito" data-luno="theme-blue">
        <!-- start: body area -->
        <div class="wrapper">

            <!-- auth: Header -->
            
            <!-- start: page body -->
            <div class="page-body auth px-xl-4 px-sm-2 px-0 py-lg-2 py-1"  style="background-image: url('users/img/login-background.jpg');opacity: 1;  " >
                <div class="container-fluid" >
                    <div class="row">
    <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center" >
        <div style="max-width: 26rem;">
            <div class="mb-4" style="border-color: white;"><span >
                <img src="users/img/HomeyLo.png" style="width: 500px; margin-left: -50px; margin-top: -160px; border: 1px double white; border-width: 5px;">
            </span>
        </div>
            <div class="mb-5" style="margin-top:140px">
                <h2 class="text-white">Welcome To</h2>
                 <span class="d-block mb-1 fs-4 fw-light text-white">our property management Partner</span>
            </div>
            <div class="mb-2" style="margin-top: 100px;">
                <a href="#" class="me-3 text-white">Home</a>
                <a href="#" class="me-3 text-white">About Us</a>
                <a href="#" class="me-3 text-white">FAQs</a>
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
        <div class="card shadow-sm w-100 p-4 p-md-5" style="max-width: 30rem; height: 95%; ">
             <div class="col-12 text-center mb-4">
                    <a class="btn btn-lg btn-outline-secondary btn-block" href="{{route('login_with_google')}}">
                        <span class="d-flex justify-content-center align-items-center">
                            <img class="avatar xs me-2" src="users/img/google.svg" alt="Image Description">
                            Sign in with Google
                        </span>
                    </a>
                    <span class="dividers text-muted mt-4">OR</span>
                </div>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form class="row g-3" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="col-12 text-center mb-5">
                    <h1>Sign in</h1>
                    <span class="text-muted"></span>
                </div>
            <!-- Email Address -->
            <div class="col-12">
                    <div class="mb-2">
                    
                <x-label for="email" :value="__('Email')"  class="form-label"/>

                <x-input id="email" class="form-control form-control-lg"  type="email" name="email" :value="old('email')" required autofocus />
            </div>
            </div>

            <!-- Password -->
            <div class="col-12">
                    <div class="mb-2">
                        <div class="form-label">
                            <span class="d-flex justify-content-between align-items-center">
                <x-label for="password" :value="__('Password')" />
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </span>
                <x-input id="password" class="form-control form-control-lg"
                                type="password"
                                name="password"
                                placeholder="***************"
                                required autocomplete="current-password" />
            </div>
</div></div>

            <!-- Remember Me -->
            <div class="col-12">
                    <div class="form-check">
                <label for="remember_me" class="form-check-label">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
</div>

            <div class="col-12 text-center mt-4">
                

                <x-button  class="btn btn-lg btn-block btn-dark lift text-uppercase" style="color:#000;">
                    {{ __('Log in') }}
                </x-button>
            </div>
            <div class="col-12 text-center mt-4">
                    <br>
                     <span >Don't have an account yet?<a href="{{ route('register') }}"> Contact Register Here </a></span>
                </div>
        </form>
        </div>
    </div>
</div>
                </div>
            </div>

            <!-- auth: footer -->
                    </div>
        </body>
</html>

