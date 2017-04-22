<template>
	<div :class="dataCol">
		<label>Page Selector:</label>
		<div class="page-control">
			<button class="btn btn-success"><i class="fa fa-upload"></i> Test</button>
		</div>
		<div class="page-list">
			<page-data v-for="page in pages" :data-num="page.page_num" :data-src="page.thumb_url" :key="page.id"></page-data>
			<div class="clearfix"></div>
		</div>
	</div>
</template>

<style>
	.page-list {
		min-height: 200px;
		width: 100%;
		border: 1px solid #bbb;
		border-radius: 3px;
		padding: 15px 10px;
	}

	.page-list .page {
		width: 150px;
		float: left;
		position: relative;
		margin-bottom: 15px;
		margin-right: 15px;
	}

	.page span {
		display: block;
		text-align: center;
		background-color: rgba(30,30,30,0.85);
		color: #EEE;
		padding: 5px;
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
</style>

<script>
	export default {
		data() {
			return {
				pages: []
			};
		},
		props: {
			dataSrc: { type: String, required: true },
			dataCol: { type: Array, required: false, default() { return ['col-md-6']; }}
		},
		methods: {
			pageUp() {
				//
			},
			pageDown() {
				//
			},
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
			}
		},
		mounted() {
			this.loadData();
		}
	}
</script>
