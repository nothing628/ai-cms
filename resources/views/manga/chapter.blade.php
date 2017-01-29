@extends('layouts.base')

@section('title')
@parent - {{ $manga->title }}
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<h1 class="title">{{ $manga->title }}</h1>
		<div class="row">
			<div class="col-md-3">
				<img class="img-responsive" src="{{ url('images/medium/' . $manga->cover) }}" alt="{{ $manga->title }}">
			</div>
			<div class="col-md-9">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td>Title</td>
							<td>{{ $manga->title }}</td>
						</tr>
						<tr>
							<td>Artist</td>
							<td>{{ $manga->meta['artist'] }}</td>
						</tr>
						<tr>
							<td>Author</td>
							<td>{{ $manga->meta['author'] }}</td>
						</tr>
						<tr>
							<td>Category</td>
							<td>{{ $manga->category->category }}</td>
						</tr>
						<tr>
							<td>Total Views</td>
							<td>{{ $manga->views }}</td>
						</tr>
						<tr>
							<td>Total Pages</td>
							<td>{{ $manga->total_page }}</td>
						</tr>
						<tr>
							<td>Synopsis</td>
							<td>{{ $manga->meta['desc'] }}</td>
						</tr>
					</tbody>
				</table>

				<button class="btn btn-line btn-flat btn-danger"><i class="fa fa-love"></i> Favorite</button>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<h3 class="title">Chapter</h3>

		<div class="row">
			@foreach($manga->chapters as $chapter)
				<div class="col-md-2">
					<a href="{{ route('manga.read', ['manga_id' => $manga->id, 'chapter_id' => $chapter->chapter_num]) }}">
						<img src="{{ url('images/small/'. $chapter->cover ) }}" alt="" class="img-responsive">
					</a>
				</div>
			@endforeach
		</div>
	</div>
</div>
@endsection
