@extends('admin.base')

@section('title')
@parent Tag List
@endsection

@section('breadcrumb')
<li><a>Home</a></li>
<li><a>Tag List</a></li>
@endsection

@section('page-content')
<vue-block>
	<vue-block-head :data-class="['bg-gray-lighter']">Tag List</vue-block-head>
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
						<vue-action :data-item = "props.item" :is-modal="true" data-target="modal-form"><i class="fa fa-pencil text-primary"></i></vue-action>
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

<vue-modal data-name="modal-form" :data-class="['modal-dialog-slideup']" :is-fade="true">
	<vue-modal-head>Add New Tag</vue-modal-head>
	<vue-modal-body>
		<vue-form :data-class="['form-horizontal', 'push-10-t']" data-action="{{ route('api.tag.store') }}" data-name="form-tag-add" data-method="post">
			{!! csrf_field() !!}
			<vue-form-group>
				<vue-input data-name="tag" :data-col="['col-md-12']" data-label="Tag" :data-required="true" data-placeholder="Tag"></vue-input>
			</vue-form-group>
		</vue-form>
	</vue-modal-body>
	<vue-modal-footer slot="footer">
		<button class="btn btn-sm btn-danger" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
		<vue-form-submit :data-class="['btn-success', 'btn-sm']" data-target="form-tag-add"><i class="fa fa-check"></i> Submit</vue-form-submit>
	</vue-modal-footer>
</vue-modal>
@endsection
