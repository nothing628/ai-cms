@extends('layouts.base')

@section('title')
@parent Contact Us
@endsection

@section('content')
<h1>About Us</h1>
<p>Content not edited</p>
<hr>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<div class="row">
	<div class="col-md-6">
		<address>
			<strong>Address</strong>
			<p>test</p>
		</address>
	</div>
	<div class="col-md-6" id="social-media">
		<a href="#" class="btn pull-right btn-lg btn-circle btn-danger"><i class="fa fa-google-plus"></i></a>
		<a href="#" class="btn pull-right btn-lg btn-circle btn-primary"><i class="fa fa-facebook"></i></a>
		<a href="#" class="btn pull-right btn-lg btn-circle btn-info"><i class="fa fa-twitter"></i></a>
		<a href="#" class="btn pull-right btn-lg btn-circle btn-success"><i class="fa fa-github"></i></a>
		<div class="clearfix"></div>
	</div>
</div>
@endsection
