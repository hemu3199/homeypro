
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
          <!-- Form -->
            <form class="row g-3" action="{{ route('agent-login') }}" method="post">
                @csrf
                @method('post')
               <!-- <input type="hidden" name="_token" value="xhissEojSnVTrAcy9mavudjs9BsSXPWf3CYlCN4C"> -->   
                            <div class="col-12 text-center mb-5">
                    <h1>Sign in</h1>
                    <span class="text-muted"></span>
                </div>
              <!--  <div class="col-12 text-center mb-4">
                    <a class="btn btn-lg btn-outline-secondary btn-block" href="#">
                        <span class="d-flex justify-content-center align-items-center">
                            <img class="avatar xs me-2" src="assets/images/google.svg" alt="Image Description">
                            Sign in with Google
                        </span>
                    </a>
                    <span class="dividers text-muted mt-4">OR</span>
                </div>-->
                <div class="col-12">
                    <div class="mb-2">
                        <label class="form-label">Email address</label>
                        <input type="email"  name="a_email" id="a_email" class="form-control form-control-lg"  value="admin@admin.com" placeholder="name@example.com" required />
                         @if ($errors->has('a_email'))
 <p class="text-danger">{{ $errors->first('a_email') }}</p>
 @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-2">
                        <div class="form-label">
                            <span class="d-flex justify-content-between align-items-center">
                                Password
                                <a class="text-primary" href="#">Forgot Password?</a>
                            </span>
                        </div>
                        <input type="password" name="password" id="password" class="form-control form-control-lg" value="secret" placeholder="***************" required />
                         @if ($errors->has('password'))
 <p class="text-danger">{{ $errors->first('password') }}</p>
 @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" >
                        <label class="form-check-label" for="flexCheckDefault">
                            Remember me
                        </label>
                    </div>
                </div>
                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-lg btn-block btn-dark lift text-uppercase" value="login"  />SIGN IN</button>
                     
                </div>
                <div class="col-12 text-center mt-4">
                    <br>
                     <span >Don't have an account yet? <a href="{{ route('register') }}"> Contact Register Here </a></span>
                </div>
                
            </form>
            <!-- End Form -->
           
        </div>
    </div>
