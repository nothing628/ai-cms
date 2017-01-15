@if (isRoute('manga.list'))
@set('class', 'dropdown active')
@else
@set('class', 'dropdown')
@endif

<nav class="navbar navbar-default navbar-fixed-top" id="main-navbar">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">{{ Config::get('app.name') }}</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li @if(isRoute('home')) class="active" @endif ><a href="{{ url('/') }}">Home</a></li>
				<li @if(isRoute('category.list')) class="active" @endif ><a href="{{ route('category.list') }}">Category</a></li>
				<li class="{{ $class }}">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Browse</a>
					<ul class="dropdown-menu">
						<li><a href="{{ route('manga.list', ['sort' => 'popular']) }}">Popular</a></li>
						<li><a href="{{ route('manga.list', ['sort' => 'recently']) }}">Recently Update</a></li>
						<li><a href="{{ route('manga.list', ['sort' => 'views']) }}">Most View</a></li>
						<li><a href="{{ route('manga.list') }}">Random</a></li>
					</ul>
				</li>
				<li @if(isRoute('contact.us')) class="active" @endif ><a href="{{ route('contact.us') }}">Contact Us</a></li>
			</ul>

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
		</div><!--/.nav-collapse -->
	</div>
</nav>
