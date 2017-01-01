<nav class="navbar navbar-default navbar-fixed-top" id="main-navbar">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">MangaTitan</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#about">Category</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Browse</a>
					<ul class="dropdown-menu">
						<li><a href="#">Popular</a></li>
						<li><a href="#">Recently Update</a></li>
						<li><a href="#">Most View</a></li>
						<li><a href="#">Random</a></li>
					</ul>
				</li>
				<li><a href="#contact">Contact Us</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ route('register') }}">Sign Up</a></li>
				<li><a href="{{ route('login') }}">Sign In</a></li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>