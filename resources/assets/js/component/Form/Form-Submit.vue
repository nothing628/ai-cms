<template>
	<button type="submit" class="btn" :class="dataClass" @click="triggerSubmit">
		<slot></slot>
	</button>
</template>

<script>
	export default {
		data() {
			return {};
		},
		props: {
			dataTarget: { type: String, required: false, default: null },
			dataClass: { type: Array, required: false, default() { return []; } }
		},
		methods: {
			triggerSubmit() {
				bus.$emit('form-submit', this.dataTarget);
			}
		}
	}
</script>
