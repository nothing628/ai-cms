<template>
	<div class="dz-preview dz-processing dz-image-preview" :class="classme">
		<div class="dz-image">
			<img v-if="needthumb" :alt="name" :src="thumbnail">
			<span v-else><i class="fa fa-5x" :class="icon_thumb"></i></span>
		</div>
		<div class="dz-details">
			<div class="dz-size"><span><strong>{{ size }}</strong> MB</span></div>
			<div class="dz-filename"><span>{{ name }}</span></div>
		</div>
		<div class="dz-progress"><span class="dz-upload" :style="progressstyle"></span></div>
		<div class="dz-error-message"><span>{{ error_msg }}</span></div>
		<div class="dz-success-mark">
			<span class="fa-stack fa-2x">
				<i class="fa fa-circle fa-stack-2x"></i>
				<i class="fa fa-check fa-stack-1x fa-inverse"></i>
			</span>
		</div>
		<div class="dz-error-mark">
			<span class="fa-stack fa-2x">
				<i class="fa fa-circle fa-stack-2x"></i>
				<i class="fa fa-times fa-stack-1x fa-inverse"></i>
			</span>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				progress: 0,
				error_msg: '',
				is_error: false,
				is_success: false,
				is_complete: false,
				thumbnail: null,
				icon_thumb: 'fa-file'
			};
		},
		props: {
			dataId: { type: String, required: false, default: '' },
			dataName: { type: String, required: false, default: '' },
			dataSize: { type: Number, required: false, default: 0},
			dataFile: { type: File, required: false, default() { return {}; }},
			dataError: { type: String, required: false, default: '' },
			dataProgress: { type: Number, required: false, default: 0 },
			enableThumb: { type: Boolean, required: false, default: false },
			isError: { type: Boolean, required: false, default: false },
			isSuccess: { type: Boolean, required: false, default: false },
			isComplete: { type: Boolean, required: false, default: false }
		},
		computed: {
			progressstyle() {
				return {
					width: this.progress + "%"
				};
			},
			needthumb() {
				var result = false;

				if (this.enableThumb) {
					switch (this.dataFile.type) {
						case 'image/jpeg':
						case 'image/png':
							this.CreateThumbnail(this.dataFile);
							result = true;
						break;
						case 'application/zip':
						case 'application/x-rar':
							this.icon_thumb = 'fa-archive';
						break;
						default:
						//generate default thumbnail
					}
				}

				return result;
			},
			size() {
				return (this.dataSize / Math.pow(1024, 2)).toFixed(1);
			},
			name() {
				return this.dataName;
			},
			classme() {
				var classres = [];

				if (this.is_error) classres.push('dz-error');
				if (this.is_success) classres.push('dz-success');
				if (this.is_complete) classres.push('dz-complete');

				return classres;
			}
		},
		methods: {
			CreateThumbnail(file) {
				var reader = new FileReader();
				var that = this;

				reader.onload = function (e) {
					var img = document.createElement("img");

					img.onload = function () {
						var canvas = document.createElement("canvas");
						var ctx = canvas.getContext("2d");
						var fileInfo = {
							width: img.width,
							height: img.height
						};
						var resizeInfo = that.Resize(fileInfo);

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

						that.thumbnail = thumbnail;
					}

					img.src = e.target.result;
				};

				reader.readAsDataURL(file);
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
			FileProgress(file) {
				if (file.name == this.name) {
					this.progress = file.progress;
				}
			},
			FileError(file) {
				if (file.name == this.name) {
					this.error_msg = file.message;
					this.is_error = true;
					this.is_complete = true;
				}
			},
			FileComplete(file) {
				if (file.name == this.name) {
					this.is_success = true;
					this.is_complete = true;
				}
			}
		},
		created() {
			this.$catch('file-progress', this.FileProgress);
			this.$catch('file-error', this.FileError);
			this.$catch('file-complete', this.FileComplete);
		},
		mounted() {
			this.error_msg = this.dataError;
			this.is_error = this.isError;
			this.is_success = this.isSuccess;
			this.is_complete = this.isComplete;
		}
	}
</script>
