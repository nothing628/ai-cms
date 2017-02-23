<template>
	<div class="row" id="mainimage">
		<div class="col-md-12">
			<a>
				<img src="" class="img-responsive">
			</a>
			<select class="form-control">
				<option v-for="chapter in chapters" :value="chapter.chapter_num">{{ chapter.chapter_title }}</option>
			</select>
			<select class="form-control" v-if="activeChapter!=null">
				<option v-for="page in activeChapter.pages" :value="page.page_num">{{ page.page_num }}</option>
			</select>
		</div>
	</div>
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
			}
		},
		created() {
			this.$catch('refresh-page', this.refreshData);
		}
	}
</script>
