<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','Home') | {{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>
    <meta content='Flat administration template for Twitter Bootstrap. ' name='description'>
    <link href="{!! asset('assets/images/favicon.png') !!}" rel='shortcut icon' type='image/png'>
    @include('include.user-backend.cssfiles')
    @yield('headExtra')
    @stack('css')
    {{--<link href="/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">--}}
    {{--<!-- ===== Plugin CSS ===== -->--}}
    <link href="/plugins/components/icheck/skins/all.css" rel="stylesheet">
    <!-- ===== Animation CSS ===== -->
{{--<link href="/css/animate.css" rel="stylesheet">--}}
{{--<!-- ===== Custom CSS ===== -->--}}
{{--<link href="/css/style.css" rel="stylesheet">--}}
<!-- ===== Color CSS ===== -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link href="/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <!-- ===== Animation CSS ===== -->
{{--<link href="/css/animate.css" rel="stylesheet">--}}
<!-- ===== Custom CSS ===== -->
    <link href="/css/style.css" rel="stylesheet">

    <link href="/css/colors/green.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!--<script src="/plugins/components/jquery/dist/jquery.min.js"></script>-->
    <![endif]-->
</head>

<body class="mini-sidebar">
<div id="wrapper">
    @include('include.user-backend.topnav')
    @include('include.user-backend.sidebar')
    <div class="page-wrapper">
        @if (Session::has('flash_message'))
            <div class="alert alert-success" style="margin: 35px 35px 0px 35px;">
                <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">&times;</button>
                {{ Session::get('flash_message') }}
            </div>
        @endif
        @if (Session::has('flash_error'))
            <div class="alert alert-error">
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
            @if ($errors->any())
                <div style="margin-left:20px;margin-top:20px;">
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul></div>
            @endif


        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</div>
<div class="clearfix"></div>

</body>
@include('include.user-backend.jsfiles')
@stack('script-head')
@stack('js')
</body>
</html>