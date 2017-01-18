@extends('admin.base')

@section('title')
@parent New Chapter
@endsection

@section('breadcrumb')
<li><a>Home</a></li>
<li><a>Manga</a></li>
<li><a>Chapter</a></li>
<li><a>Create New</a></li>
@endsection

@section('page-content')
<form method="post" class="form-horizontal" enctype="multipart/form-data">
	{!! csrf_field() !!}
	<input type="hidden" name="manga_id" value="{{ $manga->id }}">
	<div class="form-group">
		<label class="control-label col-md-2">Chapter Title</label>
		<div class="col-md-6">
			<input type="text" name="title" class="form-control" placeholder="Chapter Title" required="">
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
			<a href="{{ route('admin.manga.chapter', $manga->id) }}" class="btn btn-danger btn-line btn-flat">Cancel</a>
		</div>
	</div>
</form>
@endsection
