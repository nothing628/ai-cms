<template>
	<div :class="dataCol">
		<div class="drop-area">
			<label for="fileselect">Files to upload:</label>
			<input v-show="false" type="file" :accept="dataAccept" @change.prevent="FileSelectHandler" id="fileselect" multiple="multiple" />
			<div @click="FileBrowse" class="dropzone dz-clickable" :class="classme"
			@dragover.prevent.stop="FileDragHover"
			@dragleave.prevent.stop="FileDragHover"
			@drop.prevent.stop="FileSelectHandler">
				<div class="dz-default dz-message"><span>{{ dataMessage }}</span></div>
				<vue-dropzone-preview v-for="file in files"
					:data-id = "file.id"
					:data-name="file.name"
					:data-size="file.size"
					:data-file="file.file"
					:enable-thumb="true"
					></vue-dropzone-preview>
			</div>

			<input type="hidden" :name="inputname" :value="file" v-for="file in additional_file">
			<input type="hidden" :name="inputname" :value="file" v-for="file in complete_file">
		</div>
		<div v-show="false">
			<button :id="dataName + 'button_'"></button>
			<div :id="dataName + 'container_'"></div>
		</div>
		<div class="alert alert-warning" v-if="!isAdvancedUpload">Your Browser doesn't support dropfile function</div>
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
				current_file: null,
				additional_file: [],
				complete_file: []
			};
		},
		props: {
			dataCol: { type: Array, required: false, default() { return ['col-md-6']; }},
			dataAccept: { type: String, default: 'image/*' },
			dataUpload: { type: String, required: true },
			dataName: { type: String, required: true },
			dataMaxSize: { type: String, default: '100mb' },
			dataOptions: { type: Object, default() { return {}; }},
			dataChunkSize: { type: String, default: '500kb' },
			dataMessage: { type: String, default: 'Drop files here to upload' },
			isAutoUpload: { type: Boolean, default: false },
			submitAfterComplete: { type: Boolean, default: false }
		},
		computed: {
			classme() {
				if (this.files.length > 0) {
					return ['dz-started'];
				}

				return [];
			},
			inputname() {
				return this.dataName + "[]";
			}
		},
		methods: {
			isAdvancedUpload() {
				var div = document.createElement('div');
				var windowsupport = (window.File && window.FileReader && window.FileList && window.Blob);
				var divelm = (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div));

				return windowsupport && divelm;
			},
			FileBrowse() {
				document.getElementById('fileselect').click();
			},
			FileDragHover(e) {},
			FileSelectHandler(e) {
				var files = e.target.files || e.dataTransfer.files;

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

					if (this.CheckFile(files[i]) != this.dataAccept) {
						console.log('this file is not allowed');
						continue;
					}

					this.files.push(obj);
				}

				if (this.isAutoUpload) {
					this.StartUpload();
				}
			},
			FileUploaded(up, file, result) {
				this.UploadedResponse(file, result.response);
				this.$broadcast('file-complete', { name: file.name, status: result.status });
			},
			UploadProgress(up, file) {
				this.$broadcast('file-progress', { name: file.name, progress: file.percent });
			},
			Error(up, err) {
				this.$broadcast('file-error', { name: err.file.name, message: err.response });
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
			UploadedResponse(file, response) {
				try {
					var that = this;
					var objresponse = JSON.parse(response);

					if ("files" in objresponse) {
						objresponse.files.forEach(function (value) {
							that.additional_file.push(value);
						});
					}
				} catch (err) {
					console.log(err);
				}
			},
			CheckFile(file) {
				return mime.lookup(file.name);
			}
		},
		created() {
			this.uploader = null;
		},
		mounted() {
			bus.$on('start-upload', this.StartUpload);

			if (!this.isAdvancedUpload()) {
				console.log('Your browser doesn\'t support dropzone upload');
				return;
			}

			var tmpContainer = document.getElementById(this.dataName + 'container_');
			var tmpBrowse = document.getElementById(this.dataName + 'button_');

			this.uploader = new plupload.Uploader({
				runtimes: 'html5,html4',
				browse_button: tmpBrowse,
				container: tmpContainer,
				url: this.dataUpload,
				chunk_size: this.dataChunkSize,
				http_method: 'POST',
				//max_retries: 3,
				//multipart: true,
				multipart_params: this.dataOptions,
				//send_chunk_number: true,
				//send_file_name: true,
				headers: {
					'X-CSRF-TOKEN': Laravel.csrfToken,
					'Authorization': Laravel.apiToken
				},
				//required_features: 'chunks',
				file_data_name: this.dataName,
				filters: {
					max_file_size: this.dataMaxSize,
					mime_types: [
						{
							title: "Video files",
							extensions: "mp4"
						}, {
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
					Error: this.Error,
					FileUploaded: this.FileUploaded
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
