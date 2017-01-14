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
<form method="post" class="form-horizontal">
	<div class="form-group">
		<label class="control-label col-md-2">Manga Title</label>
		<div class="col-md-6">
			<input type="text" name="title" class="form-control" placeholder="Manga Title">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-2">Artist</label>
		<div class="col-md-3">
			<input type="text" name="artist" class="form-control" placeholder="Artist">
		</div>
		<label class="control-label col-md-2">Artist</label>
		<div class="col-md-3">
			<input type="text" name="author" class="form-control" placeholder="Author">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-2">Category</label>
		<div class="col-md-3">
			<select class="form-control" name="category">
				<option>Test</option>
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
			<textarea class="form-control"></textarea>
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
		</div>
	</div>
</form>
@endsection
