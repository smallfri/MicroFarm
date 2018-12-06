<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title>MicroFarmManager.com - Register</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <link href="/assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"/>
    <link href="/assets/plugins/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/assets/plugins/font-awesome/5.3/css/all.min.css" rel="stylesheet"/>
    <link href="/assets/plugins/animate/animate.min.css" rel="stylesheet"/>
    <link href="/assets/css/default/style.min.css" rel="stylesheet"/>
    <link href="/assets/css/default/style-responsive.min.css" rel="stylesheet"/>
    <link href="/assets/css/default/theme/default.css" rel="stylesheet" id="theme"/>
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="/assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
    <script src="/assets/plugins/jquery/jquery-3.3.1.min.js"></script>
</head>
<?php use Illuminate\Contracts\Session\Session;?>

<body class="pace-top bg-white">
<!-- begin #page-loader -->
<div id="page-loader" class="fade show"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
@include('flash-message')

<div id="page-container" class="fade">

    <!-- begin register -->
    <div class="register register-with-news-feed">
        <!-- begin news-feed -->
        <div class="news-feed">
            <div class="news-image" style="background-image: url(/assets/img/login-bg/microgreens_home1-min.jpg)"></div>
            <div class="news-caption">
                <h4 class="caption-title"><b>Micro</b>FarmManager.com</h4>
                <p>
                    Micro Farm Manager is an application designed to manage your microgreens business from seed to
                    sale..
                </p>
            </div>
        </div>
        <!-- end news-feed -->
        <!-- begin right-content -->
        <div class="right-content">
            <!-- begin register-header -->
            <h1 class="register-header">
                Sign Up
            </h1>
            <!-- end register-header -->
            <!-- begin register-content -->
            <div class="register-content">
                <form class="form-horizontal form-material" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <label class="control-label">Name <span class="text-danger">*</span></label>
                    <div class="row row-space-10">
                        <div class="col-md-12 m-b-15">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                   placeholder="Full Name" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <label class="control-label">Email <span class="text-danger">*</span></label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input id="email" type="email" name="email" class="form-control" placeholder="Email address"
                                   value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <label class="control-label">Password <span class="text-danger">*</span></label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input id="password-confirm" type="password" class="form-control"
                                   placeholder="Confirm Password" name="password_confirmation" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <label class="control-label">Re-enter password <span class="text-danger">*</span></label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input id="password" type="password" name="password" class="form-control"
                                   placeholder="Password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Sign Up</button>

                        </div>

                    </div>

                        <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                            Already a member? Click <a href="/login">here</a> to login.
                        </div>
                        <hr/>
                        <p class="text-center">
                            &copy; MicroFarmManager.com All Right Reserved 2018
                        </p>
                    </div>
                </form>
            </div>
            <!-- end register-content -->
        </div>
        <!-- end right-content -->
    </div>
    <!-- end register -->
    <!-- end theme-panel -->
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="/assets/plugins/jquery/jquery-3.3.1.min.js"></script>
    <script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <!--[if lt-->
    <script src="assets/crossbrowserjs/html5shiv.js"></script>
    <script src="/assets/crossbrowserjs/respond.min.js"></script>
    <script src="/assets/crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/assets/plugins/js-cookie/js.cookie.js"></script>
    <script src="/assets/js/theme/default.min.js"></script>
    <script src="/assets/js/apps.min.js"></script>
    <!-- ================== END BASE JS ================== -->

    <script>
        $(document).ready(function () {
            App.init();
        });
    </script>
</body>
</html>