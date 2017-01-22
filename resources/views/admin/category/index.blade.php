@extends('admin.base')

@section('title')
@parent Category List
@endsection

@section('breadcrumb')
<li><a>Home</a></li>
<li><a>Category List</a></li>
@endsection

@section('page-content')
<a href="{{ route('admin.category.create') }}" class="btn btn-success btn-flat btn-line"><i class="fa fa-plus"></i> Add</a>

<table class="table table-bordered" style="margin-top: 15px;">
	<thead>
		<tr>
			<th>Category</th>
			<th>Manga</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($categories as $category)
		<tr>
			<td>{{ $category->category }}</td>
			<td>{{ $category->mangas->count() }}</td>
			<td>
				<a href="#">Edit</a>
				<a href="#">Delete</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
