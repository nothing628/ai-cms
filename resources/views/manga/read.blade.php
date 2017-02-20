@extends('layouts.base')

@section('title')
@parent - {{ $chapter->chapter_title }}
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="row" id="control">
			<div class="col-md-12">
			</div>
		</div>
		<div class="row" id="mainimage">
			<div class="col-md-8 col-md-offset-2">
				@if (!is_null($page->next_page->id))
				<a href="{{ route('manga.read', ['manga_slug' => $manga->slug, 'chapter_num' => $chapter->chapter_num, 'page_num' => $page->next_page->page_num ]) }}">
					<img src="{{ url('images/original/' . $page->path) }}" class="img-responsive">
				</a>
				@else
				<a href="{{ route('manga.detail', ['manga_id' => $chapter->manga_id ]) }}">
					<img src="{{ url('images/original/' . $page->path) }}" class="img-responsive">
				</a>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection
