<nav id="sidebar">
	<div id="sidebar-scroll">
		<div class="sidebar-content">
			<div class="side-header side-content">
				<button class="btn btn-link text-gray pull-right visible-xs visible-sm" type="button" data-toggle="layout" data-action="sidebar_close">
					<i class="fa fa-times"></i>
				</button>

				<a class="h5 text-white" href="{{ route('home') }}">
					<span class="h4 font-w500 sidebar-mini-hide">{{ Setting::get('app.name') }}</span>
				</a>
			</div>
			<div class="side-content">
				<ul class="nav-main">
					<li>
						<a class="active" href="{{ route('home') }}"><i class="si si-home"></i><span class="sidebar-mini-hide">Home</span></a>
					</li>
					<li>
						<a href=""><i class="si si-grid"></i><span class="sidebar-mini-hide">Browse</span></a>
					</li>
					<li>
						<a href=""><i class="si si-tag"></i><span class="sidebar-mini-hide">Tag Directory</span></a>
					</li>
					<li>
						<a href=""><i class="si si-question"></i><span class="sidebar-mini-hide">FAQs</span></a>
					</li>
					<li>
						<a href=""><i class="si si-bubble"></i><span class="sidebar-mini-hide">Contact Us</span></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>

<!--nav class="navbar navbar-default navbar-fixed-top" id="main-navbar">
	<div class="container">
		<div id="navbar" class="navbar-collapse collapse">
			@if(Auth::check())
			@set('user', Auth::user())
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Hi, {{ $user->username }}</a>
					<ul class="dropdown-menu">
						@if ($user->is_admin)
						<li><a href="{{ route('admin.home') }}">Admin Panel</a></li>
						<li class="nav-divider"></li>
						@endif
						<li><a href="{{ route('user.home') }}">My Profile</a></li>
						<li><a href="{{ route('user.password') }}">Change Password</a></li>
						<li><a href="{{ route('logout.get') }}">Sign Out</a></li>
					</ul>
				</li>
			</ul>
			@else
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ route('register') }}">Sign Up</a></li>
				<li><a href="{{ route('login') }}">Sign In</a></li>
			</ul>
			@endif
		</div>
	</div>
</nav-->
