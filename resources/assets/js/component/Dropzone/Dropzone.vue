<template>
	<div :class="dataCol">
		<div class="drop-area">
			<label for="fileselect">Files to upload:</label>
			<input v-show="false" type="file" @change.prevent.stop="FileSelectHandler" id="fileselect" name="fileselect[]" multiple="multiple" />
			<div @click="FileBrowse" class="dropzone dz-clickable"
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
	export default {
		data() {
			return {
				files: []
			};
		},
		props: {
			dataCol: { type: Array, required: false, default() { return ['col-md-6']; }},
			dataAllow: { type: Array, required: false, default() { return ['image/jpeg', 'image/png']; }}
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
					obj.id = i;
					obj.name = files[i].name;
					obj.size = files[i].size;
					obj.file = files[i];

					if (this.dataAllow.indexOf(files[i].type) == -1) {
						console.log('this file is not allowed');
						continue;
					}

					this.files.push(obj);
				}
			}
		},
		mounted() {
			if (!this.isAdvancedUpload()) {
				console.log('Your browser doesn\'t support dropzone upload');
			}
		}
	}
</script>
