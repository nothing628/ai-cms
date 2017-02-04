@extends('admin.base')

@section('title')
@parent New Manga
@endsection

@section('breadcrumb')
<li><a>Home</a></li>
<li><a>Manga</a></li>
<li><a>Upload New Manga</a></li>
@endsection

@section ('page-content')
<div class="block">
	<div class="block-header bg-gray-lighter">
		<h3 class="block-title">Upload New Manga</h3>
	</div>
	<div class="block-content block-content-narrow">
		<form method="post" class="form-horizontal push-10-t" enctype="multipart/form-data">
			{!! csrf_field() !!}
			<div class="form-group">
				<div class="col-md-6">
					<div class="form-material form-material-primary">
						<input type="text" name="title" class="form-control" required="" placeholder="Manga Title">
						<label for="field-title">Manga Title</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-5">
					<div class="form-material form-material-primary">
						<input type="text" placeholder="Artist" name="artist" class="form-control">
						<label for="field-artist">Artist</label>
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-material form-material-primary">
						<input type="text" placeholder="Author" name="author" class="form-control">
						<label>Author</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-5">
					<div class="form-material form-material-primary">
						<select class="form-control js-select2" data-placeholder="Category" name="category_id" required="" id="field-category">
							<option></option>
							@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->category }}</option>
							@endforeach
						</select>
						<label for="field-category">Category</label>
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-material form-material-primary">
						<select multiple class="form-control js-select2" data-placeholder="Tags" style="width: 100%;" name="tags[]" id="field-tags">
							<option value="AL">Alabama</option>
							<option value="WY">Wyoming</option>
						</select>
						<label for="field-tags">Tags</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<div class="form-material form-material-primary">
						<textarea class="form-control" rows="3" name="desc" required="" placeholder="Please write synopsis"></textarea>
						<label>Synopsis</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">Cover</label>
				<div class="col-md-6">
					<input type="file" name="cover" accept="image/*">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-2 col-md-9">
					<button class="btn btn-success btn-flat btn-line">Submit</button>
					<a href="{{ route('admin.manga.index') }}" class="btn btn-danger btn-line btn-flat">Cancel</a>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/select2.full.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$(function(){
			App.initHelpers('select2');
		});
	});
</script>
@endsection
