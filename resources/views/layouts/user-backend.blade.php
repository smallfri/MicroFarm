<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','Home') | {{ config('app.name') }}</title>
    @include('include.user-backend.cssfilesColor')
    <script src="/assets/plugins/jquery/jquery-3.3.1.min.js"></script>
</head>
<?php use Illuminate\Contracts\Session\Session;?>
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
    @include('include.user-backend.sidebarColor')
    <div id="content" class="content">
            @yield('content')
        </div>
    </div>
<div class="clearfix"></div>

</body>
@include('include.user-backend.jsfilesColor')
</html>