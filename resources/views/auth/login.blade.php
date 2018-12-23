<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
    <title>MicroFarmManager.com - Register</title>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900"
          rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/ionicons.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/linearicons.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/open-iconic.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/pe-icon-7-stroke.css">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="/assets/vendor/css/rtl/bootstrap.css" class="theme-settings-bootstrap-css">
    <link rel="stylesheet" href="/assets/vendor/css/rtl/appwork.css" class="theme-settings-appwork-css">
    <link rel="stylesheet" href="/assets/vendor/css/rtl/theme-corporate.css" class="theme-settings-theme-css">
    <link rel="stylesheet" href="/assets/vendor/css/rtl/colors.css" class="theme-settings-colors-css">
    <link rel="stylesheet" href="/assets/vendor/css/rtl/uikit.css">
    <link rel="stylesheet" href="/assets/css/demo.css">

    <script src="assets/vendor/js/material-ripple.js"></script>
    <script src="assets/vendor/js/layout-helpers.js"></script>

    <!-- Theme settings -->
    <!-- This file MUST be included after core stylesheets and layout-helpers.js in the <head> section -->
    <script src="/assets/vendor/js/theme-settings.js"></script>
    <script>
        window.themeSettings = new ThemeSettings({
            cssPath: '/assets/vendor/css/rtl/',
            themesPath: '/assets/vendor/css/rtl/'
        });
    </script>

    <!-- Core scripts -->
    <script src="/assets/vendor/js/pace.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Libs -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
    <!-- Page -->
    <link rel="stylesheet" href="/assets/vendor/css/pages/authentication.css">
</head>

<body>
<div class="page-loader">
    <div class="bg-primary"></div>
</div>

<!-- Content -->
<div class="authentication-wrapper authentication-3">

    <div class="authentication-inner">

        <!-- Side container -->
        <!-- Do not display the container on extra small, small and medium screens -->
        <div class="d-none d-lg-flex col-lg-8 align-items-center ui-bg-cover ui-bg-overlay-container p-5"
             style="background-image: url('/images/microgreens_home1-min.jpg');">
            <div class="ui-bg-overlay bg-dark opacity-50"></div>

            <!-- Text -->
            <div class="w-100 text-white px-5">
                <h1 class="display-2 font-weight-bolder mb-4">Micro Farm <br>MANAGER</h1>
                <div class="text-large font-weight-light">
                    Micro Farm Manager is an application designed to manage your microgreens business from seed to
                    sale.
                </div>
            </div>
            <!-- /.Text -->
        </div>
        <!-- / Side container -->

        <!-- Form container -->
        <div class="d-flex col-lg-4 align-items-center bg-white p-5">
            <!-- Inner container -->
            <!-- Have to add `.d-flex` to control width via `.col-*` classes -->
            <div class="d-flex col-sm-7 col-md-5 col-lg-12 px-0 px-xl-4 mx-auto">

                <div class="w-100">

                    <!-- Logo -->
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="/register"><button class="btn btn-warning">Begin your FREE access!
                            </button></a></div>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="">
                            <div class="w-100 position-relative">
                                <img src="/images/logo-large.png">
                            </div>
                        </div>
                    </div>
                    <!-- / Logo -->

                    <h4 class="text-center text-lighter font-weight-normal mt-5 mb-0">Login to Your Account.</h4>

                    <!-- Form -->
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="form-label">Your email</label>
                            <input id="email" type="email" name="email" class="form-control" placeholder="Email address"
                                   value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input id="password" type="password" class="form-control"
                                   placeholder="Password" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-4">Sign In</button>
                        <div class="text-light small mt-4">
                            By clicking "Sign In", you agree to our
                            <a href="javascript:void(0)">terms of service and privacy policy</a>. We’ll occasionally
                            send you account related emails.
                        </div>

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<a href="{{ url('/auth/github') }}" class="btn btn-github"><i class="fa fa-github"></i> Github</a>--}}
                                {{--<a href="{{ url('/auth/twitter') }}" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>--}}
                                {{--<a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fab fa-facebook"></i> Facebook</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </form>
                    <!-- / Form -->

                    <div class="text-center text-muted">
                        Ready to sign up? <a href="/register">It's free!</a>
                    </div><div class="text-center text-muted">
                        Forgot your password? <a href="/password/reset">Reset Password</a>
                    </div>

                </div>
            </div>
        </div>
        <!-- / Form container -->

    </div>
</div>

<!-- / Content -->

<!-- Core scripts -->
<script src="/assets/vendor/libs/popper/popper.js"></script>
<script src="/assets/vendor/js/bootstrap.js"></script>
<script src="/assets/vendor/js/sidenav.js"></script>

<!-- Libs -->
<script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<!-- Demo -->
<script src="/assets/js/demo.js"></script>

</body>

</html>