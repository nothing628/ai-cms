<template>
	<tbody>
		<tr v-for="item in items">
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
			isAction: { type: Boolean, required: false, default: false }
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
				switch (this.dataMethod.toUpperCase()) {
					case 'GET':
						this.$http.get(this.dataSource, this.dataOptions).then(this.successResponse, this.errorResponse);
						break;
					case 'POST':
						this.$http.post(this.dataSource, this.dataOptions).then(this.successResponse, this.errorResponse);
						break;
				}
			}
		},
		mounted() {
			this.refreshData();
		}
	}
</script>
