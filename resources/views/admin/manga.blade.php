@extends('admin.base')

@section('title')
@parent Manga List
@endsection

@section('breadcrumb')
<li><a>Manga</a></li>
<li><a class="link-effect">All Manga</a></li>
@endsection

@section('page-content')
<div class="block">
	<div class="block-header bg-gray-lighter">
		<h3 class="block-title">All Manga</h3>
	</div>
	<div class="block-content">
		<a href="{{ route('admin.manga.create') }}" class="btn btn-success"><i class="fa fa-upload"></i> Upload</a>

		<table class="table table-hover push-15-t">
			<thead>
				<tr>
					<th>Title</th>
					<th>Status</th>
					<th class="hidden-xs text-center">Added</th>
					<th class="text-center">Page</th>
					<th class="text-center">Views</th>
					<th class="text-center" class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($mangas as $manga)
				<tr>
					<td>{{ $manga->title }}</td>
					<td><span class="label label-warning">Completed</span></td>
					<td class="hidden-xs text-center">13/11/2015</td>
					<td class="text-center">{{ $manga->totalPage }}</td>
					<td class="text-center">{{ $manga->totalPage }}</td>
					<td class="text-center">
						<div class="btn-group btn-group-xs">
							<a href="{{ route('admin.manga.chapter', $manga->id) }}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
							<a href="{{ route('admin.manga.edit', $manga->id) }}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Edit"><i class="fa fa-pencil text-primary"></i></a>
							<a href="{{ route('admin.manga.delete', $manga->id) }}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		<nav class="text-right">
			<ul class="pagination pagination-sm">
				<li class="active"><a>1</a></li>
				<li><a>2</a></li>
			</ul>
		</nav>
	</div>
</div>
@endsection
