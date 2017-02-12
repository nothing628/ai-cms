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
			</div>

			<div id="list"></div>
		</div>
	</div>
</template>

<style type="text/css">
	.dropzone .dz-message {
		text-align: center;
		margin: 2em 0;
	}

	.dz-clickable {
		cursor: pointer;
	}

	.dropzone {
		min-height: 150px;
		border: 2px solid rgba(0,0,0,.3);
		background: #fff;
		padding: 20px;
	}

	#list .thumb {
		height: auto;
		width: 200px;
	}
</style>

<script>
	export default {
		data() {
			return {};
		},
		props: {
			dataCol: { type: Array, required: false, default() { return ['col-md-6']; }}
		},
		methods: {
			isAdvancedUpload() {
				var div = document.createElement('div');
				var windowsupport = (window.File && window.FileReader && window.FileList && window.Blob);
				var divelm = (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div));

				return windowsupport && divelm;
			},
			CreateThumbnail(f) {
				var reader = new FileReader();
				var that = this;

				reader.onload = function (e) {
					var span = document.createElement('span');
					var img = document.createElement("img");

					img.onload = function () {
						var canvas = document.createElement("canvas");
						var ctx = canvas.getContext("2d");
						var file = {
							width: img.width,
							height: img.height
						};
						var resizeInfo = that.Resize(file);

						if (resizeInfo.trgWidth == null) {
							resizeInfo.trgWidth = resizeInfo.optWidth;
						}
						if (resizeInfo.trgHeight == null) {
							resizeInfo.trgHeight = resizeInfo.optHeight;
						}

						canvas.width = resizeInfo.trgWidth;
						canvas.height = resizeInfo.trgHeight;

						ctx.drawImage(img,
							(resizeInfo.srcX)?resizeInfo.srcX:0,
							(resizeInfo.srcY)?resizeInfo.srcY:0,
							resizeInfo.srcWidth,
							resizeInfo.srcHeight,
							(resizeInfo.trgX)?resizeInfo.trgX:0,
							(resizeInfo.trgY)?resizeInfo.trgY:0,
							resizeInfo.trgWidth,
							resizeInfo.trgHeight);

						var thumb = document.createElement('img');
						var thumbnail = canvas.toDataURL("image/png");

						thumb.src = thumbnail;
						span.insertBefore(thumb, null);
					}

					img.src = e.target.result;

					document.getElementById('list').insertBefore(span, null);
				};

				reader.readAsDataURL(f);
			},
			Resize(file) {
				var info, srcRatio, trgRatio;

				info = {
					srcX: 0,
					srcY: 0,
					srcWidth: file.width,
					srcHeight: file.height
				};
				srcRatio = file.width / file.height;
				info.optWidth = 150;
				info.optHeight = 150;

				if ((info.optWidth == null) && (info.optHeight == null)) {
					info.optWidth = info.srcWidth;
					info.optHeight = info.srcHeight;
				} else if (info.optWidth == null) {
					info.optWidth = srcRatio * info.optHeight;
				} else if (info.optHeight == null) {
					info.optHeight = (1 / srcRatio) * info.optWidth;
				}

				trgRatio = info.optWidth / info.optHeight;

				if (file.height < info.optHeight || file.width < info.optWidth) {
					info.trgHeight = info.srcHeight;
					info.trgWidth = info.srcWidth;
				} else {
					if (srcRatio > trgRatio) {
						info.srcHeight = file.height;
						info.srcWidth = info.srcHeight * trgRatio;
					} else {
						info.srcWidth = file.width;
						info.srcHeight = info.srcWidth / trgRatio;
					}
				}
				info.srcX = (file.width - info.srcWidth) / 2;
				info.srcY = (file.height - info.srcHeight) / 2;

				return info;
			},
			FileBrowse() {
				document.getElementById('fileselect').click();
			},
			FileDragHover(e) {},
			FileSelectHandler(e) {
				this.FileDragHover(e);

				var files = e.target.files || e.dataTransfer.files;

				for(var i = 0; i < files.length; i++) {
					this.CreateThumbnail(files[i]);
				}

				console.log(files);
			}
		},
		mounted() {
			if (!this.isAdvancedUpload()) {
				console.log('Your browser doesn\'t support dropzone upload');
			}
		}
	}
</script>
