<template>
	<div class="page-control">
		<button type="button" class="btn btn-success" @click="FileBrowse"><i class="fa fa-upload"></i> Upload Pages</button>
		<input type="file" v-show="false" @change.prevent="FileSelectHandler" accept="image/*, application/zip" />
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
			return {};
		},
		methods: {
			FileBrowse(evt) {
				var target = evt.target;
				var jqueryObj = $(target);

				jqueryObj.next().trigger('click');
			},
			FileSelectHandler(evt) {
				var files = e.target.files || e.dataTransfer.files;

				console.log(files);
			}
		}
	}
</script>
