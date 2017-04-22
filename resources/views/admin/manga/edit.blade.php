@extends('admin.base')

@section('title')
Edit Manga
@endsection

@section('breadcrumb')
<li><a>Home</a></li>
<li><a>Manga</a></li>
<li><a>{{ $manga->title }}</a></li>
@endsection

@section ('page-content')
<vue-block :is-themed="true">
	<vue-block-head :data-class="['bg-modern-dark']"><i class="fa fa-pencil"></i> Edit Manga</vue-block-head>
	<vue-block-content :data-class="['block-content-narrow']">
		<vue-form :data-class="['form-horizontal', 'push-10-t']" data-method="put" data-enctype="application/x-www-form-urlencoded"
		data-action="{{ route('api.manga.update') }}" data-name="form-edit">
			{!! csrf_field() !!}
			<input type="hidden" name="manga_id" value="{{ $manga->id }}">
			<vue-form-group>
				<vue-input data-name="title" data-value="{{ $manga->title }}" :data-col="['col-md-12']" data-label="Manga Title" :is-required="true" data-placeholder="Manga Title"></vue-input>
			</vue-form-group>
			<vue-form-group>
				<vue-input data-name="artist" data-value="{{ $manga->meta['artist'] }}" data-label="Artist" :is-required="false" data-placeholder="Artist"></vue-input>
				<vue-input data-name="author" data-value="{{ $manga->meta['author'] }}" data-label="Author" :is-required="false" data-placeholder="Author"></vue-input>
			</vue-form-group>
			<vue-form-group>
				<vue-textarea data-name="desc" data-value="{{$manga->meta['desc']}}" data-label="Synopsis" :is-required="true" :data-col="['col-md-12']" data-placeholder="Please write synopsis"></vue-textarea>
			</vue-form-group>
			<vue-form-group>
				<vue-select data-source="{{ route('api.category.get.select') }}" data-name="category_id" data-value="{{ $manga->category_id }}" data-label="Category" :is-required="true" data-placeholder="Category"></vue-select>
				<vue-select data-source="{{ route('api.tag.get.select') }}" data-name="tags[]" :data-values="{{ json_encode($manga->tagSlugs()) }}" :data-multiple="true" data-label="Tags" :is-required="true" data-placeholder="Tags"></vue-select>
			</vue-form-group>
			<vue-form-group>
				<vue-file data-name="cover" data-label="Cover"></vue-file>
			</vue-form-group>
			<vue-form-group>
				<div class="col-md-offset-2 col-md-9">
					<vue-form-submit :data-class="['btn-success']">Submit</vue-form-submit>
					<a href="{{ route('admin.manga.chapter', ['manga_id' => $manga->id]) }}" class="btn btn-default">Cancel</a>
				</div>
			</vue-form-group>
		</vue-form>
	</vue-block-content>
</vue-block>
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/select2.full.min.js') }}"></script>
@endsection
