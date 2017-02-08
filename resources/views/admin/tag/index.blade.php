@extends('admin.base')

@section('title')
@parent Category List
@endsection

@section('breadcrumb')
<li><a>Home</a></li>
<li><a>Tag List</a></li>
@endsection

@section('page-content')
<swal></swal>
<vue-block>
	<vue-block-head :data-class="['bg-gray-lighter']">Tag List</vue-block-head>
	<vue-block-content>
		<vue-modal-button data-target="modal-test" :data-class="['btn', 'btn-success']"><i class="fa fa-plus"></i> Add</vue-modal-button>

		<vue-table :data-class="['push-15-t']">
			<vue-table-head :data-column="[
			{value:'Tag', class:'text-center'},
			{value:'Manga', class:'text-center'},
			{value:'Action', class:'text-center'}]"></vue-table-head>
			<vue-table-body data-source="{{ route('api.tag.get') }}" :data-map="[
			{key: 'tag', class: 'text-center'},
			{key: 'total_manga', class: 'text-center'}]" :is-action="true">
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

<vue-modal data-name="modal-test" :data-class="['modal-dialog-top']" :is-fade="true">
	<vue-modal-head>Add New Tag</vue-modal-head>
	<vue-modal-body>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</vue-modal-body>
	<vue-modal-footer slot="footer">
		<button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
		<button class="btn btn-sm btn-primary" type="button" data-dismiss="modal"><i class="fa fa-check"></i> Ok</button>
	</vue-modal-footer>
</vue-modal>
@endsection
