<template>
	<div class="block-header" :class="dataClass">
		<h3 class="block-title">
			<slot></slot>
		</h3>
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
