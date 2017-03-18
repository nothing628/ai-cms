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

<vue-modal data-name="modal-edit-form" :data-class="['modal-dialog-slideup']" :is-fade="true">
	<vue-modal-head>Edit Tag</vue-modal-head>
	<vue-modal-body>
		<vue-form :data-class="['form-horizontal', 'push-10-t']" data-action="{{ route('api.tag.update') }}" data-name="form-tag-edit" data-get="{{ route('api.tag.detail') }}" data-method="put">
			{!! csrf_field() !!}
			<vue-input data-name="id" :data-col="['col-md-12']" data-type="hidden"></vue-input>
			<vue-form-group>
				<vue-input data-name="name" :data-col="['col-md-12']" data-label="Tag" :data-required="true" data-placeholder="Tag"></vue-input>
			</vue-form-group>
		</vue-form>
	</vue-modal-body>
	<vue-modal-footer slot="footer">
		<button class="btn btn-sm btn-danger" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
		<vue-form-submit :data-class="['btn-success', 'btn-sm']" data-target="form-tag-edit"><i class="fa fa-check"></i> Submit</vue-form-submit>
	</vue-modal-footer>
</vue-modal>
