<header id="header-navbar" class="content-mini content-mini-full hidden-md hidden-lg">
	<div class="content-boxed">
		<ul class="nav-header pull-right">
			<li>
				<button class="btn btn-link text-white pull-right" type="button" data-toggle="layout" data-action="sidebar_open">
					<i class="fa fa-navicon"></i>
				</button>
			</li>
			<ul class="nav-header pull-left">
				<li class="header-content">
					<a class="h5" href="{{ route('home') }}">
						<span class="h4 font-w500 sidebar-mini-hide">{{ Setting::get('app.name') }}</span>
					</a>
				</li>
			</ul>
		</ul>
	</div>
</header>
