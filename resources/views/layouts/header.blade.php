<header id="header-navbar" class="content-mini content-mini-full">
	<div class="content-boxed">
		<ul class="nav-header pull-right">
			<li class="js-header-search header-search">
				<form class="form-horizontal" method="post">
					<div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
						<input class="form-control rf-search" type="text" placeholder="Search.." autocomplete="off">
						<span class="input-group-addon"><i class="si si-magnifier"></i></span>
					</div>
				</form>
			</li>
			@if (Auth::check())
			@include('user.menubar')
			@else
			<li><a class="h5" href="{{ route('login') }}"><span class="h5 font-w300">Sign In</span></a></li>
			<li><a class="h5" href="{{ route('register') }}"><span class="h5 font-w300">Register</span></a></li>
			@endif
		</ul>
		<ul class="nav-header pull-left">
			<li class="header-content">
				<a class="h5" href="{{ route('home') }}">
					<span class="h4 font-w500 sidebar-mini-hide">{{ Setting::get('app.name') }}</span>
				</a>
			</li>
		</ul>
	</div>
</header>