</div>
                </div>
            </div>

            <!-- auth: footer -->
                    </div>
        <!-- Modal: Setting -->
       <!-- <div class="modal fade" id="SettingsModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-vertical right-side modal-dialog-scrollable">
        <div class="modal-content">
            <div class="px-xl-4 modal-header">
                <h5 class="modal-title">Theme Setting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="px-xl-4 modal-body custom_scroll">
                <!- start: color setting ->
                <div class="card fieldset border border-primary p-3 setting-theme mb-4">
                    <span class="fieldset-tile text-primary bg-card">Color Settings</span>
                    <ul class="list-unstyled d-flex choose-skin mb-0">
                        <li data-theme="black" class=""><div class="black"></div></li>
                        <li data-theme="indigo" class=""><div class="indigo"></div></li>
                        <li data-theme="blue" class="active"><div class="blue"></div></li>
                        <li data-theme="cyan" class=""><div class="cyan"></div></li>
                        <li data-theme="green" class=""><div class="green"></div></li>
                        <li data-theme="orange" class=""><div class="orange"></div></li>
                        <li data-theme="blush" class=""><div class="blush"></div></li>
                        <li data-theme="red" class=""><div class="red"></div></li>
                        <li data-theme="dynamic" class=""><div class="dynamic"><i class="fa fa-paint-brush"></i></div></li>
                    </ul>
                    <!- Settings: Theme dynamics ->
                    <div class="card fieldset border border-primary p-3 dt-setting mt-4">
                        <span class="fieldset-tile text-primary bg-card">Dynamic Color Settings</span>
                        <div class="row g-3">
                            <div class="col-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <button id="primaryColorPicker" class="btn bg-primary avatar xs me-2"></button>
                                        <label>Primary Color</label>
                                    </li>
                                    <li>
                                        <button id="secondaryColorPicker" class="btn bg-secondary avatar xs me-2"></button>
                                        <label>Secondary Color</label>
                                    </li>
                                    <li>
                                        <button id="BodyColorPicker" class="btn btn-outline-secondary bg-body avatar xs me-2"></button>
                                        <label>Site Background</label>
                                    </li>
                                    <li>
                                        <button id="CardColorPicker" class="btn btn-outline-secondary bg-card avatar xs me-2"></button>
                                        <label>Widget Background</label>
                                    </li>
                                    <li>
                                        <button id="BorderColorPicker" class="btn btn-outline-secondary bg-card avatar xs me-2"></button>
                                        <label>Border Color</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <button id="chartColorPicker1" class="btn chart-color1 avatar xs me-2"></button>
                                        <label>Chart Color 1</label>
                                    </li>
                                    <li>
                                        <button id="chartColorPicker2" class="btn chart-color2 avatar xs me-2"></button>
                                        <label>Chart Color 2</label>
                                    </li>
                                    <li>
                                        <button id="chartColorPicker3" class="btn chart-color3 avatar xs me-2"></button>
                                        <label>Chart Color 3</label>
                                    </li>
                                    <li>
                                        <button id="chartColorPicker4" class="btn chart-color4 avatar xs me-2"></button>
                                        <label>Chart Color 4</label>
                                    </li>
                                    <li>
                                        <button id="chartColorPicker5" class="btn chart-color5 avatar xs me-2"></button>
                                        <label>Chart Color 5</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!- start: Light/dark ->
                <div class="card fieldset border setting-mode mb-4">
                    <span class="fieldset-tile bg-card">Light/Dark & Contrast Layout</span>
                    <div class="c_radio d-flex text-center">
                        <label class="m-1 theme-switch" for="theme-switch">
                            <input type="checkbox" id="theme-switch" />
                            <span class="card p-2">
                                <img class="img-fluid" src="assets/images/dark-version.svg" alt="Dark Mode" />
                            </span>
                        </label>
                        <label class="m-1 theme-dark" for="theme-dark">
                            <input type="checkbox" id="theme-dark" />
                            <span class="card p-2">
                                <img class="img-fluid" src="assets/images/dark-theme.svg" alt="Theme Dark Mode" />
                            </span>
                        </label>
                        <label class="m-1 theme-high-contrast" for="theme-high-contrast">
                            <input type="checkbox" id="theme-high-contrast"/>
                            <span class="card p-2">
                                <img class="img-fluid" src="assets/images/high-version.svg" alt="High Contrast" />
                            </span>
                        </label>
                        <label class="m-1 theme-rtl" for="theme-rtl">
                            <input type="checkbox" id="theme-rtl"/>
                            <span class="card p-2">
                                <img class="img-fluid" src="assets/images/rtl-version.svg" alt="RTL Mode!" />
                            </span>
                        </label>
                    </div>
                </div>
                <!- start: Font setting ->
                <div class="card fieldset border setting-font mb-4">
                    <span class="fieldset-tile bg-card">Google Font Settings</span>
                    <div class="c_radio d-flex text-center font_setting">
                        <label class="m-1" for="font-opensans">
                            <input type="radio" name="font" id="font-opensans" value="font-opensans" />
                            <span class="card p-2">
                                <img class="img-fluid" src="assets/images/font-opensans.svg" alt="Dark Mode" />
                            </span>
                        </label>
                        <label class="m-1" for="font-quicksand">
                            <input type="radio" name="font" id="font-quicksand" value="font-quicksand" />
                            <span class="card p-2">
                                <img class="img-fluid" src="assets/images/font-quicksand.svg" alt="Dark Mode" />
                            </span>
                        </label>
                        <label class="m-1" for="font-nunito">
                            <input type="radio" name="font" id="font-nunito" value="font-nunito" checked />
                            <span class="card p-2">
                                <img class="img-fluid" src="assets/images/font-nunito.svg" alt="Dark Mode" />
                            </span>
                        </label>
                        <label class="m-1" for="font-raleway">
                            <input type="radio" name="font" id="font-raleway" value="font-raleway" />
                            <span class="card p-2">
                                <img class="img-fluid" src="assets/images/font-raleway.svg" alt="Dark Mode" />
                            </span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="px-xl-4 modal-footer d-flex justify-content-start text-center">
                <button type="button" id="save_changes" class="btn flex-fill btn-primary lift" data-bs-dismiss="modal">Save Changes</button>
                <button type="button" class="btn flex-fill btn-white border lift" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<a class="page-setting" href="#" title="Settings" data-bs-toggle="modal" data-bs-target="#SettingsModal"><i class="fa fa-gear text-light"></i></a>-->    </body>
</html>