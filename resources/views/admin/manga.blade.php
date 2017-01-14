@extends('admin.base')

@section('title')
@parent Manga List
@endsection

@section('breadcrumb')
<li><a>Home</a></li>
<li><a>Manga</a></li>
@endsection

@section('page-content')
<a href="{{ route('admin.manga.create') }}" class="btn btn-success btn-flat btn-line"><i class="fa fa-upload"></i> Upload</a>

<table class="table table-bordered" style="margin-top: 15px;">
	<thead>
		<tr>
			<th>#</th>
			<th>Title</th>
			<th>Page</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td></td>
			<td>Test</td>
			<td>123</td>
		</tr>
	</tbody>
</table>
@endsection