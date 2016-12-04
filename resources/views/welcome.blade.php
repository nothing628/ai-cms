@extends ('layouts.base')

@section ('title')
Welcome to ReadmeCom
@endsection

@section ('content')
<div class="row">
	<div class="col-md-12">
		<h1>Welcome to Manga Titan</h1>

		<p>Empty content</p>
	</div>
</div>

@include('home.recent')
@include('home.popular')
@include('home.viewer')
@include('home.random')
@endsection