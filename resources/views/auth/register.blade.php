@extends('layouts.base')

@section('title')
@parent - Register
@endsection

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form class="form-horizontal" method="post">
			{!! csrf_field() !!}
			<h1>Register</h1>
			<p>Register completely free. You can use free account to access many Manga.</p>
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
				<label class="col-md-3 control-label">Repeat Password</label>
				<div class="col-md-9">
					<input type="password" name="" class="form-control" placeholder="Repeat Password">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label">E-Mail</label>
				<div class="col-md-9">
					<input type="email" name="" class="form-control" placeholder="E-Mail">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label">Fullname</label>
				<div class="col-md-9">
					<input type="text" name="" class="form-control" placeholder="Fullname">
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-9 col-md-offset-3">
					<button class="btn btn-success btn-flat btn-line" type="submit">Register</button>
					<a class="btn btn-warning btn-flat btn-line" href="{{ route('login') }}">Already register</a>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
