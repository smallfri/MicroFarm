<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>MicroFarmManager.com - Login</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <!-- ===== Animation CSS ===== -->
    <link href="/css/animate.css" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="/css/style.css" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="mini-sidebar">
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
    @if (Session::has('flash_message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">&times;</button>
            {{ Session::get('flash_message') }}
        </div>
    @endif
    @if (Session::has('flash_error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">&times;</button>
            {{ Session::get('flash_error') }}
        </div>
    @endif
    @if (Session::has('flash_success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">&times;</button>
            {{ Session::get('flash_success') }}
        </div>
    @endif

    @include('flash::message')
    <div class="login-box">
        <div class="white-box">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div style="text-align: center;">
                    <img src="/images/logo-medium.png">
                </div>
                <h3 class="box-title m-b-20">Sign In</h3>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input type="email" id="" name="email" class="form-control" placeholder="Email address">
                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        {{--<div class="checkbox checkbox-primary pull-left p-t-0">--}}
                            {{--<input id="checkbox-signup" type="checkbox">--}}
                            {{--<label for="checkbox-signup"> Remember me </label>--}}
                        {{--</div>--}}
                        <a href="/password/reset" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot Your Password?</a> </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>
                {{--<div class="row">--}}
                    {{--<div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">--}}
                        {{--<div class="social">--}}
                            {{--<a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>--}}
                            {{--<a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Don't have an account? <a href="/register" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                    </div>
                </div>
            </form>
            {{--<form class="form-horizontal" method="POST" action="{{ route('login') }}">--}}
                {{--{{ csrf_field() }}--}}
                {{--<div class="form-group ">--}}
                    {{--<div class="col-xs-12">--}}
                        {{--<h3>Recover Password</h3>--}}
                        {{--<p class="text-muted">Enter your Email and instructions will be sent to you! </p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group ">--}}
                    {{--<div class="col-xs-12">--}}
                        {{--<input class="form-control" type="text" required="" placeholder="Email">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group text-center m-t-20">--}}
                    {{--<div class="col-xs-12">--}}
                        {{--<button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</form>--}}













        </div>
    </div>
</section>
<!-- jQuery -->
<script src="/plugins/components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="/js/sidebarmenu.js"></script>
<!--slimscroll JavaScript -->
<script src="/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="/js/custom.js"></script>
<!--Style Switcher -->
<script src="/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
