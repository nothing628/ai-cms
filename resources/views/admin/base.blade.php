@extends('layouts.admin.base')

@section('title')
Administrator Panel - 
@endsection

@section('content')
	<ol class="breadcrumb">
		@section('breadcrumb')
		@show
	</ol>
	<div class="clearfix"></div>
	<div class="page-content">
	@section('page-content')
	@show
	</div>
@endsection