<vue-modal data-name="modal-form" :data-class="['modal-dialog-slideup']" :is-fade="true">
	<vue-modal-head>Add New Category</vue-modal-head>
	<vue-modal-body>
		<vue-form :data-class="['form-horizontal', 'push-10-t']" data-action="{{ route('api.category.store') }}" data-name="form-category-add" data-method="post">
			{!! csrf_field() !!}
			<vue-form-group>
				<vue-input data-name="category" :data-col="['col-md-12']" data-label="Category" :is-required="true" data-placeholder="Category"></vue-input>
			</vue-form-group>
			<vue-form-group>
				<vue-textarea data-name="description" :data-col="['col-md-12']" data-label="Description" data-placeholder="Description"></vue-textarea>
			</vue-form-group>
		</vue-form>
	</vue-modal-body>
	<vue-modal-footer slot="footer">
		<button class="btn btn-sm btn-danger" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
		<vue-form-submit :data-class="['btn-success', 'btn-sm']" data-target="form-category-add"><i class="fa fa-check"></i> Submit</vue-form-submit>
	</vue-modal-footer>
</vue-modal>
