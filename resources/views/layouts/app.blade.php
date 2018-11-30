<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','Home') | {{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>
    <meta content='Flat administration template for Twitter Bootstrap. Twitter Bootstrap 3 template with Ruby on Rails support.'
          name='description'>
    <link href='{!! asset('assets/images/favicon.png') !!}' rel='shortcut icon' type='image/png'>
    <!-- / START - page related stylesheets [optional] -->

    <!-- / END - page related stylesheets [optional] -->
    <!-- / bootstrap [required] -->
    <link href="{!! asset('assets/stylesheets/bootstrap/bootstrap.css') !!}" media="all" rel="stylesheet"
          type="text/css"/>
    <!-- / theme file [required] -->
    <link href="{!! asset('assets/stylesheets/lighttheme.css') !!}" media="all" id="color-settings-body-color"
          rel="stylesheet" type="text/css"/>
    <!-- / coloring file [optional] (if you are going to use custom contrast color) -->
    <link href="{!! asset('assets/stylesheets/theme-colors.css') !!}" media="all" rel="stylesheet" type="text/css"/>
    <!-- / demo file [not required!] -->
    <link href="{!! asset('assets/stylesheets/demo.css') !!}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{!! asset('assets/stylesheets/design.css') !!}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{!! asset('assets/stylesheets/style.css') !!}" media="all" rel="stylesheet" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{!! asset('assets/javascripts/ie/html5shiv.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('assets/javascripts/ie/respond.min.js') !!}" type="text/javascript"></script>
    <![endif]-->
</head>
<body class='contrast-blue login contrast-background'>
<div class='middle-container'>
    <div class='middle-row'>
        <div class='middle-wrapper'>
            <div class='login-container-header'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <div class='text-center'>
							<img src="{!! asset('assets/images/logo.png') !!}" class="deathapp_logo"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</div>


<!-- / jquery [required] -->
<script src="{!! asset('assets/javascripts/jquery/jquery.min.js') !!}" type="text/javascript"></script>
<!-- / jquery mobile (for touch events) -->
<script src="{!! asset('assets/javascripts/jquery/jquery.mobile.custom.min.js') !!}" type="text/javascript"></script>
<!-- / jquery migrate (for compatibility with new jquery) [required] -->
<script src="{!! asset('assets/javascripts/jquery/jquery-migrate.min.js') !!}" type="text/javascript"></script>
<!-- / jquery ui -->
<script src="{!! asset('assets/javascripts/jquery/jquery-ui.min.js') !!}" type="text/javascript"></script>
<!-- / jQuery UI Touch Punch -->
<script src="{!! asset('assets/javascripts/plugins/jquery_ui_touch_punch/jquery.ui.touch-punch.min.js') !!}"
        type="text/javascript"></script>
<!-- / bootstrap [required] -->
<script src="{!! asset('assets/javascripts/bootstrap/bootstrap.js') !!}" type="text/javascript"></script>
<!-- / modernizr -->
<script src="{!! asset('assets/javascripts/plugins/modernizr/modernizr.min.js') !!}" type="text/javascript"></script>
<!-- / retina -->
<script src="{!! asset('assets/javascripts/plugins/retina/retina.js') !!}" type="text/javascript"></script>
<!-- / theme file [required] -->
<script src="{!! asset('assets/javascripts/theme.js') !!}" type="text/javascript"></script>
<!-- / demo file [not required!] -->
<script src="{!! asset('assets/javascripts/demo.js') !!}" type="text/javascript"></script>
<!-- / START - page related files and scripts [optional] -->
<!-- / START - page related files and scripts [optional] -->
<script src="{!! asset('assets/javascripts/plugins/validate/jquery.validate.min.js') !!}"
        type="text/javascript"></script>
<script src="{!! asset('assets/javascripts/plugins/validate/additional-methods.js') !!}"
        type="text/javascript"></script>
<!-- / END - page related files and scripts [optional] -->

</body>
</html>