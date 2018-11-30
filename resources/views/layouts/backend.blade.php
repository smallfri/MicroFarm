<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','Home') | {{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>
    <meta content='Flat administration template for Twitter Bootstrap. Twitter Bootstrap 3 template with Ruby on Rails support.'
          name='description'>
    <link href='{!! asset('assets/images/favicon.png') !!}' rel='shortcut icon' type='image/png'>
	
	
    @include('include.backend.cssfiles')
    @yield('headExtra')

    @stack('css')


</head>
<body class='contrast-blue without-footer'>
@include('include.backend.topnav')
<div id='wrapper'>
    <div id='main-nav-bg'></div>

    @include('include.backend.sidebar')

    <section id='content'>
        <div class='container'>

            <div class='row' id='content-wrapper'>
                <div class='col-xs-12'>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-header">
                                {{--  <h1 class="pull-left">
                                    @yield('title','<i class="icon-tint"></i>
                                    <span>Home</span>')

                                </h1>  --}}
                                <div class="pull-right">
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('include.backend.page_notification')

                    @yield('content')

                </div>
            </div>

        </div>
    </section>

    @include('include.backend.footer')
</div>

@include('include.backend.jsfiles')
@stack('js')
@stack('script-head')

</body>
</html>