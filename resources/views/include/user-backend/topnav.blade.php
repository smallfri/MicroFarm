<!-- Main navbar -->
<div class="navbar navbar-default header-highlight">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{url('/')}}"><img src="{!! asset('/frontend/images/logo.png') !!}" alt=""></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    	<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
				</li>
				<li><label class="last-login">Last Login on {{Auth::user()->last_login}}</label></li>
				</li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				
			
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-user"></i>
						<span>{{Auth::user()->name}}</span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li>
							<a href="{{url('/profile/view')}}"><span class="w-20"><i class="icon-user-plus"></i></span> <span class="w-80">My profile</span></a>
						</li>
						<li><a href="{{url('/profile')}}"><span class="w-20"><i class="fa fa-edit"></i></span><span class="w-80">Edit Profile</span></a></li>
						<li><a href="{{url('/profile/change-password')}}"><span class="w-20"><i class="fa fa-lock"></i></span><span class="w-80">Change Password</span></a></li>
						
						<!--	<li><a href="#"><i class="fa fa-shopping-cart"></i>Purchase Packages</a></li>-->
						<li class="divider"></li>
						
						<li><a href="#" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" ><span class="w-20"><i class="icon-switch2"></i></span><span class="w-80">Logout</span></a></li>
					</ul>
				</li>
			</ul>
		</div>
</div>
<!-- /main navbar -->

@if (Auth::check())
<form id="logout-form" action="{{ url('/logout') }}" method="POST"style="display: none;">
    {{ csrf_field() }}
</form>
@endif
