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

                <section id="wrapper" class="login-register">
                    @if(session('status'))
                        {
                        <div class="alert alert-success">Thanks, an email has been set with password reset instructions.</div>
                        }
                    @endif
                    <div class="login-box">
                        <div class="white-box">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                                <h4>Password Reset</h4>
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                    @endif
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"/>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-default submit">Send Password Reset Link</button>
                                </div>

                                <div class="clearfix"></div>

                                <div class="separator">

                                    <div class="clearfix"></div>
                                    <br />

                                    <div>
                                        <h3>MicroFarmManager.com</h3>
                                        <p>&copy; 2018 All Rights Reserved.</p>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </section>
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



















