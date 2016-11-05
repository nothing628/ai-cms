<template>
	<img class="ui image" :class="class" :src="rsrc" v-on:error="onError">
</template>

<script>
	module.exports = {
		props: {
			src: { required: false, type: String, default: null },
			class: { required: false, type: Array, default: function () {return [];} },
			dummy: { required: false, type: String, default: '/manga/image/thumb/dummy.png' }
		},
		data: function () {
			return {
				rsrc: null
			}
		},
		methods: {
			onError: function () {
				this.rsrc = this.dummy;
			}
		},
		ready: function () {
			this.rsrc = this.src;
		}
	}
</script>