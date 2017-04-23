<template>
	<div :class="dataCol">
		<label>Page Selector:</label>
		<page-upload
		:data-name="dataName"
		:data-upload="dataUpload"
		:data-options="dataOptions"></page-upload>
		<div class="page-list">
			<page-data v-for="page in pages" :data-page="page" :key="page.id"></page-data>
			<div class="clearfix"></div>
		</div>
	</div>
</template>

<style>
	.page-list {
		min-height: 200px;
		width: 100%;
		border: 1px solid #bbb;
		border-radius: 0px 0px 3px 3px;
		padding: 15px 10px;
	}

	.page-control .progress {
		margin-bottom: 5px;
	}

	.page-list .page {
		width: 150px;
		cursor: pointer;
		float: left;
		position: relative;
		margin-bottom: 15px;
		margin-right: 15px;
	}

	.page .page-overlay {
		background-color: rgba(30,30,30,0.85);
		color: #EEE;
	}

	.page .page-overlay span {
		width: 90px;
		text-align: center;
		display: block;
		padding: 4px;
		float: left;
	}

	.page .page-overlay .btn {
		float: left;
		width: 20px;
		border-radius: 0;
		padding-top: 4px;
		padding-bottom: 4px;
	}

	.page .page-img {
		position: relative;
		overflow: hidden;
		display: block;
		padding-top: 140%;
		background-color: #ddd;
	}

	.page .page-img img.img-responsive {
		position: absolute;
		width: 100%;
		top: 0px;
	}

	.page .page-selected {
		position: absolute;
		top: 0px;
		bottom: 0px;
		left: 0px;
		right: 0px;
		background-color: rgba(0,0,0,0.6);
	}
</style>

<script>
	export default {
		data() {
			return {
				pages: []
			};
		},
		props: {
			dataOptions: { type: Object, required: false, default() { return {}; }},
			dataUpload: { type: String, required: true },
			dataName: { type: String, required: true },
			dataSrc: { type: String, required: true },
			dataDelete: { type: String, required: true },
			dataOrder: { type: String, required: true },
			dataCol: { type: Array, required: false, default() { return ['col-md-6']; }}
		},
		methods: {
			successLoad(response) {
				var res = response.data;
				var pages = res.data;
				var that = this;

				this.pages = [];

				if (res.success) {
					pages.forEach(function (value) {
						that.pages.push(value);
					});

					this.pages.sort(function (a, b) {
						if (a.page_num < b.page_num) return -1;
						if (a.page_num > b.page_num) return 1;
						return 0;
					});
				}
			},
			failedLoad(response) {
				console.log(response);
			},
			loadData() {
				this.$http.get(this.dataSrc, {timeout: 15000}).then(this.successLoad, this.failedLoad);
			},
			refresh(data) {
				this.loadData();
			},
			removePage(data) {
				var that = this;
				var body = Object.assign({}, {
					page_num: data.page
				}, this.dataOptions);

				this.$http.delete(this.dataDelete, {
					body: body,
					timeout: 15000
				}).then(function (response) {
					var data = response.data;

					if (data.success) {
						that.loadData();
					}
				}, function (response) {
				});
			},
			movePage(data) {
				var that = this;
				var body = Object.assign({}, {
					page_num: data.page,
					move_order: data.move
				}, this.dataOptions);

				this.$http.post(this.dataOrder, body, {
					timeout: 15000
				}).then(function (response) {
					var data = response.data;

					if (data.success) {
						that.loadData();
					}
				}, function (response) {
				});
			}
		},
		created() {
			this.$catch('upload-complete', this.refresh);
			this.$catch('page-remove', this.removePage);
			this.$catch('page-order', this.movePage);
		},
		mounted() {
			this.loadData();
		}
	}
</script>
