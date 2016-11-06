<template>
	<div class="field">
		<label></label>
		<input type="text">
	</div>
</template>

<script>
	export default {
		props: {
			name: {
				required: true,
				type: String
			}
		}
	}
</script>