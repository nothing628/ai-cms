<template>
	<div class="page-control push-5 row">
		<div class="col-md-2">
			<button type="button" class="btn btn-success" @click="FileBrowse"><i class="fa fa-upload"></i></button>
			<input type="file" style="display: none;" @change.prevent="FileSelectHandler" accept="image/*, application/zip" />
			<button type="button" class="btn btn-danger" @click="RemoveConfirm"><i class="fa fa-trash"></i></button>
		</div>
		
		<div class="col-md-10">
			<div class="text-danger" v-show="is_error">{{ error_msg }}</div>
			<div class="text-success" v-show="is_completed">Upload Completed !</div>
			<div class="progress" v-show="is_progress">
				<div class="progress-bar progress-bar-success" :style="progressStyle">{{ progressPercent }}</div>
			</div>
		</div>

		<div v-show="false">
			<button :id="dataName + '_button_'"></button>
			<div :id="dataName + '_container_'"></div>
		</div>
	</div>
</template>

<script>
	import mOxie from 'mOxie/bin/js/moxie.js';
	import plupload from 'plupload/js/plupload.min.js';
	import mime from 'mime-types';

	if (typeof window.mOxie == "undefined") window.mOxie = mOxie;
	if (typeof window.plupload == "undefined") window.plupload = plupload;

	export default {
		data() {
			return {
				files: [],
				is_completed: false,
				is_progress: false,
				is_error: false,
				error_msg: null,
				progress_value: 0
			};
		},
		props: {
			dataName: { type: String, required: true },
			dataUpload: { type: String, required: true },
			dataOptions: { type: Object, required: false, default() { return {}; }},
			dataMaxSize: { type: String, default: '100mb' },
			dataChunkSize: { type: String, default: '500kb' }
		},
		computed: {
			progressStyle() {
				return {'width': this.progressPercent };
			},
			progressPercent() {
				return this.progress_value + "%";
			}
		},
		methods: {
			RemovePage() {
				//Process page to delete.
				bus.$emit('alert-show', {title:'Success', text: 'Success delete page.', type: 'success', timer: 800});
				this.$dispatch('upload-complete', { file: file, response: objresponse});
			},
			RemoveConfirm() {
				//Confirm delete
				var params = {};
				params.title = 'Are you sure?';
				params.text = 'You won\'t be able to revert this!'
				params.type = 'warning';
				params.confirmButtonText = 'Yes, delete it!';
				params.onOK = this.RemovePage;
				params.onCancel = function () {};

				bus.$emit('confirm-show', params);
			},
			FileBrowse(evt) {
				var target = evt.target;
				var jqueryObj = $(target);

				jqueryObj.next().trigger('click');
			},
			FileSelectHandler(evt) {
				var files = evt.target.files || evt.dataTransfer.files;

				for(var i = 0; i < files.length; i++) {
					var obj = {
						id: i.toString(),
						name: files[i].name,
						size: files[i].size,
						file: files[i],
						is_uploaded: false,
						is_success: false,
						is_error: false,
						message_err: ''
					};

					this.files.push(obj);
				}

				this.StartUpload();
			},
			StartUpload() {
				if (this.uploader.state == 1) {
					//if Uploader is stop
					var that = this;

					this.files.forEach(function (value) {
						that.uploader.addFile(value.file, value.name);
						that.uploader.refresh();
					});

					this.uploader.start();
				}
			},
			UploadComplete(up, file, result) {
				this.progress_value = 100;
				this.is_progress = false;
				this.is_completed = true;
				this.is_error = false;

				this.UploadedResponse(file, result.response);
			},
			UploadProgress(up, file) {
				this.progress_value = file.percent;
				this.is_progress = true;
				this.is_completed = false;
				this.is_error = false;
			},
			UploadError(up, err) {
				this.is_progress = false;
				this.is_completed = false;
				this.is_error = true;
				this.error_msg = err.response;
				this.files = [];
			},
			UploadedResponse(file, response) {
				try {
					var that = this;
					var objresponse = JSON.parse(response);

					if (response.success == false ) {
						this.is_error = true;
						this.error_msg = response.message;
					}

					this.uploader.removeFile(file);
					this.files = [];
					this.$dispatch('upload-complete', { file: file, response: objresponse});
				} catch (err) {
					console.log(err);
				}
			}
		},
		created() {
			this.uploader = null;
		},
		mounted() { 
			var tmpContainer = document.getElementById(this.dataName + '_container_');
			var tmpBrowse = document.getElementById(this.dataName + '_button_');

			this.uploader = new plupload.Uploader({
				runtimes: 'html5,html4',
				browse_button: tmpBrowse,
				container: tmpContainer,
				url: this.dataUpload,
				chunk_size: this.dataChunkSize,
				http_method: 'POST',
				multipart_params: this.dataOptions,
				headers: {
					'X-CSRF-TOKEN': Laravel.csrfToken,
					'Authorization': Laravel.apiToken
				},
				file_data_name: this.dataName,
				filters: {
					max_file_size: this.dataMaxSize,
					mime_types: [
						{
							title: "Image files",
							extensions: "jpg,gif,png"
						}, {
							title: "Zip files",
							extensions: "zip"
						}
					]
				},
				init: {
					UploadProgress: this.UploadProgress,
					Error: this.UploadError,
					FileUploaded: this.UploadComplete
				}
			});

			this.uploader.init();
		},
		beforeDestroy() {
			if (this.uploader != null) {
				this.uploader.destroy();
			}
		}
	}
</script>
