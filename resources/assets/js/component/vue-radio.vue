<template>
	<div class="field">
		<label></label>
		<input type="text">
	</div>
</template>

<script>
	module.exports = {
		props: {
			name: {
				required: true,
				type: String
			}
		}
	}
</script>