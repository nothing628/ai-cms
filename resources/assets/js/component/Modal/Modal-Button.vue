<template>
	<button class="btn" :class="dataClass" @click="showModal">
		<slot></slot>
	</button>
</template>

<script>
	export default {
		data() {
			return {};
		},
		props: {
			dataTarget: { type: String, required: true },
			dataClass: { type: Array, required: false, default() { return []; } }
		},
		methods: {
			showModal() {
				bus.$emit('show-modal', this.dataTarget);
			}
		}
	}
</script>
