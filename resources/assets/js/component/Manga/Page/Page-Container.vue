<template>
	<div :class="dataCol">
		<label>Page Selector:</label>
		<page-upload></page-upload>
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
		border-radius: 0px 0px 3px 3px;
		padding: 15px 10px;
	}

	.page-list .page {
		width: 150px;
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
