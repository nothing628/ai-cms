<nav id="sidebar">
	<div id="sidebar-scroll">
		<div class="sidebar-content">
			<div class="side-header side-content bg-white-op">
				<button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
					<i class="fa fa-times"></i>
				</button>
				<a class="h5 text-white" href="index.php">
					<span class="h4 font-w300 sidebar-mini-hide">AI-CMS</span>
				</a>
			</div>
			<div class="side-content">
				<ul class="nav-main">
					<li>
						<a class="active" href="{{ route('admin.home') }}"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
					</li>
					<li class="nav-main-heading"><span class="sidebar-mini-hide">User Interface</span></li>
					<li>
						<a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-docs"></i><span class="sidebar-mini-hide">Manga</span></a>
						<ul>
							<li><a href="{{ route('admin.manga.index') }}">All Manga</a></li>
							<li><a href="{{ route('admin.manga.staff') }}">Staff Pick</a></li>
							<li><a href="{{ route('admin.manga.crawl') }}">Crawl</a></li>
						</ul>
					</li>
					<li>
						<a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-tag"></i> Tag Management</a>
						<ul>
							<li><a href="{{ route('admin.category') }}">Tags</a></li>
							<li><a href="{{ route('admin.tags') }}">Category</a></li>
						</ul>
					</li>
					<li>
						<a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bar-chart"></i> Report</a>
						<ul>
							<li><a href="">Page Views</a></li>
							<li><a href="">Manga Views</a></li>
							<li><a href="">Upload History</a></li>
							<li><a href="">Top Search</a></li>
						</ul>
					</li>
					<li>
						<a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bubble"></i> Notifications</a>
						<ul>
							<li><a href="">All Notification</a></li>
							<li><a href="">Discuss</a></li>
							<li><a href="">Comments</a></li>
							<li><a href="">Important</a></li>
						</ul>
					</li>
					<li>
						<a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-settings"></i><span class="sidebar-mini-hide">Settings</span></a>
						<ul>
							<li><a href="{{ route('admin.setting.page') }}">Users</a></li>
							<li><a href="{{ route('admin.setting.user') }}">Page Setting</a></li>
							<li><a href="{{ route('admin.setting.widget') }}">Widgets</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>
