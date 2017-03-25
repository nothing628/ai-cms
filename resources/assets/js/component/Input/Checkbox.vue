<template>
	<div :class="dataCol">
		<label class="css-input switch switch-sm switch-primary" :for="idInput">
			<input v-model="currentVal" @change="check" :id="idInput" type="checkbox" :disabled="isDisabled" :name="dataName">
			<span></span> {{ dataLabel }}
		</label>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				currentVal: false
			}
		},
		props: {
			dataCol: { type: Array, required: false, default() { return ['col-md-12']; }},
			dataLabel: { type: String, required: false, default: ''},
			dataName: { type: String, required: true},
			dataValue: { type: Boolean, required: false, default: false},
			isRequired: { type: Boolean, required: false, default: false},
			isDisabled: { type: Boolean, required: false, default: false }
		},
		computed: {
			idInput() {
				return "input-" + this.dataName;
			}
		},
		methods: {
			check() {
				console.log(this.currentVal);
			},
			clear() {
				this.currentVal = false;
			},
			fill(data) {
				if (data.hasOwnProperty(this.dataName)) {
					this.currentVal = data[this.dataName];
				}
			}
		},
		created() {
			this.$catch('input-fill', this.fill);
			bus.$on('input-clear', this.clear);
		},
		mounted() {
			this.currentVal = this.dataValue;
		}
	}
</script>
