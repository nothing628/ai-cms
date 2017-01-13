<nav class="navbar navbar-default navbar-fixed-top" id="main-navbar">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">{{ Config::get('app.name') }} - Admin Panel</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			@set('user', Auth::user())
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Hi, {{ $user->username }}</a>
					<ul class="dropdown-menu">
						@if ($user->is_admin)
						<li><a href="{{ route('home') }}">Back to Home</a></li>
						<li class="nav-divider"></li>
						@endif
						<li><a href="{{ route('logout.get') }}">Sign Out</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
