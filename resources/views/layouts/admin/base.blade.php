<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="Description" content="{{ Setting::get('app.desc') }}">

		<title>
			@section('title')
			{{ Config::get('app.name') }}
			@show
		</title>

		<!-- Fonts -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/lato.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	</head>
	<body>
		@include('layouts.admin.navbar')

		<div class="container-fluid admin" id="app">
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
		
		<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

	</body>
</html>