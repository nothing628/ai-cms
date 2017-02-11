<template>
	<div :class="dataCol">
		<div class="form-material form-material-primary" :class="{'floating':isFloating}">
			<select :class="dataClass" :data-tags="dataMultiple" :data-placeholder="valPlaceholder" :name="dataName" :required="dataRequired" :multiple="dataMultiple">
				<option v-if="!dataMultiple"></option>
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
				currentVal: null,
				items: []
			};
		},
		props: {
			dataCol: { type: Array, required: false, default() { return ['col-md-6']; }},
			dataClass: { type: Array, required: false, default() { return ['form-control', 'js-select2']; }},
			dataCustomSource: { type: Array, required: false, default() { return []; }},
			dataLabel: { type: String, required: false, default: ''},
			dataName: { type: String, required: true},
			dataMultiple: { type: Boolean, required: false, default: false },
			dataMethod: { type: String, required: false, default: 'get' },
			dataOptions: { type: Object, required: false, default() { return {}; } },
			dataPlaceholder: { type: String, required: false, default: ''},
			dataRequired: { type: Boolean, required: false, default: false},
			dataSource: { type: String, required: false, default: 'custom' },
			dataValue: { type: String, required: false, default: ''},
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
					return this.items;
				}
			}
		},
		methods: {
			refreshSelect() {
				var that = this;

				this.$nextTick(function () {
					$("select[name='" + that.dataName + "']").val(that.currentVal).trigger('change');
				});
			},
			errorResponse(response) {
				//
			},
			successResponse(response) {
				this.items = [];
				this.items = response.data;

				if (this.dataValue != '') {
					this.currentVal = this.dataValue;
					this.refreshSelect();
				}
			},
			loadData(url) {
				//Load Data From url;
				var that = this;

				if (this.dataSource == 'custom') return;

				switch (this.dataMethod.toUpperCase()) {
					case 'GET':
						this.$http.get(this.dataSource, {params: that.dataOptions}).then(that.successResponse, that.errorResponse);
					break;
					case 'POST':
						this.$http.post(this.dataSource, {body: that.dataOptions}).then(that.successResponse, that.errorResponse);
					break;
				}
			}
		},
		mounted() {
			this.loadData();
			this.currentVal = this.dataValue;
			this.refreshSelect();
		}
	}
</script>
