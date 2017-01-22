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
<form method="post" class="form-horizontal" enctype="multipart/form-data">
	{!! csrf_field() !!}
	<div class="form-group">
		<label class="control-label col-md-2">Manga Title</label>
		<div class="col-md-6">
			<input type="text" name="title" class="form-control" placeholder="Manga Title" required="">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-2">Artist</label>
		<div class="col-md-3">
			<input type="text" name="artist" class="form-control" placeholder="Artist">
		</div>
		<label class="control-label col-md-2">Author</label>
		<div class="col-md-3">
			<input type="text" name="author" class="form-control" placeholder="Author">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-2">Category</label>
		<div class="col-md-3">
			<select class="form-control" name="category_id" required="">
				@foreach($categories as $category)
				<option value="{{ $category->id }}">{{ $category->category }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-2">Genre</label>
		<div class="col-md-6">
			<input type="text" name="genre" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-2">Synopsis</label>
		<div class="col-md-6">
			<textarea class="form-control" name="desc" required=""></textarea>
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
@endsection
