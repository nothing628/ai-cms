@extends ('layouts.base')

@section ('content')
<div class="bg-primary-dark banner" style="position: relative;">
	<div class="background-layer">
		<div class="overlay"></div>
	</div>
	<section class="content content-full content-boxed overflow-hidden">
		<div class="push-50-t push-50 text-center">
			<h1 class="h1 font-w300 text-white push-10" data-toggle="appear" data-class="animated fadeInDown">Welcome to {{ Setting::get('app.name') }}</h1>
			<h2 class="h4 font-w300 text-white-op" data-toggle="appear" data-class="animated fadeInUp">{{ Setting::get('app.desc') }}</h2>
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
