<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','Login') | {{ config('app.name') }}</title>
    @include('include.user-backend.cssfilesColor')
</head>

<body class="mini-sidebar">
<!-- begin page-cover -->
<div class="page-cover"></div>
<!-- end page-cover -->

<!-- begin #page-loader -->
<div id="page-loader" class="fade show"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    @include('include.user-backend.topnavColor')
    <div class="container-fluid">
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image" style="background-image: url(/assets/img/login-bg/microGreensLogin.png)"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><b>Micro</b> Farm Manager</h4>
                    <p>
                        <b>Micro Farm Manager</b> is an application designed to manage your microgreens business from seed to sale..
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        {{--<span class="logo"></span> <b>Color</b> Admin--}}
                        {{--<small>responsive bootstrap 3 admin template</small>--}}
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-in"></i>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group m-b-15">
                            <input type="email" id="" name="email" class="form-control" placeholder="Email address">
                            @if ($errors->has('email'))
                                <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group m-b-15">
                            <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required />
                        </div>
                        <div class="checkbox checkbox-css m-b-30">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="login-buttons">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Sign me in</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40">
                            Not a member yet? Click <a href="/register">here</a> to register.
                        </div>
                        <hr />
                        <p class="text-center">
                            &copy; MicroFarmManager.com All Right Reserved 2018
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
    </div>
</div>
<div class="clearfix"></div>

</body>
@include('include.user-backend.jsfilesColor')
</html>