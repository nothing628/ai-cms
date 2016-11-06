<template>
	<div v-show="! hidden" class="ui indicating progress" :id="id"><div class="bar"><div class="progress"></div></div></div>
</template>

<script>
	export default {
		props: {
			name:			{ required: true, type: String },
			hidden:			{ required: false, type: Boolean, default: false },
			defaultValue:	{ required: false, type: Number, default: 0 }
		},
		data() {
			return {
				value: 0
			}
		},
		watch: {
			'value': function (val, oldval) {
				$(this.selector).progress({percent:parseInt(Math.ceil(this.value))});
			}
		},
		computed: {
			id() {
				return this.name + '-progress';
			},
			selector() {
				return '#' + this.id;
			}
		},
		events: {
			'progress-set': function (name, value) {
				if (name == this.name)
					this.value = parseInt(Math.ceil(value));
			},
			'progress-reset': function (name) {
				if (name == this.name)
					this.value = 0;
			},
			'progress-complete': function (name) {
				if (name == this.name)
					this.value = 100;
			},
			'progress-show': function (name) {
				if (name == this.name)
					this.hidden = false;
			},
			'progress-hide': function (name) {
				if (name == this.name)
					this.hidden = true;
			}
		},
		ready() {
			this.value = this.defaultValue;
		}
	}
</script>