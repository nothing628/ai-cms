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
		@section('styles')
		@show
		<div id="css-main" style="display: none;">
			<link rel="stylesheet" type="text/css" href="{{ asset('css/font.css') }}">
			<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
			<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
			<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
		</div>
	</head>
	<body>
		<div id="page-container" class="sidebar-l sidebar-mini sidebar-o side-scroll">
			@include('layouts.aside')
			@include('layouts.sidebar')
			@include('layouts.header')

			<main id="main-container">
				@section('content')
				@show
			</main>

			@include('layouts.footer')
		</div>
		@include('layouts.laravel')

		<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/oneui.js') }}"></script>
		@section('scripts')
		@show
		<script type="text/javascript">
			$(document).ready(function () {
				$('button[data-toggle="dropdown"]').dropdown();
			});
		</script>
	</body>
</html>