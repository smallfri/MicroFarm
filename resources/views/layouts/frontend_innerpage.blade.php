<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" lang="en-us"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8" lang="en-us"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie10 lt-ie9" lang="en-us"> <![endif]-->
<!--[if IE 9]> <html class="no-js lt-ie10 lt-ie9" lang="en-us"> <![endif]-->
<!--[if lt IE 10]> <html class="no-js lt-ie10" lang="en-us"> <![endif]-->
<!--[if !IE]> > <![endif]-->
<html class='no-js' lang='en'>
<!-- <![endif] -->
<head>
<meta name="description" content="" />
<meta name="author" content="" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<title>@yield('title') | {{ config('app.name', 'Micro Farm Manager') }}</title>

<meta content='initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width' name='viewport' />
<meta content='yes' name='apple-mobile-web-app-capable'>
<meta content='translucent-black' name='apple-mobile-web-app-status-bar-style'>
<link href="{{ asset('frontend/images/favicon.png')}}" rel='shortcut icon'>
<link href="{{ asset('frontend/images/favicon.ico')}}" rel='icon' type='image/ico'>

<link href="https://fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

<link href="{{ asset('frontend/css/style.css')}}" media="all" rel="stylesheet" type="text/css" />
<link href="{{ asset('frontend/css/bootstrap.min.css')}}" media="all" rel="stylesheet" type="text/css" />
<script src="{{ asset('frontend/js/modernizr.js')}}" type="text/javascript"></script>
    <!--[if IE]>
	<script src="js/html5.js"></script>
	<![endif]-->

</head>
<body class="general-bg">

<div id="wrapper">
    <header>
        <!-- header -->
           <!-- top header  -->
            <div class="social_wrapper" id="page-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-8">
                            <div class="social_icons">
                                <ul class="social_logos list-inline">
                                   @if($_setting->facebook)
                                    <li class="fb"><a href="{{$_setting->facebook}}" alt="Facebook icon" title="Facebook" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                                @endif  
                                @if($_setting->twitter)  
                                    <li class="tw"><a href="{{$_setting->twitter}}" alt="Twitter icon" title="Twitter" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
                                @endif
                                @if($_setting->googleplus) 
                                    <li class="gp"><a href="{{$_setting->googleplus}}" alt="Google Plus icon" title="Google Plus" target="_blank"><i class="fab fa-google-plus-square"></i></a></li>
                                @endif
                                @if($_setting->youtube)
                                    <li class="yt"><a href="{{$_setting->youtube}}" alt="Youtube icon" title="youtube Plus" target="_blank"><i class="fab fa-youtube-square"></i></i></a></li>
                                @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div><!-- end of top -->
            <!-- end of top header  -->

            <!-- navigation -->
        <!-- end of header -->
 
</header>
<div class="header-div">

        <div class="header-top-div  h-110 clearfix">
            <div class="container">
                <div class="row row-1">
                    <div class="logo-div">
                        <a href="{{url('/')}}"><img src="{{ asset('frontend/images/logo.png')}}" alt="logo" class="img-responsive" /></a>
                    </div><!-- end of logo-div -->
                    <div class="nav-div clearfix">
                        <nav class="navbar clearfix">
                            
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header clearfix">
                                <button type="button" class="navbar-toggle collapsed clearfix" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                                    
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse clearfix" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav clearfix">
                                    <li><a href="{{url('/')}}" class="active">Home</a></li>
                                    <li><a href="#contactus" class="down-arrow">contact us</a></li>
                                     @if (Auth::check())
											<li><a href="{{url('/Dashboard')}}" class="singup-link">Dashboard</a></li>
                                            <li><a href="#" class="singup-link" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Logout</a></li>
                                            
                                        @else
                                            <li><a href="{{url('register')}}">Sign Up</a></li>
                                            <li><a href="{{url('login')}}">Log In</a></li>
                                        @endif
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </nav>
                    </div><!-- end of nav-div -->
                </div>
            </div>
        </div>
    </div>
    @if (Auth::check())
       <form id="logout-form" action="{{ url('/logout') }}" method="POST"style="display: none;">
                       {{ csrf_field() }}
        </form>
     @endif
	 
	
                    @yield('content')

        <footer>
            <div class="copyright_wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="copyright_text">
                                <p class="font_champagne">Copyright &copy; 2018 microfarmmanager.com     </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer_social_icons">
                                <ul class="social_logos-footer list-inline">
                                     @if($_setting->facebook)
                                    <li class="fb"><a href="{{$_setting->facebook}}" alt="Facebook icon" title="Facebook" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                                @endif  
                                @if($_setting->twitter)  
                                    <li class="tw"><a href="{{$_setting->twitter}}" alt="Twitter icon" title="Twitter" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
                                @endif
                                @if($_setting->googleplus) 
                                    <li class="gp"><a href="{{$_setting->googleplus}}" alt="Google Plus icon" title="Google Plus" target="_blank"><i class="fab fa-google-plus-square"></i></a></li>
                                @endif
                                @if($_setting->youtube)
                                    <li class="yt"><a href="{{$_setting->youtube}}" alt="Youtube icon" title="youtube Plus" target="_blank"><i class="fab fa-youtube-square"></i></i></a></li>
                                @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- end of content-area -->
    

</div><!-- end of wrapper -->


<script src="{{ asset('frontend/js/jquery.min.js')}}" type="text/javascript"></script> 
<script src="{{ asset('frontend/js/bootstrap.min.js')}}" type="text/javascript"></script>
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

<script type="text/javascript" src="{{ asset('frontend/js/custom.js')}}"></script> 

<script>
    $(".down-arrow").click(function(e) {
		e.preventDefault();
		var section = $(this).attr("href");
		$("html, body").animate({
			scrollTop: $(section).offset().top-0
		});
		
	});
</script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script type="text/javascript">
 
    $("#formContact").validate({
        
        rules: { 
          
            name:{
                required:true
            },
            email:{
                required:true,
                email: true
            },
            phone:{
                required:true
            },
            subject:{
                required:true
            }
            
        },
        messages: {
            
            name:{
                required:"Name Is required"
            },
            email:{
                required:"Email is required",
                email: "Enter Valid Email address"
            },
            phone:{
                required:"Phone No is required"
            },
            subject:{
                required:"Subject is required"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
</script>
</body>
</html>
