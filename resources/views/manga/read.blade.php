@extends('layouts.web.base')

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
		<reader-control data-name="bottom-control"></reader-control>
	</reader>
</div>
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
<style>
	.select2-container .select2-selection--single {
		height: auto !important;
	}

	.select2-container--default .select2-selection--single {
		border-radius: 0px !important;
		border-color: transparent !important;
		background-color: transparent !important;
	}

	.select2-container--default .select2-selection--single .select2-selection__rendered {
		line-height: normal !important;
		padding-left: 0px !important;
		padding-right: 0px !important;
		color: #FFF !important;
	}

	.select2-container--default .select2-selection--single .select2-selection__arrow {
		display: none;
	}
</style>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/select2.full.min.js') }}"></script>
@endsection
