@extends('layouts.web.base')

@section('title')
@parent - Register
@endsection

@section('class')
bg-white
@endsection

@section('content')
<div class="bg-gray-lighter">
	<section class="content content-boxed">
		<div class="row items-push push-50-t push-30">
			<div class="col-md-6 col-lg-4 col-lg-offset-4 col-md-offset-3">
				<div class="text-center">
					<h1>Register</h1>
					<p class="text-muted push-15-t">Register is free.</p>
				</div>
				<form class="form-horizontal" method="post">
					{!! csrf_field() !!}
					<div class="form-group">
						<div class="col-xs-12">
							<div class="form-material form-material-success">
								<input type="text" name="username" class="form-control" placeholder="Please input username">
								<label>Username</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<div class="form-material form-material-success">
								<input type="password" name="password" class="form-control" placeholder="Please input password">
								<label>Password</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<div class="form-material form-material-success">
								<input type="password" name="repeat_password" class="form-control" placeholder="Please repeat password">
								<label>Repeat Password</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<div class="form-material form-material-success">
								<input type="email" name="email" class="form-control" placeholder="Please input valid E-mail">
								<label>E-Mail</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<div class="form-material form-material-success">
								<input type="text" name="fullname" class="form-control" placeholder="Please input your fullname">
								<label>Fullname</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-7 col-sm-8">
							<label class="css-input switch switch-sm switch-primary">
								<input type="checkbox" name="test" value="test">
								<span></span>
								I agree with terms & conditions
							</label>
						</div>
						<div class="col-xs-5 col-sm-4">
							<div class="font-s13 text-right push-5-t">
								<a href="#">View Terms</a>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12 col-sm-6 col-sm-offset-3">
							<button class="btn btn-sm btn-block btn-success" type="submit">Register</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>
@endsection
