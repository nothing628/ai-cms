@extends('admin.base')

@section('title')
@parent Manga List
@endsection

@section('breadcrumb')
<li><a>Manga</a></li>
<li><a class="link-effect">All Manga</a></li>
@endsection

@section('page-content')
<vue-block :is-themed="true">
	<vue-block-head :data-class="['bg-modern-dark']">All Manga</vue-block-head>
	<vue-block-content>
		<a href="{{ route('admin.manga.create') }}" class="btn btn-success"><i class="fa fa-upload"></i> Upload</a>

		<vue-table :data-class="['push-15-t']" data-name="table" data-target="bdata">
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
				<template scope="props">
					<div class="btn-group btn-group-xs">
						<vue-action :data-item = "props.item" data-link="{{ route('admin.manga.chapter') }}/{0}"><i class="fa fa-pencil text-primary"></i></vue-action>
						<vue-action :data-item = "props.item" :is-delete="true" data-link="{{ route('api.manga.delete') }}"><i class="fa fa-times text-danger"></i></vue-action>
					</div>
				</template>
			</vue-table-body>
		</vue-table>

		<div class="row">
			<div class="col-md-6"><record-status data-name="bdata"></record-status></div>
			<div class="col-md-6"><vue-pagination data-name="bdata" data-target="table"></vue-pagination></div>
		</div>
	</vue-block-content>
</vue-block>
@endsection
