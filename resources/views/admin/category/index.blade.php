@extends('admin.base')

@section('title')
@parent Category List
@endsection

@section('breadcrumb')
<li><a>Home</a></li>
<li><a>Category List</a></li>
@endsection

@section('page-content')
<vue-block>
	<vue-block-head :data-class="['bg-gray-lighter']">Category List</vue-block-head>
	<vue-block-content>
		<a href="{{ route('admin.category.create') }}" class="btn btn-success btn-flat btn-line"><i class="fa fa-plus"></i> Add</a>
		
		<vue-table :data-class="['push-15-t']">
			<vue-table-head :data-column="[
			{value:'Category', class:'text-center'},
			{value:'Manga', class:'text-center'},
			{value:'Action', class:'text-center'}]"></vue-table-head>
			<vue-table-body data-source="{{ route('api.category.get') }}" :data-map="[
			{key: 'category', class: 'text-center'},
			{key: 'total_manga', class: 'text-center'}]" :is-action="true">
				<div class="btn-group btn-group-xs">
					<a data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
					<a data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Edit"><i class="fa fa-pencil text-primary"></i></a>
					<a data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
				</div>
			</vue-table-body>
		</vue-table>
	</vue-block-content>
</vue-block>
@endsection
