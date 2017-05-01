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
				{!! Menu::render('Web') !!}
			</div>
		</div>
	</div>
</nav>
