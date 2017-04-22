@extends('admin.base')

@section('title')
New Manga
@endsection

@section('breadcrumb')
<li><a>Home</a></li>
<li><a>Manga</a></li>
<li><a class="link-effect">New Manga</a></li>
@endsection

@section ('page-content')
<vue-block :is-themed="true">
	<vue-block-head :data-class="['bg-modern-dark']"><i class="fa fa-upload"></i> New Manga</vue-block-head>
	<vue-block-content :data-class="['block-content-narrow']">
		<vue-form :data-class="['form-horizontal', 'push-10-t']" data-enctype="multipart/form-data"
		data-action="{{ route('api.manga.store') }}" data-name="form-create">
			{!! csrf_field() !!}
			<vue-form-group>
				<vue-input data-name="title" :data-col="['col-md-12']" data-label="Manga Title" :is-required="true" data-placeholder="Manga Title"></vue-input>
			</vue-form-group>
			<vue-form-group>
				<vue-input data-name="artist" data-label="Artist" :is-required="false" data-placeholder="Artist"></vue-input>
				<vue-input data-name="author" data-label="Author" :is-required="false" data-placeholder="Author"></vue-input>
			</vue-form-group>
			<vue-form-group>
				<vue-select data-source="{{ route('api.category.get.select') }}" data-name="category_id" data-label="Category" :is-required="true" data-placeholder="Category"></vue-select>
				<vue-select data-source="{{ route('api.tag.get.select') }}" data-name="tags[]" :data-multiple="true" data-label="Tags" :is-required="true" data-placeholder="Tags"></vue-select>
			</vue-form-group>
			<vue-form-group>
				<vue-textarea data-name="desc" data-label="Synopsis" :is-required="true" :data-col="['col-md-12']" data-placeholder="Please write synopsis"></vue-textarea>
			</vue-form-group>
			<vue-form-group>
				<vue-select data-source="{{ route('api.lang.get.select') }}" data-name="lang_id" data-label="Language" :is-required="true" data-placeholder="Language" data-value="en"></vue-select>
				<vue-select data-value="1" :data-custom-source="[{key:'Complete', value:1}, {key:'On Going', value:0}]" data-name="status" data-label="Status" :is-required="true" data-placeholder="Status"></vue-select>
			</vue-form-group>
			<vue-form-group>
				<vue-file data-name="cover" data-label="Cover" :is-required="true"></vue-file>
			</vue-form-group>
			<vue-form-group>
				<div class="col-md-offset-2 col-md-9">
					<vue-form-submit :data-class="['btn-success']">Submit</vue-form-submit>
					<a href="{{ route('admin.manga.index') }}" class="btn btn-default">Cancel</a>
				</div>
			</vue-form-group>
			<div class="clearfix"></div>
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
