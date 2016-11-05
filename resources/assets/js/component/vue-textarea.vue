<template>
	<div class="field">
		<label v-if="label != null">{{label}}</label>
		<textarea :name="name" v-model="value" :readonly="isReadonly" rows="2" :placeholder="placeholder">{{defaultValue}}</textarea>
	</div>
</template>

<script>
	module.exports = {
		props: {
			label:			{ required: false, type: String, default: null },
			name:			{ required: true, type: String },
			defaultValue:	{ requried: false, type: String, default: null },
			placeholder:	{ required: false, type: String, default: null },
			isReadonly:		{ required: false, type: Boolean, default: false }
		},
		data: function () {
			return {
				value: null
			}
		},
		events: {
			'flash-field': function (data) {
				if (this.name in data)
					this.value = data[this.name];
			},
			'clear-field': function () {
				this.value = null;
			}
		}
	}
</script>