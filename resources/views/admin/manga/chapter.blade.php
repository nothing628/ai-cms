@extends('admin.base')

@section('title')
@parent Manga Detail
@endsection

@section('breadcrumb')
<li><a>Manga</a></li>
<li><a class="link-effect">Manga</a></li>
<li><a class="link-effect">Chapter List</a></li>
@endsection

@section('page-content')
<vue-block :is-themed="true">
	<vue-block-head :data-class="['bg-modern-dark']">Detail</vue-block-head>
	<vue-block-content>
		<div class="row">
			<div class="col-md-3">
				<img src="{{ url('images/small/' . $manga->cover )}}" class="img-responsive" >
			</div>
			<div class="col-md-9">
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
						<tr>
							<td>Author</td>
							<td>{{ $manga->meta['author'] }}</td>
						</tr>
						<tr>
							<td>Category</td>
							<td>{{ $manga->category->category }}</td>
						</tr>
						<tr>
							<td>Total Pages</td>
							<td>{{ $manga->totalPage }}</td>
						</tr>
						<tr>
							<td>Views</td>
							<td>{{ $manga->views }}</td>
						</tr>
					</tbody>
				</table>

				<div class="push-15-t">
					<a href="{{ route('admin.manga.index') }}" class="btn btn-danger btn-line btn-flat"><i class="fa fa-mail-reply"></i> Back</a>
					<a href="{{ route('admin.manga.edit', $manga->id) }}" class="btn btn-primary btn-line btn-flat"><i class="fa fa-pencil"></i> Edit</a>
				</div>
			</div>
		</div>
	</vue-block-content>
</vue-block>

<vue-block :is-themed="true">
	<vue-block-head :data-class="['bg-modern-dark']" :with-refresh="true">Chapter List</vue-block-head>
	<vue-block-content>
		<a href="{{ route('admin.chapter.create', $manga->id) }}" class="btn btn-success btn-line btn-flat">
			<i class="fa fa-upload"></i> Upload New Chapter
		</a>
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
						<a href="{{ route('admin.chapter.edit', $chapter->id) }}">Edit</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</vue-block-content>
</vue-block>
@endsection
