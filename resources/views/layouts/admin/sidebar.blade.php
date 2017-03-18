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
				{!! Menu::render() !!}
			</div>
		</div>
	</div>
</nav>
