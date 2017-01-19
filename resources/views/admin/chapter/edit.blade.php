@extends('admin.base')

@section('title')
@parent Chapter Edit
@endsection

@section('breadcrumb')
<li><a>Home</a></li>
<li><a>Manga</a></li>
<li><a>Chapter</a></li>
<li><a>CH01</a></li>
@endsection

@section('page-content')
<form method="post" class="form-horizontal" enctype="multipart/form-data">
	{!! csrf_field() !!}
	<div class="form-group">
		<label class="control-label col-md-2">Chapter Title</label>
		<div class="col-md-6">
			<input type="text" name="title" class="form-control" placeholder="Chapter Title" required="" value="{{ $chapter->chapter_title }}">
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-2">Cover</label>
		<div class="col-md-6">
			<img src="{{ url('images/small/' . $chapter->cover) }}">
			<input type="file" name="cover" accept="image/*">
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-offset-2 col-md-9">
			<button class="btn btn-success btn-flat btn-line">Submit</button>
			<a href="{{ route('admin.manga.chapter', $chapter->manga_id) }}" class="btn btn-danger btn-line btn-flat">Cancel</a>
		</div>
	</div>
</form>

<h3 class="title">Pages</h3>

<a class="btn btn-success btn-line btn-flat" data-toggle="modal" data-backdrop="false" href='#modal-id'><i class="fa fa-upload"></i> Upload New Page</a>

<table class="table-bordered table" style="margin-top: 15px;">
	<thead>
		<tr>
			<td>#</td>
			<td></td>
		</tr>
	</thead>

	<tbody>
		@foreach($chapter->pages as $page)
		<tr>
			<td>{{ $page->page_num }}</td>
			<td><a href="{{ url('images/small/' . $page->path) }}">View</a></td>
		</tr>
		@endforeach
	</tbody>
</table>

<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
		<form method="post" enctype="multipart/form-data" action="{{ route('admin.page.upload', $chapter->id) }}">
			{!! csrf_field() !!}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<input type="file" multiple="multiple" name="page[]" accept="image/*">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
		</form>
		</div>
	</div>
</div>
@endsection
