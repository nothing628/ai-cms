@extends ('layouts.base')

@section ('title')
Welcome to {{ Config::get('app.name') }}
@endsection

@section ('content')
<div class="row">
	<div class="col-md-12">
		<h1>Welcome to {{ Config::get('app.name') }}</h1>

		<p>{{ Setting::get('app.desc') }}</p>
	</div>
</div>

@include('home.popular')
@include('home.recent')
@endsection