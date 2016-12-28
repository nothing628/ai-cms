@extends ('layouts.base')

@section('title')
@parent - Browse Manga
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="title">Browse Manga</h3>

		<div class="row">
			@foreach ($mangas as $manga)
				<div class="col-md-2">
					<a href="{{ route('manga.detail', ['manga_id' => $manga->id]) }}">
						<img src="{{ url('images/medium/' . $manga->cover) }}" alt="{{ $manga->title }}" class="img-responsive">
					</a>
				</div>
			@endforeach
		</div>
	</div>
</div>
@endsection
