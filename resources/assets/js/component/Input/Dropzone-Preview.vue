<template>
	<div class="dz-preview dz-processing dz-image-preview">
		<div class="dz-image"><img alt="" src=""></div>
		<div class="dz-details">
			<div class="dz-size"><span><strong>0.1</strong> MB</span></div>
			<div class="dz-filename"><span>Screenshot_2016-12-16_00-30-11.png</span></div>
		</div>
		<div class="dz-progress"><span class="dz-upload" style="width: 90%;"></span></div>
		<div class="dz-error-message"><span></span></div>
		<div class="dz-success-mark">
			<i class="fa fa-check"></i>
		</div>
		<div class="dz-error-mark">
			<i class="fa fa-times"></i>
		</div>
	</div>
</template>

<style type="text/css"></style>

<script>
	export default {
		data() {
			return {
				progress: 0,
				error_msg: '',
				is_error: false,
				is_uploading: false
			};
		},
		props: {
			dataSource: { type: String, required: true },
			dataAlt: { type: String, required: false, default: '' },
			dataName: { type: String, required: true }
		},
		computed: {
			size() {
				return 0;
			}
		},
		methods: {
			//
		}
	}
</script>
