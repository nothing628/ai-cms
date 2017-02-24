<template>
	<div class="block-header bg-primary-dark">
		<ul class="block-options">
			<li>
				<button type="button" data-toggle="tooltip" title="Previous">
					<i class="fa fa-angle-left"></i>
				</button>
			</li>
			<li><button>{{ current_page }} / {{ totalPages }}</button></li>
			<li>
				<button type="button" data-toggle="tooltip" title="Next">
					<i class="fa fa-angle-right"></i>
				</button>
			</li>
			<li>
				<button type="button" data-toggle="block-option" data-action="fullscreen_toggle">
					<i class="si si-size-fullscreen"></i>
				</button>
			</li>
		</ul>
		<ul class="block-options pull-left">
			<li>
				<button type="button" data-toggle="tooltip" title="Previous">
					<i class="fa fa-angle-left"></i>
				</button>
			</li>
			<li>
				<button v-if="activeChapter!=null">
					{{ activeChapter.chapter_title }}
				</button>
			</li>
			<li>
				<button type="button" data-toggle="tooltip" title="Next">
					<i class="fa fa-angle-right"></i>
				</button>
			</li>
		</ul>
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
			},
			totalPages() {
				var that = this;
				var activeChapter = this.activeChapter;

				if (activeChapter == null) {
					return 0;
				} else {
					return activeChapter.pages.length;
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
		},
		mounted() {
			//
		}
	}
</script>
