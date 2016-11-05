<template>
	<div class="field" v-show="!hidden">
		<label>{{label}}</label>
		<img v-if="canShowPreview" class="ui image" :src="getImageUrl" style="margin-bottom:1em;">
		<a   v-if="canShowLink" target="_blank" :href="getImageUrl">{{ value }}</a>
		<button class="ui labeled small icon button" type="button" @click="showBrowse"><i class="icon upload"></i> Upload</button>

		<input type="file" :accept="accept" :id="id" style="display:none;" :multiple="multiple">
		<div v-if="multiple">
			<input :name="name + '[]'" type="hidden" :value="val" v-for="val in valueArr">
		</div>
		<div v-else>
			<input :name="name" type="hidden" :value="value">
		</div>

		<vue-progress :name="name"></vue-progress>
	</div>
</template>

<script>
	module.exports = {
		props: {
			name:			{ required: true, type: String },
			label:			{ required: false, type: String, default: null },
			defaultValue:	{ required: false, type: String, default: null },
			multiple:		{ required: false, type: Boolean, default: false },
			accept:			{ required: false, type: String, default: 'image/*' },
			showPreview:	{ required: false, type: Boolean, default: false },
			hidden:			{ required: false, type: Boolean, default: false }
		},
		computed: {
			id: function () {
				return this.name + '-file';
			},
			selector: function () {
				return '#' + this.id;
			},
			getImageUrl: function () {
				if (this.value == null)
					return '/manga/image/thumb/dummy.png';
				return '/manga/image/thumb/' + this.value;
			},
			canShowPreview: function () {
				if (!this.multiple && this.value != null && this.showPreview && !this.hidden)
					return true;
				return false;
			},
			canShowLink: function () {
				if (!this.multiple && this.value != null && !this.showPreview && !this.hidden)
					return true;
				return false;
			}
		},
		data: function () {
			return {
				valueArr: [],
				value: null,
				current: 0,
				success: 0,
				error: 0,
				tmpFile: []
			}
		},
		methods: {
			dispatchInfo: function (uploadevent, progress) {
				var info = {
					event: uploadevent,
					progress: progress
				};
				this.$broadcast(uploadevent, this.name, progress);
				this.$dispatch('upload-progress', info);
			},
			showBrowse: function () {
				$(this.selector).trigger('click');
			},
			uploadExec: function (file) {
				var that = this;
				this.$http.post('/manga/upload/image',file.data,{
					upload:file.upload
				}).then(function (response) {
					if (response.data.success) {
						file.onsuccess && file.onsuccess(response.data);
					} else {
						file.onerror && file.onerror();
					}
					file.oncomplete && file.oncomplete();
				}, function () {
					file.onerror && file.onerror();
					file.oncomplete && file.oncomplete();
				});
			},
			uploadFile: function () {
				var that = this;
				var formData = new FormData;
				var data = {};
				formData.append('image', this.tmpFile[this.current]);
				if (this.current == this.tmpFile.length) {
					this.uploadFinish();
					return;
				}
				if (this.multiple) {
					data = {
						data:formData,
						upload: {},
						onsuccess: function (response) {
							that.success++;
							that.valueArr.push(response.data.filename);
						},
						onerror: function () {
							that.error++;
						},
						oncomplete: function () {
							var progress = (that.current / that.tmpFile.length * 100);
							that.current++;
							that.dispatchInfo('progress-set', progress)
							that.uploadFile();
						}
					}
				} else {
					data = {
						data: formData,
						upload: {
							onload: function (e) {
								that.uploadFinish();
							},
							onprogress: function (e) {
								var val = e.loaded/e.total * 100;
								that.dispatchInfo('progress-set', val);
							}
						},
						onsuccess: function (response) {
							that.value = response.data.filename;
						},
						onerror: function () {
							that.error++;
						},
						oncomplete: function () {}
					}
				}
				this.uploadExec(data);
			},
			uploadStart: function (event) {
				this.tmpFile = event.currentTarget.files;

				this.valueArr = [];
				this.value = null;
				this.current = 0;
				this.success = 0;
				this.error = 0;

				this.dispatchInfo('progress-reset');
				this.dispatchInfo('progress-show');
				this.uploadFile();
			},
			uploadFinish: function () {
				var that = this;
				this.dispatchInfo('progress-complete');
				this.dispatchInfo('progress-hide');
				if (this.errorfile > 0) {
					var notify = {title: 'Upload Failed', text: '', type:'error'};
					notify.text = this.error + ' of ' + this.tmpFile.length + ' files error while upload';
					this.$dispatch('app-notify', notify);
				}
				this.tmpFile = [];
				$(this.selector).val('');
				
				this.$nextTick( function () {
					that.$dispatch('upload-complete');
				});
			}
		},
		events: {
			'flash-field': function (data) {
				if (this.name in data) {
					if (this.multiple) {
						this.valueArr = [];
						if (typeof data[this.name] == 'Array') {
							$.each(data[this.name], function (index, item) {
								that.valueArr.push(item);
							});
						} else {
							this.valueArr.push(data[this.name]);
						}
					} else {
						this.value = data[this.name];
					}
				}
			},
			'clear-field': function () {
				this.value = null;
				this.valueArr = [];
			},
			'browse-upload': function (nameinput) {
				if (this.name == nameinput)
					this.showBrowse();
			}
		},
		ready: function () {
			var that = this;
			$(this.selector).on('change', function (event) {
				that.uploadStart(event);
			});
			this.$broadcast('progress-hide', this.name);
		}
	}
</script>