<header id="header-navbar" class="content-mini content-mini-full">
	<ul class="nav-header pull-right">
		@include('user.menubar')
	</ul>
	<ul class="nav-header pull-left">
		<li class="hidden-md hidden-lg">
			<button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
				<i class="fa fa-navicon"></i>
			</button>
		</li>
		<li class="hidden-xs hidden-sm">
			<button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
				<i class="fa fa-ellipsis-v"></i>
			</button>
		</li>
		<li>
			<button class="btn btn-default pull-right" data-toggle="modal" data-target="#apps-modal" type="button">
				<i class="si si-grid"></i>
			</button>
		</li>
		<li class="visible-xs">
			<button class="btn btn-default" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">
				<i class="fa fa-search"></i>
			</button>
		</li>
		<li class="js-header-search header-search">
			<form class="form-horizontal" action="base_pages_search.php" method="post">
				<div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
					<input class="form-control" type="text" id="base-material-text" name="base-material-text" placeholder="Search..">
					<span class="input-group-addon"><i class="si si-magnifier"></i></span>
				</div>
			</form>
		</li>
	</ul>
</header>
