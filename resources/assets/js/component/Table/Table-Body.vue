<template>
	<tbody>
		<tr v-if = "items.length == 0">
			<td :colspan="colspan" class="text-center text-muted">No Data Found</td>
		</tr>
		<tr v-for="item in items" v-else>
			<td v-for="col in item" :class="col.class" v-html="col.value"></td>
			<td v-if="isAction" class="text-center"><slot></slot></td>
			<td v-else></td>
		</tr>
	</tbody>
</template>

<script>
	export default {
		data() {
			return {
				items: []
			};
		},
		props: {
			dataMap: { type: Array, required: true },
			dataMethod: { type: String, required: false, default: 'get' },
			dataOptions: { type: Object, required: false, default() { return {}; } },
			dataSource: { type: String, required: false, default: '' },
			dataPagination: { type: String, required: false, default: '' },
			isAction: { type: Boolean, required: false, default: false }
		},
		computed: {
			colspan() {
				if (this.isAction) {
					return this.dataMap.length + 1;
				} else {
					return this.dataMap.length;
				}
			}
		},
		methods: {
			errorResponse(response) {
				//
			},
			successResponse(response) {
				var that = this;
				var mappedResult = response.data.map(function (val) {
					var objres = that.dataMap.map(function (mapval) {
						var format = '{0}';

						if (typeof mapval == 'string') {
							return {class: [], value: val[mapval]};
						} else {
							if (mapval.hasOwnProperty("format")) {
								format = mapval.format;
							}

							return {
								class: mapval.class,
								value: format.format(val[mapval.key])
							};
						}
					});

					return objres;
				});

				this.items = [];
				this.items = mappedResult;
			},
			refreshData() {
				var that = this;

				switch (this.dataMethod.toUpperCase()) {
					case 'GET':
						this.$http.get(that.dataSource, {params: that.dataOptions}).then(that.successResponse, that.errorResponse);
						break;
					case 'POST':
						this.$http.post(that.dataSource, {body: that.dataOptions}).then(that.successResponse, that.errorResponse);
						break;
				}
			}
		},
		created() {
			this.$on('refresh', this.refreshData);
		},
		mounted() {
			this.refreshData();
		}
	}
</script>
