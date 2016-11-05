<template>
	<input name="page_num" type="hidden" v-model="page_num">
	<input name="max_page" type="hidden" v-model="max_page">
	<div class="ui mini buttons">
		<button type="button" :disabled="page_num <= 1" @click="prevPage" class="ui icon very basic button"><i class="left angle icon"></i></button>
		<button type="button" :disabled="max_page == 0" class="ui very basic button">1</button>
		<button type="button" :disabled="page_num >= max_page" @click="nextPage" class="ui icon very basic button"><i class="right angle icon"></i></button>
	</div>
</template>

<script>
	module.exports = {
		props: {
			maxPage:	{ required: false, type: Number, default: 0 },
			pageNum:	{ required: false, type: Number, default: 0 }
		},
		data: function () {
			return {
				max_page: 0,
				page_num: 0
			}
		},
		methods: {
			nextPage: function () {
				var that = this;
				if (this.page_num < this.max_page)
					this.page_num++;
				
				this.$nextTick(function () {that.$dispatch('page-changed');});
			},
			prevPage: function () {
				var that = this;
				if (this.page_num > 1)
					this.page_num--;

				this.$nextTick(function () {that.$dispatch('page-changed');});
			}
		},
		events: {
			'change-page': function (data) {
				if (typeof data.page_num != 'undefined' && typeof data.max_page != 'undefined') {
					this.max_page = data.max_page;
					this.page_num = data.page_num;
				}
			}
		},
		ready: function () {
			this.max_page = this.maxPage;
			this.page_num = this.pageNum;
		}
	}
</script>