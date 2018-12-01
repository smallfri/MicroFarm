<!-- ===== Left-Sidebar ===== -->
<aside class="sidebar" role="navigation">
	<div class="scroll-sidebar">
		<div class="user-profile">
			<div class="dropdown user-pro-body">
				<div class="profile-image">
					<img src="" alt="user-img" class="img-circle">>
=					<a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="badge badge-danger">
                                    <i class="fa fa-angle-down"></i>
                                </span>
					</a>
					<ul class="dropdown-menu animated flipInY">
						{{--<li><a href="javascript:void(0);"><i class="fa fa-user"></i> Profile</a></li>--}}
						{{--<li><a href="javascript:void(0);"><i class="fa fa-inbox"></i> Inbox</a></li>--}}
						{{--<li role="separator" class="divider"></li>--}}
						{{--<li><a href="javascript:void(0);"><i class="fa fa-cog"></i> Account Settings</a></li>--}}
						{{--<li role="separator" class="divider"></li>--}}
						<li><a href="/logout"><i class="fa fa-power-off"></i> Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
		<nav class="sidebar-nav">
			<ul id="side-menu">
				<li><a href="{{url('/dashboard')}}" aria-expanded="false"><i class="icon-screen-desktop fa-fw"></i> <span class="hide-menu"> Dashboard</span></a></li>
				<li><a href="{{url('/seed/create')}}" aria-expanded="false"><i class="icon-direction fa-fw"></i> <span class="hide-menu">Seed Selection</span></a></li>
				<li><a href="{{url('/seed')}}" aria-expanded="false"><i class="icon-notebook fa-fw"></i> <span class="hide-menu">Growing Journal</span></a></li>
				<li><a href="{{url('/coupons')}}" aria-expanded="false"><i class="icon-tag fa-fw"></i> <span class="hide-menu">Coupons</span></a></li>
				<li><a href="{{url('/class-room')}}" aria-expanded="false"><i class=" icon-graduation fa-fw"></i> <span class="hide-menu">Class Room</span></a></li>
			</ul>
		</nav>
	</div>
</aside>
<!-- ===== Left-Sidebar-End ===== -->