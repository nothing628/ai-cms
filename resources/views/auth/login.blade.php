@extends('layouts.base')

@section('title')
@parent - Login
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
					<h1>Sign In</h1>
					<p class="text-muted push-15-t">Please login to access all manga</p>
				</div>
				<vue-form :data-class="['form-horizontal']" data-enctype="multipart/form-data" data-name="form-create" :is-raw="true">
					{!! csrf_field() !!}
					<vue-form-group>
						<vue-input data-name="email" data-type="email" data-label="Email" :is-required="true" :data-col="['col-xs-12']" :is-floating="true"></vue-input>
					</vue-form-group>

					<vue-form-group>
						<vue-input data-name="password" data-type="password" data-label="Password" :is-required="true" :data-col="['col-xs-12']" :is-floating="true"></vue-input>
					</vue-form-group>

					<vue-form-group>
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
					</vue-form-group>

					<vue-form-group>
						<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
							<vue-form-submit :data-class="['btn-success', 'btn-block']">Sign In</vue-form-submit>
						</div>
					</vue-form-group>
				</vue-form>
			</div>
		</div>
	</section>
</div>
@endsection
