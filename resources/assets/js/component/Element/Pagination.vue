<template>
	<ul class="pagination" :class="dataClass">
		<li v-if="dataShowNextPrev" :class="{'disabled': disabledFirst}"><a class="with-cursor" @click="goFirst"><i class="fa fa-angle-double-left"></i></a></li>
		<li v-if="dataShowNextPrev" :class="{'disabled': disabledFirst}"><a class="with-cursor" @click="goPrev"><i class="fa fa-angle-left"></i></a></li>
		<li v-for="i in pageRender" :class="{'active':((i+startPage-1)==page)}">
			<a class="with-cursor" @click="changePage(i+startPage-1)">{{ i+startPage-1 }}</a>
		</li>
		<li v-if="dataShowNextPrev" :class="{'disabled': disabledEnd}"><a class="with-cursor" @click="goNext"><i class="fa fa-angle-right"></i></a></li>
		<li v-if="dataShowNextPrev" :class="{'disabled': disabledEnd}"><a class="with-cursor" @click="goEnd"><i class="fa fa-angle-double-right"></i></a></li>
	</ul>
</template>

<style type="text/css">
	.with-cursor {
		cursor: pointer;
	}
</style>

<script>
	export default {
		data() {
			return {
				maxPage: 0,
				page: 0,
				pagePerView: 0
			};
		},
		props: {
			dataClass: { type: Array, required: false, default() { return ['pagination-sm']; } },
			dataName: { type: String, required: true },
			dataMaxPage: { type: Number, required: false, default: 1 },
			dataPageView: { type: Number, required: false, default: 5, validator(value) { return value >= 3 && value % 2 == 1; } },
			dataPage: { type: Number, required: false, default: 1 },
			dataShowNextPrev: { type: Boolean, required: false, default: true }
		},
		computed: {
			pageRender() {
				return this.endPage - this.startPage + 1;
			},
			pageShift() {
				return (this.pagePerView - 1) / 2;
			},
			startPage() {
				var start = this.page - this.pageShift;

				if (start > this.maxPage - this.pagePerView) {
					start = this.maxPage - this.pagePerView + 1;
				}

				if (start < 1) {
					start = 1;
				}

				return start;
			},
			endPage() {
				var end = this.page + this.pageShift;

				if (end < this.pagePerView) {
					end = this.pagePerView;
				}

				if (end > this.maxPage) {
					end = this.maxPage;
				}

				return end;
			},
			disabledFirst() {
				return this.page == 1;
			},
			disabledEnd() {
				return this.page == this.maxPage;
			}
		},
		methods: {
			changePage(i) {
				this.page = i;
			},
			goFirst() {
				this.page = 1;
			},
			goEnd() {
				this.page = this.maxPage;
			},
			goNext() {
				if (this.page + 1 > this.maxPage) return;

				this.page++;
			},
			goPrev() {
				if (this.page - 1 < 1) return;

				this.page--;
			},
			'event-page': function(data) {
				if (typeof data == 'undefined' || !("name" in data) || !("page" in data)) return;

				if (data.name == this.dataName) {
					this.changePage(data.page);
				}
			},
			'event-max-page': function(data) {
				if (typeof data == 'undefined' || !("name" in data) || !("page" in data)) return;

				if (data.name == this.dataName) {
					this.maxPage = data.page;
				}
			},
			'event-next': function(data) {
				if (typeof data == 'undefined' || !"name" in data) return;

				if (data.name == this.dataName) {
					this.goNext();
				}
			},
			'event-prev': function(data) {
				if (typeof data == 'undefined' || !"name" in data) return;

				if (data.name == this.dataName) {
					this.goPrev();
				}
			},
			'event-first': function(data) {
				if (typeof data == 'undefined' || !"name" in data) return;

				if (data.name == this.dataName) {
					this.goFirst();
				}
			},
			'event-end': function (data) {
				if (typeof data == 'undefined' || !"name" in data) return;

				if (data.name == this.dataName) {
					this.goEnd();
				}
			}
		},
		created() {
			bus.$on('pagination-page', this['event-page']);
			bus.$on('pagination-next', this['event-next']);
			bus.$on('pagination-prev', this['event-prev']);
			bus.$on('pagination-first', this['event-first']);
			bus.$on('pagination-end', this['event-end']);
			bus.$on('pagination-max-page', this['event-max-page']);
		},
		mounted() {
			this.pagePerView = this.dataPageView;
			this.maxPage = this.dataMaxPage;
			this.page = this.dataPage;
		}
	}
</script>
