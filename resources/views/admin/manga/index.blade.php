@extends('admin.base')

@section('title')
@parent Manga List
@endsection

@section('breadcrumb')
<li><a>Manga</a></li>
<li><a class="link-effect">All Manga</a></li>
@endsection

@section('page-content')
<vue-block>
	<vue-block-head :data-class="['bg-gray-lighter']">All Manga</vue-block-head>
	<vue-block-content>
		<a href="{{ route('admin.manga.create') }}" class="btn btn-success"><i class="fa fa-upload"></i> Upload</a>

		<vue-table :data-class="['push-15-t']">
			<vue-table-head :data-column="[
			'Title',
			{value:'Status', class:'text-center'},
			{value:'Added', class:['hidden-xs', 'text-center']},
			{value:'Page', class:'text-center'},
			{value:'Views', class:'text-center'},
			{value:'Action', class:'text-center'}]"></vue-table-head>
			<vue-table-body data-source="{{ route('api.manga.get') }}" :data-map="[
			'title',
			{key: 'totalPage', class: 'text-center', format: '<span class=\'label label-warning\'>{0}</span>'},
			{key: 'created_at', class: ['hidden-xs', 'text-center']},
			{key: 'totalPage', class: 'text-center'},
			{key: 'views', class: 'text-center'}
			]" :is-action="true">
				<div class="btn-group btn-group-xs">
					<a data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
					<a data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Edit"><i class="fa fa-pencil text-primary"></i></a>
					<a data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
				</div>
			</vue-table-body>
		</vue-table>

		<nav class="text-right">
			<vue-pagination :data-max-page="20" :data-page="1"></vue-pagination>
		</nav>
	</vue-block-content>
</vue-block>
@endsection
