@extends('admin.base')

@section('title')
Staff Pick
@endsection

@section('breadcrumb')
<li><a>Manga</a></li>
<li><a class="link-effect">Staff Pick Manga</a></li>
@endsection

@section('page-content')
<vue-block :is-themed="true">
	<vue-block-head :data-class="['bg-modern-dark']">Staff Pick</vue-block-head>
	<vue-block-content>
		<vue-modal-button data-target="modal-form" :data-class="['btn', 'btn-success']"><i class="fa fa-plus"></i> Add Manga</vue-modal-button>

		<vue-table :data-class="['push-15-t']" data-name="table" data-target="bdata"></vue-table>

		<div class="row">
			<div class="col-md-6"><record-status data-name="bdata"></record-status></div>
			<div class="col-md-6"><vue-pagination data-name="bdata" data-target="table"></vue-pagination></div>
		</div>
	</vue-block-content>
</vue-block>
@include('admin.manga.staff.form')
@endsection
