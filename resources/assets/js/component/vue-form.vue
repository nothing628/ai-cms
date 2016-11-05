<style>
	.expand-transition {
	  transition: all .3s ease;
	}

	.expand-enter, .expand-leave {
	  opacity: 0;
	}
</style>

<template>
	<form
	:id="id"
	v-show="! isHidden"
	transition="expand"
	class="ui form"
	v-on:submit="submit"
	:method="method"
	:action="action"
	:class="class"
	>
		<slot></slot>
		<input type="hidden" :name="item.name" :value="item.value" v-for="item in params">
	</form>
</template>

<script>
	module.exports = {
		props: {
			name: 			{ required: true, type: String },
			action: 		{ required: false, type: String, default: null },
			method:			{ required: false, type: String, default: 'post' },
			class: 			{ required: false, type: Array, default: function () {return [];} },
			params:			{ required: false, type: Array, default: function () {return [];} },
			hidden:			{ required: false, type: Boolean, default: false },
			resetOnSave:	{ required: false, type: Boolean, default: false },
			hideOnSave:		{ required: false, type: Boolean, default: true },
			preventSubmit:	{ required: false, type: Boolean, default: true },
			actionRefresh:	{ required: false, type: String, default: null },
			actionSave:		{ required: false, type: String, default: null },
			actionDelete:	{ required: false, type: String, default: null },
			targetAdd:		{ required: false, type: String, default: null },
			targetEdit:		{ required: false, type: String, default: null }
		},
		computed: {
			selector: function () {
				return '#' + this.id;
			},
			id: function () {
				return this.name + '-form';
			}
		},
		data: function () {
			return {
				isHidden: false,
				isDetail: false
			}
		},
		methods: {
			getFormValues: function () {
				var submitdata = $(this.selector).serializeArray();
				var objectsubmit = {};
				$.each(submitdata, function (index, item) {
					if (item.name.endsWith("[]") && ! (item.name.replace('[]','') in objectsubmit))
						objectsubmit[item.name.replace('[]','')] = [];
					if (item.name.endsWith("[]")) 
						objectsubmit[item.name.replace('[]','')].push(item.value);
					else 
						objectsubmit[item.name] = item.value;
				});

				return objectsubmit;
			},
			submit: function (event) {
				if (this.preventSubmit) event.preventDefault();
				this.$emit('form-submit');
			}
		},
		events: {
			'form-submit-callback': function (data) {
				if (data.success) {
					var notify = {title: 'Save Success', text: data.message};
					this.$dispatch('app-notify', notify);
					this.$dispatch('form-refresh');
					if (this.resetOnSave) this.$emit('form-reset');
					if (this.hideOnSave) this.$emit('form-hide');
				} else {
					var notify = {title: 'Save Failed', text: data.message, type:'error'};
					this.$dispatch('app-notify', notify);
				}
			},
			'form-delete-callback': function (data) {
				if (data.success) {
					var notify = {title: 'Save Success', text: data.message};
					this.$dispatch('form-refresh');
					this.$dispatch('form-close', this.formTargetAdd);
					this.$dispatch('form-close', this.formTargetEdit);
					this.$dispatch('app-notify', notify);
				} else {
					var notify = {title: 'Delete Failed', text: data.message, type:'error'};
					this.$dispatch('app-notify', notify);
				}
			},
			'form-refresh-callback': function (data) {
				if (data.success) {
					this.$broadcast('update-page', {page_num:data.data.page_num, max_page:data.data.max_page});
					this.$broadcast('row-flash', data.data.data);
				}
			},
			//////////////////////////////////////
			'form-refresh': function () {
				if (this.actionRefresh == null) return;

				var that = this;
				var objectsubmit = this.getFormValues();
				var data = {
					data: objectsubmit,
					client_action: this.actionRefresh,
					onsuccess: function (data) {
						that.$emit('form-refresh-callback', data);
					},
					onerror: function (faildata) {}
				};

				this.$dispatch('ajax-action', data);
			},
			'form-submit': function (newparam, name) {
				if (this.actionSave == null) return;
				if (this.isDetail) return;

				var that = this;
				var objectsubmit = this.getFormValues();
				if (typeof name != 'undefined' && typeof newparam != 'undefined' && this.name == name)
					objectsubmit = $.extend({},objectsubmit, newparam);

				var data = {
					data: objectsubmit,
					client_action: this.actionSave,
					onsuccess: function (data) {
						that.$emit('form-submit-callback', data);
					},
					onerror: function (faildata) {}
				};

				this.$dispatch('ajax-action', data);
			},
			'form-reset': function () {
				$(this.selector)[0].reset();
			},
			'form-show': function () {
				this.isHidden = false;
			},
			'form-hide': function () {
				this.isHidden = true;
			},
			/////////////////////////////////
			'form-new': function (name) {
				if (typeof name == 'undefined' && this.targetAdd != null) this.$dispatch('form-new', this.targetAdd);
				if (this.name == name) {
					this.$emit('form-reset');
					this.$emit('form-show');
					this.$broadcast('clear-field');
				}
			},
			'form-edit': function (data, name) {
				if (this.name == name) {
					this.isDetail = false;
					this.$broadcast('flash-field', data);
					this.$emit('form-show');
				}
			},
			'form-detail': function (data, name) {
				if (this.name == name) {
					this.isDetail = true;
					this.$broadcast('flash-field', data);
					this.$emit('form-show');
				}
			},
			'form-close': function (name) {
				if (this.name == name)
					this.$emit('form-hide');
			},
			'form-delete': function () {
				if (this.actionDelete == null) return;

				var that = this;
				var objectsubmit = this.getFormValues();
				var confirm = {
					title: 'Delete data',
					text: 'Are you sure to delete this data?',
					onconfirm: function (newvalue) {
						var param = {
							data: objectsubmit,
							client_action:that.actionDelete,
							onsuccess: function (dataret) {
								that.$emit('form-delete-callback', dataret);
							},
							onerror: function (fail) {}
						};

						that.$dispatch('ajax-action', param);
					}
				}
				this.$dispatch('app-confirm', confirm);
			},
			////////////////////////////////////
			'row-detail': function (data) {
				if (this.targetEdit == null) return;
				this.$dispatch('form-detail', data, this.targetEdit);
			},
			'row-edit': function (data) {
				if (this.targetEdit == null) return;
				this.$dispatch('form-edit', data, this.targetEdit);
			},
			'row-delete': function (data) {
				if (this.actionDelete == null) return;

				var that = this;
				var confirm = {
					title: 'Delete data',
					text: 'Are you sure to delete this data?',
					onconfirm: function (newvalue) {
						var param = {
							data: data,
							client_action:that.actionDelete,
							onsuccess: function (dataret) {
								that.$emit('form-delete-callback', dataret);
							},
							onerror: function (fail) {}
						};

						that.$dispatch('ajax-action', param);
					}
				};

				this.$dispatch('app-confirm', confirm);
			},
			////////////////////////////////////
			'page-changed': function () {
				this.$emit('form-refresh');
			}
		},
		ready: function () {
			this.isHidden = this.hidden;
			this.$emit('form-refresh');
		}
	}
</script>