@extends('admin.base')

@section('title')
@parent Chapter List
@endsection

@section('breadcrumb')
<li><a>Home</a></li>
<li><a>Manga</a></li>
<li><a>Chapter List</a></li>
@endsection

@section('page-content')
<h3 class="title">Detail</h3>
<a href="{{ route('admin.manga.index') }}" class="btn btn-danger btn-line btn-flat">Back</a>
<a href="{{ route('admin.manga.edit', $manga->id) }}" class="btn btn-primary btn-line btn-flat"><i class="fa fa-pencil"></i> Edit</a>
<table class="table table-bordered" style="margin-top: 15px;">
	<tbody>
		<tr>
			<td width="200">Title</td>
			<td>{{ $manga->title }}</td>
		</tr>
		<tr>
			<td>Artist</td>
			<td>{{ $manga->meta['artist'] }}</td>
		</tr>
	</tbody>
</table>

<h3 class="title">Chapter List</h3>
<a href="#" class="btn btn-success btn-line btn-flat"><i class="fa fa-upload"></i> Upload New Chapter</a>
<table class="table table-bordered" style="margin-top: 15px;">
	<thead>
		<tr>
			<th>#</th>
			<th>Chapter Title</th>
			<th>Chapter Number</th>
			<th>Page</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($manga->chapters as $chapter)
		<tr>
			<td></td>
			<td>{{ $chapter->chapter_title }}</td>
			<td>{{ $chapter->chapter_num }}</td>
			<td>{{ $chapter->pages->count() }}</td>
			<td>
				<a href="#">Detail</a>
				<a href="#">Edit</a>
				<a href="#">Delete</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
