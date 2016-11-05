<template>
	<div class="field" :class="class">
		<label v-if="label != null">{{label}}</label>
		<input :type="type" v-model="value" :readonly="isReadonly" :name="name" :value="defaultValue" :placeholder="placeholder">
	</div>
</template>

<script>
	module.exports = {
		props: {
			label:			{ required: false, type: String, default: null },
			name:			{ required: true, type: String },
			class:			{ required: false, type: Array, default: function () {return [];} },
			defaultValue:	{ required: false, type: String, default: null },
			type:			{ required: false, type: String, default: 'text' },
			isReadonly:		{ required: false, type: Boolean, default: false },
			placeholder:	{ required: false, type: String, default: null }
		},
		data: function() {
			return {
				value: null
			};
		},
		events: {
			'flash-field': function (data) {
				if (this.name in data)
					this.value = data[this.name];
			},
			'clear-field': function () {
				this.value = null;
			}
		},
		ready: function () {
			this.value = this.defaultValue;
		}
	}
</script>