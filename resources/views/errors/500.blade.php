<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-focus" lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="Type=text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Error 500</title>
	<div id="css-main">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/font.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	</div>
</head>

<body>
	<div class="content bg-white text-center pulldown overflow-hidden">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<h1 class="font-s128 font-w300 text-modern animated zoomInDown">500</h1>
				<h2 class="h3 font-w300 push-50 animated fadeInUp">We are sorry but our server encountered an internal error..</h2>
				<form class="form-horizontal push-50" method="post">
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-3">
							<div class="input-group input-group-lg">
								<input class="form-control" type="text" placeholder="Search application..">
								<div class="input-group-btn">
									<button class="btn btn-default"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="content pulldown text-muted text-center">
		Would you like to let us know about it?
		<br>
		<a class="link-effect" href="javascript:void(0)">Report it</a> or <a class="link-effect" href="{{url('/')}}">Go Back to Dashboard</a>
	</div>
	<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/oneui.js') }}"></script>
</body>
</html>
