<template>
	<tbody>
		<tr v-if = "items.length == 0">
			<td :colspan="colspan" class="text-center text-muted">No Data Found</td>
		</tr>
		<tr v-for="item in items" v-else>
			<td v-for="col in item.column" :class="col.class" v-html="col.value"></td>
			<td v-if="isAction" class="text-center">
				<slot :item="item"></slot>
			</td>
			<td v-else></td>
		</tr>
	</tbody>
</template>

<script>
	export default {
		data() {
			return {
				items: [],
				currentPage: 1
			};
		},
		props: {
			dataMap: { type: Array, required: true },
			dataMethod: { type: String, required: false, default: 'get' },
			dataOptions: { type: Object, required: false, default() { return {}; } },
			dataSource: { type: String, required: false, default: '' },
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
				console.log(response);
				this.items = [];
			},
			successResponse(response) {
				var that = this;
				var data = response.data;
				var from = ("from" in data)?data.from: 0;
				var to = ("to" in data)?data.to: 0;
				var total = ("total" in data)?data.total: 0;

				if (!"data" in data ||
					!"current_page" in data ||
					!"last_page" in data) return;

				var page = data.current_page;
				var maxPage = data.last_page;

				this.$dispatch('pagination-max-page', {page: maxPage});
				this.$dispatch('pagination-page', {page: page});
				this.$dispatch('record-state', {from: from, to: to, total: total });

				var mappedResult = data.data.map(function (val) {
					var datamap = {};
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

					datamap.column = objres;
					datamap.origin = val;

					return datamap;
				});

				this.items = [];
				this.items = mappedResult;
			},
			refreshData() {
				var that = this;
				var merge = Object.assign({page: this.currentPage}, this.dataOptions);

				switch (this.dataMethod.toUpperCase()) {
					case 'GET':
						this.$http.get(that.dataSource, {params: merge}).then(that.successResponse, that.errorResponse);
						break;
					case 'POST':
						this.$http.post(that.dataSource, {body: merge}).then(that.successResponse, that.errorResponse);
						break;
				}
			},
			changePage(page) {
				var that = this;

				this.currentPage = page;
				this.$nextTick(function () {
					that.refreshData();
				});
			}
		},
		created() {
			this.$catch('refresh', this.refreshData);
			this.$catch('change-page', this.changePage);
		},
		mounted() {
			this.refreshData();
		}
	}
</script>
