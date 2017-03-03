<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Type" content="Type=text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		{!! SEO::generate() !!}

		<!-- Fonts -->
		@section('styles')
		@show
		<div id="css-main">
			<link rel="stylesheet" type="text/css" href="{{ asset('css/font.css') }}">
			<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
			<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
			<link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
			<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
		</div>
	</head>
	<body>
		<div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
			@include('layouts.admin.aside')
			@include('layouts.admin.sidebar')
			@include('layouts.admin.header')

			<main id="main-container">
				@section('content')
				@show
			</main>
			<div id="page-loader"></div>

			<swal></swal>
			@include('layouts.admin.footer')
		</div>
		@include('layouts.laravel')

		<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/oneui.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
		@section('scripts')
		@show
		<script type="text/javascript">
			$(document).ready(function () {
				$('button[data-toggle="dropdown"]').dropdown();
			});
		</script>
	</body>
</html>