<template>
	<div :class="dataCol">
		<div class="form-material form-material-primary" :class="{'floating':isFloating}">
			<textarea :class="dataClass" :rows="dataRows" :name="dataName" :required="dataRequired" :placeholder="valPlaceholder" v-model="currentVal"></textarea>
			<label>{{ dataLabel }}</label>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				currentVal: null
			};
		},
		props: {
			dataCol: { type: Array, required: false, default() { return ['col-md-6']; }},
			dataClass: { type: Array, required: false, default() { return ['form-control']; }},
			dataLabel: { type: String, required: false, default: ''},
			dataName: { type: String, required: true},
			dataPlaceholder: { type: String, required: false, default: ''},
			dataRequired: { type: Boolean, required: false, default: false},
			dataRows: { type: Number, required: false, default: 3 },
			dataValue: { type: Object, required: false, default: null},
			isFloating: { type: Boolean, required: false, default: false}
		},
		computed: {
			valPlaceholder() {
				if (this.isFloating) {
					return '';
				} else {
					return this.dataPlaceholder;
				}
			}
		},
		mounted() {
			this.currentVal = this.dataValue;
		}
	}
</script>