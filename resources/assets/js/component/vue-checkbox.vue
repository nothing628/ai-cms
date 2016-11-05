<template>
	<div class="field">
		<label>{{ label }}</label>
		<div class="ui toggle checkbox">
			<input type="checkbox" v-model="checked" :name="name" :value="value">
			<label v-text="placeholder"></label>
		</div>
	</div>
</template>

<script>
	module.exports = {
		props: {
			name:			{ required: true, type: String },
			label:			{ required: false, type: String, default: null },
			defaultValue:	{ required: false, type: Boolean, default: false },
			value:			{ required: false, type: String, default: null },
			placeholder:	{ required: false, type: String, default: null }
		},
		data: function () {
			return {
				checked: false
			}
		},
		ready: function () {
			this.checked = this.defaultValue;
		}
	}
</script>