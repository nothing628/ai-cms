@extends('layouts.base')

@section('title')
@parent - {{ $chapter->chapter_title }}
@endsection

@section('content')
<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-7">
			<a href="{{ $manga->manga_url }}">
			<h1 class="page-heading">
				{{ $manga->title }}
			</h1>
			</a>
		</div>
		<div class="col-md-5">
			<button class="btn btn-danger pull-right"><i class="fa fa-heart"></i></button>
		</div>
	</div>
</div>

<div class="content">
	<reader data-manga="{{ $manga->id }}" :data-chapter="{{ $chapter->chapter_num }}"
		:data-page="{{ $page->page_num }}" data-source="{{ route('api.manga.read') }}">
		<reader-control data-name="main-control"></reader-control>
		<reader-page data-control="main-control" fallback-image="{{ url('images/original/dummy.png') }}"></reader-page>
		<reader-control></reader-control>
	</reader>
</div>
@endsection
