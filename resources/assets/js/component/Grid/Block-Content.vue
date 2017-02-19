<template>
	<div class="block-content" :class="dataClass">
		<slot></slot>
	</div>
</template>

<script>
	export default {
		data() {
			return {};
		},
		props: {
			dataClass: { type: Array, required: false, default() { return []; } }
		}
	}
</script>
