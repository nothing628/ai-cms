<header id="header-navbar" class="content-mini content-mini-full">
	<div class="content-boxed">
		<ul class="nav-header pull-right">
			<li class="js-header-search header-search">
				<form class="form-horizontal" action="http://hentai2read.com/hentai-list/search/" method="post">
					<div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
						<input class="form-control rf-search" type="text" placeholder="Search.." autocomplete="off">
						<span class="input-group-addon"><i class="si si-magnifier"></i></span>
					</div>
				</form>
			</li>
			<li>
				<div class="btn-group">
					<button class="btn btn-image dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
						<img src="{{ asset('images/small/bg.jpg') }}" alt="Avatar">
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu dropdown-menu-right">
						<li class="dropdown-header">Profile</li>
						<li><a tabindex="-1"><i class="si si-envelope-open pull-right"></i><span class="badge badge-primary pull-right">3</span>Inbox</a></li>
						<li><a tabindex="-1"><i class="si si-user pull-right"></i><span class="badge badge-success pull-right">1</span>Profile</a></li>
						<li><a tabindex="-1"><i class="si si-settings pull-right"></i>Settings</a></li>
						<li class="divider"></li>
						<li class="dropdown-header">Actions</li>
						<li><a tabindex="-1"><i class="si si-lock pull-right"></i>Lock Account</a></li>
						<li><a tabindex="-1"><i class="si si-logout pull-right"></i>Log out</a></li>
					</ul>
				</div>
			</li>
			<li>
				<button class="btn btn-default" data-toggle="layout" data-action="side_overlay_toggle" type="button">
					<i class="fa fa-tasks"></i>
				</button>
			</li>
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
