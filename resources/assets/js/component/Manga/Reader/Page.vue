<template>
	<img v-if="activePage == null" :src="fallbackImage" class="img-responsive">
	<img v-else :src="activePage.page_url" class="img-responsive">
</template>

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
				//
			}
		},
		created() {
			this.$catch('set-page', this.setPage);
			this.$catch('refresh-page', this.refreshData);
		}
	}
</script>
