<template>
	<button type="button" @click="StartUpload" class="btn push-5-t" :class="">
		<slot></slot>
	</button>
</template>

<script>
	export default {
		data() {
			return {};
		},
		props: {
			dataClass: { type: Array, default() { return ['btn-primary']; }}
		},
		methods: {
			StartUpload() {
				bus.$emit('start-upload');
			}
		}
	}
</script>
