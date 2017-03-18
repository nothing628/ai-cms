@extends('admin.base')

@section('title')
@parent Tag List
@endsection

@section('breadcrumb')
<li><a>Home</a></li>
<li><a>Tag List</a></li>
@endsection

@section('page-content')
<vue-block :is-themed="true">
	<vue-block-head :data-class="['bg-modern-dark']" :with-refresh="true">Tag List</vue-block-head>
	<vue-block-content>
		<vue-modal-button data-target="modal-form" :data-class="['btn', 'btn-success']"><i class="fa fa-plus"></i> Add</vue-modal-button>

		<vue-table :data-class="['push-15-t']" data-name="table" data-target="bdata">
			<vue-table-head :data-column="[
			{value:'Tag'},
			{value:'Count', class:'text-center'},
			{value:'Action', class:'text-center'}]"></vue-table-head>
			<vue-table-body data-source="{{ route('api.tag.get') }}"
			:data-map="[
			{key: 'name'},
			{key: 'count', class: 'text-center'}]" :is-action="true">
				<template scope="props">
					<div class="btn-group btn-group-xs">
						<vue-action :data-item = "props.item" :is-form="true" data-target="form-tag-edit"><i class="fa fa-pencil text-primary"></i></vue-action>
						<vue-action :data-item = "props.item" :is-delete="true" data-link="{{ route('api.tag.delete') }}"><i class="fa fa-times text-danger"></i></vue-action>
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
@include('admin.tag.form')
@endsection
