@extends ('layouts.base')

@section ('title')
Welcome to {{ Setting::get('app.name') }}
@endsection

@section ('content')
<div class="bg-primary-dark">
	<section class="content content-full content-boxed overflow-hidden">
		<div class="push-100-t push-50 text-center">
			<h1 class="h2 text-white push-10 animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown">Welcome to {{ Setting::get('app.name') }}</h1>
			<h2 class="h5 text-white-op animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown">{{ Setting::get('app.desc') }}</h2>
		</div>
	</section>
</div>
<div class="bg-gray-lighter">
	<section class="content main-content">
		@include('home.popular')
		@include('home.recent')
	</section>
</div>
@endsection
