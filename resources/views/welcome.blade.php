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

<div class="row">
	<div class="col-md-12">
		<h3>Recently Update</h3>

		<div class="row">
			<div class="col-md-2"><img src="{{ url('images/medium/Cover 001.jpg') }}" alt="" class="img-responsive"></div>
			<div class="col-md-2"><img src="{{ url('images/medium/Cover 002.jpg') }}" alt="" class="img-responsive"></div>
			<div class="col-md-2"><img src="{{ url('images/medium/Cover 003.jpg') }}" alt="" class="img-responsive"></div>
			<div class="col-md-2"><img src="{{ url('images/medium/Cover 004.jpg') }}" alt="" class="img-responsive"></div>
			<div class="col-md-2"><img src="{{ url('images/medium/Cover 005.jpg') }}" alt="" class="img-responsive"></div>
			<div class="col-md-2"><img src="{{ url('images/medium/Cover 006.jpg') }}" alt="" class="img-responsive"></div>
		</div>
	</div>
</div>
@endsection