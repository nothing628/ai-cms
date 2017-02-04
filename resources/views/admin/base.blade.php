@extends('layouts.admin.base')

@section('content')
<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-7">
			<h1 class="page-heading">
			@yield('title')
			</h1>
		</div>
		<div class="col-sm-5 text-right hidden-xs">
			<ol class="breadcrumb push-10-t">
				@section('breadcrumb')
				@show
			</ol>
		</div>
	</div>
</div>
<div class="content">
	@section('page-content')
	@show
</div>
@endsection