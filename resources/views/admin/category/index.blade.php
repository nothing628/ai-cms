@extends('admin.base')

@section('breadcrumb')
<li><a>Home</a></li>
<li><a>Category List</a></li>
@endsection

@section('page-content')
<vue-block>
	<vue-block-head :data-class="['bg-gray-lighter']">Category List</vue-block-head>
	<vue-block-content>
		<vue-modal-button data-target="modal-form" :data-class="['btn', 'btn-success']"><i class="fa fa-plus"></i> Add</vue-modal-button>
		
		<vue-table :data-class="['push-15-t']" data-name="table" data-target="bdata">
			<vue-table-head :data-column="[
			{value:'Category', class:'text-center'},
			{value:'Manga', class:'text-center'},
			{value:'Action', class:'text-center'}]"></vue-table-head>
			<vue-table-body data-source="{{ route('api.category.get') }}" :data-map="[
			{key: 'category', class: 'text-center'},
			{key: 'total_manga', class: 'text-center'}]" :is-action="true">
				<template scope="props">
					<div class="btn-group btn-group-sm">
						<vue-action :data-item = "props.item" :is-modal="true" data-target="modal-form">
							<i class="fa fa-pencil text-primary"></i>
						</vue-action>
						<vue-action :data-item = "props.item" :is-delete="true" data-link="{{ route('api.category.delete') }}"><i class="fa fa-times text-danger"></i></vue-action>
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
@include('admin.category.form')
@endsection
