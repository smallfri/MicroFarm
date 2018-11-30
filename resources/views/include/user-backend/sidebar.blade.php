<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

       <!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<!--<li class="navigation-header"><span>User Name</span> <i class="icon-menu" title="Main pages"></i></li>-->
								<li class="active"><a href="{{url('/Dashboard')}}"><i class="icon-home4"></i><span>Home</span></a></li>
								<li>
									<a href=""><i class="fa fa-user"></i><span>My Profile</span></a>
									<ul>
										<li><a href="{{url('/profile')}}"><i class="fa fa-edit sidebar-nav-icon"></i>Edit Profile</a></li>
										<li><a href="{{url('/profile/change-password')}}"><i class="fa fa-lock sidebar-nav-icon"></i>Change Password</a></li>
									</ul>
								</li>
								
								<li><a href="{{url('/seed/create')}}"><img class="icon-1" src="{!! asset('user-backend/assets/images/inventory.png')!!}" /><span>Seed</span></a></li>
								<li><a href="{{url('/seed')}}"><img class="icon-1" src="{!! asset('user-backend/assets/images/sales-icon-.png')!!}" /><span>Growing</span></a></li>
								
							
								<!-- /main -->
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->