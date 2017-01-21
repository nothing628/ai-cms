@extends('admin.base')

@section('title')
@parent Setting Page
@endsection

@section('breadcrumb')
<li><a>Home</a></li>
<li><a>Setting</a></li>
<li><a>Page</a></li>
@endsection

@section('page-content')
<form class="form-horizontal" method="post" enctype="multipart/form-data">
	{!! csrf_field() !!}
	<div class="form-group">
		<label class="control-label col-md-3">App Name</label>
		<div class="col-md-6">
			<input type="text" name="app_name" class="form-control" value="{{ Setting::get('app.name') }}">
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-3">App Description</label>
		<div class="col-md-6">
			<textarea class="form-control" name="app_desc">{{ Setting::get('app.desc') }}</textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-3">App Logo</label>
		<div class="col-md-6">
			<input type="file" name="app_logo">
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-3">Background</label>
		<div class="col-md-6">
			<input type="file" name="app_bg">
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-2 col-md-offset-3">
			<button type="submit" class="btn btn-flat btn-line btn-info"><i class="fa fa-save"></i> Save</button>
		</div>
	</div>
</form>
@endsection