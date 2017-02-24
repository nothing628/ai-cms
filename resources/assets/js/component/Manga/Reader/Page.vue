<template>
	<div class="comp-page-container">
		<img v-if="activePage == null" :src="fallbackImage" id="mainimage" class="img-responsive">
		<img v-else :src="activePage.page_url" id="mainimage" class="img-responsive">

		<div class="overlay">
			<div @click="prevPage"></div>
			<div @click="nextPage"></div>
		</div>
	</div>
</template>

<style type="text/css">
	.comp-page-container {
		position: relative;
	}

	.comp-page-container .overlay {
		position: absolute;
		top: 0;
		left: 0;
		bottom: 0;
		right: 0;
	}

	.comp-page-container .overlay > div {
		height: 100%;
		width: 50%;
		float: left;
	}
</style>

<script>
	export default {
		data() {
			return {
				chapters: [],
				current_chapter: 1,
				current_page: 1
			};
		},
		props: {
			fallbackImage: { type: String, default: '' }
		},
		computed: {
			activeChapter() {
				var that = this;
				var result = this.chapters.filter(function (value) {
					return (value.chapter_num == that.current_chapter);
				});

				if (result.length > 0) {
					return result[0];
				} else {
					return null;
				}
			},
			activePage() {
				var that = this;
				var activeChapter = this.activeChapter;

				if (activeChapter == null) {
					return null;
				}

				var result = activeChapter.pages.filter(function (value) {
					return (value.page_num == that.current_page);
				});

				if (result.length > 0) {
					return result[0];
				} else {
					return null;
				}
			}
		},
		methods: {
			refreshData(data) {
				var that = this;

				this.current_chapter = data.chapter_num;
				this.current_page = data.page_num;
				this.chapters = [];

				data.chapters.forEach(function (value, index) {
					that.chapters.push(value);
				});
			},
			setPage(data) {
				if (this.current_chapter < data.chapter || this.current_page < data.page) {
					//scroll top
					this.scrollTop();
				} else {
					//scroll down
					this.scrollDown();
				}

				this.current_page = data.page;
				this.current_chapter = data.chapter;
			},
			scrollDown() {
				this.$nextTick(function () {
					var inner = window.innerHeight;
					var height = $('#mainimage').height();
					var offset = $('#mainimage').offset().top;
					var scrollY = offset + height - inner;

					$('html, body').animate({
						scrollTop: scrollY
					}, 200);
				});
			},
			scrollTop() {
				this.$nextTick(function () {
					$('html, body').animate({
						scrollTop: $("#mainimage").offset().top
					}, 200);
				});
			},
			nextPage() {
				this.$dispatch('next-page');
			},
			prevPage() {
				this.$dispatch('prev-page');
			}
		},
		created() {
			this.$catch('set-page', this.setPage);
			this.$catch('refresh-page', this.refreshData);
		}
	}
</script>
