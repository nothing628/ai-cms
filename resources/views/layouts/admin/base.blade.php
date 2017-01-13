<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>
			@section('title')
			{{ Config::get('app.name') }}
			@show
		</title>

		<!-- Fonts -->
		<!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/raleway.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
		<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	</head>
	<body id="app">
		@include('layouts.admin.navbar')

		<div class="container-fluid admin">
			<div class="left-side">
				<div class="content">
				@include('layouts.admin.sidebar')
				</div>
			</div>
			<div class="right-side">
				<div class="content">
					@section('content')
					@show
				</div>
			</div>
			
		</div>
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	</body>
</html>