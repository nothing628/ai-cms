<template>
	<form enctype="multipart/form-data" :class="dataClass" :method = "dataMethod">
		<slot></slot>
	</form>
</template>

<script>
	export default {
		data() {
			return {
				//
			};
		},
		props: {
			dataClass: { type: Array, required: false, default() {return ['form-horizontal']}},
			dataMethod: { type: String, required: false, default: 'POST'}
		},
		computed: {
			//
		}
	}
</script>
