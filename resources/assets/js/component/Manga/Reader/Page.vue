<template>
	<div class="block-content block-content-mini comp-page-container">
		<img v-if="activePage == null" :src="fallbackImage" id="mainimage" class="img-responsive">
		<img v-else id="mainimage" @load="onLoad" @error="onError" class="img-responsive">

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
				current_page: 1,
				is_loading: false,
				data_image: null
			};
		},
		props: {
			dataControl: { type: String, default: '' },
			fallbackImage: { type: String, default: '' }
		},
		watch: {
			is_loading(value, old) {
				this.$dispatch('loading', {state: this.is_loading});
			},
			pageUrl(value, old) {
				this.is_loading = true;
				this.changeUrl();
			}
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
			},
			pageUrl() {
				return (this.activePage != null)?this.activePage.page_url:null;
			}
		},
		methods: {
			changeUrl() {
				var downloadingImage = new Image();
				var img = document.querySelector('#mainimage');
				var that = this;

				downloadingImage.onload = function(){
					that.is_loading = false;
					img.src = this.src;
				};

				downloadingImage.src = this.pageUrl;
			},
			onError(e) {
				// this.is_loading = false;
			},
			onLoad(e) {
				// this.is_loading = false;
			},
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
				this.$dispatch('next-page', {name: this.dataControl });
			},
			prevPage() {
				this.$dispatch('prev-page', {name: this.dataControl });
			}
		},
		created() {
			this.$catch('set-page', this.setPage);
			this.$catch('refresh-page', this.refreshData);
		}
	}
</script>
