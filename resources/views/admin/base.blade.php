@extends('layouts.admin.base')

@section('content')
	<ol class="breadcrumb">
		<li><a href="#">Home</a></li>
		<li><a href="#">Manga</a></li>
	</ol>
	<div class="clearfix"></div>
	<div class="page-content">
	@section('page-content')
	@show
	</div>
@endsection