@extends('layouts.web.base')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form class="form-horizontal" method="post">
			{!! csrf_field() !!}
			<h1>Change Password</h1>
			<hr>

			<div class="form-group">
				<label class="col-md-3 control-label">Current Password</label>
				<div class="col-md-9">
					<input type="password" name="last_password" class="form-control" placeholder="Current Password">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label">New Password</label>
				<div class="col-md-9">
					<input type="password" name="new_password" class="form-control" placeholder="New Password">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label">Repeat Password</label>
				<div class="col-md-9">
					<input type="password" name="repeat_password" class="form-control" placeholder="Repeat Password">
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-9 col-md-offset-3">
					<button class="btn btn-success btn-flat btn-line" type="submit">Change Password</button>
					<a class="btn btn-warning btn-flat btn-line" href="{{ route('user.home') }}">Cancel</a>
				</div>
			</div>
		</form>

		@if (session('message'))
		<div class="alert alert-success">{{ session('message') }}</div>
		@endif

		@if ($errors)
		@foreach ($errors->all() as $error)
		<div class="alert alert-danger">{{ $error }}</div>
		@endforeach
		@endif
	</div>
</div>
@endsection
