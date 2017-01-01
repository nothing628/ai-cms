@extends('layouts.base')

@section('title')
@parent - Login
@endsection

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form class="form-horizontal" method="post">
			{!! csrf_field() !!}
			<h1>Sign In</h1>
			<p>Please login to have access all manga in this site</p>
			<hr>

			<div class="form-group">
				<label class="col-md-3 control-label">Username</label>
				<div class="col-md-9">
					<input type="text" name="" class="form-control" placeholder="Username">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label">Password</label>
				<div class="col-md-9">
					<input type="password" name="" class="form-control" placeholder="Password">
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-9 col-md-offset-3">
					<button class="btn btn-success btn-flat btn-line" type="submit">Sign In</button>
					<a class="btn btn-warning btn-flat btn-line" href="{{ route('register') }}">Don't Have an Account</a>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
