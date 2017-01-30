@extends('layouts.base')

@section('title')
@parent - Login
@endsection

@section('class')
bg-white
@endsection

@section('content')
<div class="row">
	<div class="col-md-6 col-lg-4 col-lg-offset-4 col-md-offset-3">
		<form class="form-horizontal" method="post">
			{!! csrf_field() !!}
			<h1>Sign In</h1>
			<p>Please login to access all manga</p>

			<div class="form-group">
				<div class="col-xs-12">
					<div class="form-material form-material-primary floating">
						<input type="email" name="email" class="form-control">
						<label>Email</label>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<div class="form-material form-material-primary floating">
						<input type="password" name="password" class="form-control">
						<label>Password</label>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-6">
					<label class="css-input switch switch-sm switch-primary">
						<input type="checkbox" name="test" value="test">
						<span></span>
						Remember Me
					</label>
				</div>
				<div class="col-xs-6">
					<div class="font-s13 text-right push-5-t">
						<a href="{{ route('register') }}">Forgot Password</a>
						Or
						<a href="{{ route('register') }}">Register</a>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
					<button class="btn btn-block btn-success btn-flat" type="submit">Sign In</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
