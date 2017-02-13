<template>
	<div :class="dataCol">
		<div class="drop-area">
			<label for="fileselect">Files to upload:</label>
			<input v-show="false" type="file" @change.prevent.stop="FileSelectHandler" id="fileselect" name="fileselect[]" multiple="multiple" />
			<div @click="FileBrowse" class="dropzone dz-clickable" :class="classme"
			@dragover.prevent.stop="FileDragHover"
			@dragleave.prevent.stop="FileDragHover"
			@drop.prevent.stop="FileSelectHandler">
				<div class="dz-default dz-message"><span>Drop files here to upload</span></div>
				<vue-dropzone-preview v-for="file in files"
					:data-id = "file.id"
					:data-name="file.name"
					:data-size="file.size"
					:data-file="file.file"
					:is-error="true"
					:enable-thumb="true"
					></vue-dropzone-preview>
			</div>
		</div>
		<div class="alert alert-warning" v-if="!isAdvancedUpload">Your Browser doesn't support dropfile function</div>
	</div>
</template>

<script>
	import plupload from '../../base/plupload';
	export default {
		data() {
			return {
				files: [],
				uploader: null
			};
		},
		props: {
			dataCol: { type: Array, required: false, default() { return ['col-md-6']; }},
			dataAllow: { type: Array, required: false, default() { return ['image/jpeg', 'image/png']; }},
			dataUpload: { type: String, required: true },
			dataMaxSize: { type: String, default: '100mb' },
			dataChunkSize: { type: String, default: '500kb' }
		},
		computed: {
			classme() {
				if (this.files.length > 0) {
					return ['dz-started'];
				}

				return [];
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
					var obj = {};
					obj.id = i.toString();
					obj.name = files[i].name;
					obj.size = files[i].size;
					obj.file = files[i];

					if (this.dataAllow.indexOf(files[i].type) == -1) {
						console.log('this file is not allowed');
						continue;
					}

					this.files.push(obj);
				}
			},
			UploadProgress(up, file) {
				//
			},
			Error(up, err) {
				//
			}
		},
		mounted() {
			if (!this.isAdvancedUpload()) {
				console.log('Your browser doesn\'t support dropzone upload');
				return;
			}

			this.uploader = new plupload.Uploader({
				runtimes: 'html5,html4',
				url: this.dataUpload,
				chunk_size: this.dataChunkSize,
				http_method: 'POST',
				max_retries: 0,
				multipart: true,
				multipart_params: {},
				send_chunk_number: true,
				send_file_name: true,
				headers: {
					'X-CSRF-TOKEN': Laravel.csrfToken,
					'Authorization': Laravel.apiToken
				},
				filters: {
					max_file_size: this.dataMaxSize,
					prevent_duplicates: true
				},
				init: {
					UploadProgress: this.UploadProgress,
					Error: this.Error
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
