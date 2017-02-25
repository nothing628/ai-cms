@extends ('layouts.base')

@section('title')
@parent - Browse Manga
@endsection

@section('content')
<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-7">
			<h1 class="page-heading">
				Manga List
			</h1>
		</div>
	</div>
</div>
<div class="content"></div>

<div class="row">
	<div class="col-md-12">
		<div class="row">
			@foreach ($mangas as $manga)
				<div class="col-md-2">
					<a href="{{ $manga->manga_url }}">
						<img src="{{ url('images/medium/' . $manga->cover) }}" alt="{{ $manga->title }}" class="img-responsive">
					</a>
				</div>
			@endforeach
		</div>
	</div>
</div>
@endsection
