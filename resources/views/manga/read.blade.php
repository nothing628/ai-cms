@extends('layouts.base')

@section('title')
@parent - {{ $chapter->chapter_title }}
@endsection

@section('content')
<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-7">
			<h1 class="page-heading">
				{{ $manga->title }} <small>{{ $chapter->chapter_title }}</small>
			</h1>
		</div>
	</div>
</div>

<div class="content">
	<reader data-manga="{{ $manga->id }}" :data-chapter="{{ $chapter->chapter_num }}"
		:data-page="{{ $page->page_num }}" data-source="{{ route('api.manga.read') }}"></reader>
</div>
@endsection
