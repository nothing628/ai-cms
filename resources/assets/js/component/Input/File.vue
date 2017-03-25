<template>
	<div :class="dataCol">
		<div class="form-material form-material-primary">
			<input type="file" :name="dataName" :accept="dataAccept" @change.stop.prevent="valueChanged">
			<label>{{ dataLabel}}</label>
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
			dataAccept: { type: String, required: false, default: 'image/*' },
			dataCol: { type: Array, required: false, default() { return ['col-md-6']; }},
			dataLabel: { type: String, required: false, default: ''},
			dataName: { type: String, required: true},
			dataPlaceholder: { type: String, required: false, default: ''},
			dataValue: { type: Object, required: false, default: null},
			isRequired: { type: Boolean, required: false, default: false},
		},
		computed: {
			//
		},
		methods: {
			valueChanged(e) {
				this.currentVal = e.target.files;
			}
		},
		mounted() {
			//
		}
	}
</script>
