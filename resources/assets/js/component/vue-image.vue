<template>
	<img class="ui image" :class="class" :src="rsrc" v-on:error="onError">
</template>

<script>
	export default {
		props: {
			src: { required: false, type: String, default: null },
			class: { required: false, type: Array, default: function () {return [];} },
			dummy: { required: false, type: String, default: '/manga/image/thumb/dummy.png' }
		},
		data() {
			return {
				rsrc: null
			}
		},
		methods: {
			onError() {
				this.rsrc = this.dummy;
			}
		},
		ready() {
			this.rsrc = this.src;
		}
	}
</script>