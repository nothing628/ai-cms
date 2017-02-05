<template>
	<table class="table table-hover" :class="dataClass">
		<slot></slot>
	</table>
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
