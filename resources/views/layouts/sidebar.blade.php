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
						<a href=""><i class="si si-magnifier"></i><span class="sidebar-mini-hide">Advanced Search</span></a>
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
