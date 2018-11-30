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
    </head>
                    
    <body>
       
        @include('include.user-backend.topnav')
        <div class="page-container">
            <div class="page-content">
                @include('include.user-backend.sidebar')
                   {{--@include('include.user-backend.page_header')--}} 
                        @yield('content')
                        @include('include.user-backend.footer')
                    
            </div>
        </div>
    </body>
    @include('include.user-backend.jsfiles')
    @stack('script-head')
    @stack('js')
</body>
</html>