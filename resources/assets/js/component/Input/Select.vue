<template>
	<div :class="dataCol">
		<div class="form-material form-material-primary" :class="{'floating':isFloating}">
			<select :class="dataClass" :data-placeholder="valPlaceholder" :name="dataName" :required="dataRequired" :multiple="dataMultiple">
				<option></option>
				<option v-for="item in sourceData" :value="item.value">{{ item.key }}</option>
			</select>
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
			dataClass: { type: Array, required: false, default() { return ['form-control', 'js-select2']; }},
			dataCustomSource: { type: Array, required: false, default() { return []; }},
			dataLabel: { type: String, required: false, default: ''},
			dataMultiple: { type: Boolean, required: false, default: false },
			dataName: { type: String, required: true},
			dataPlaceholder: { type: String, required: false, default: ''},
			dataRequired: { type: Boolean, required: false, default: false},
			dataSource: { type: String, required: false, default: 'custom' },
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
			},
			sourceData() {
				if (this.dataSource == 'custom') {
					return this.dataCustomSource;
				} else {
					return this.loadData(this.dataSource);
				}
			}
		},
		methods: {
			loadData(url) {
				//Load Data From url;
				return [{ key: 'Indonesia', value: 'ID'}, { key: 'United States', value: 'US'}];
			}
		},
		mounted() {
			//
		}
	}
</script>
