<template>
	<div class="block-header bg-primary-dark">
		<ul class="block-options">
			<li>
				<button @click="prevPage" type="button">
					<i class="fa fa-angle-left"></i>
				</button>
			</li>
			<li><button>{{ current_page }} / {{ totalPages }}</button></li>
			<li>
				<button @click="nextPage" type="button">
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
				<button @click="prevChapter" type="button">
					<i class="fa fa-angle-left"></i>
				</button>
			</li>
			<li>
				<button v-if="activeChapter!=null">
					{{ activeChapter.chapter_title }}
				</button>
			</li>
			<li>
				<button @click="nextChapter" type="button">
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
			},
			totalChapter() {
				return this.chapters.length;
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
			broadcastEvent() {
				var data = {
					page: this.current_page,
					chapter: this.current_chapter
				};

				this.$dispatch('set-page', data);
			},
			setPage(data) {
				this.current_page = data.page;
				this.current_chapter = data.chapter;
			},
			nextChapter() {
				if (this.current_chapter + 1 > this.totalChapter) {
					return;
				}

				this.current_page = 1;
				this.current_chapter++;
				this.broadcastEvent();
			},
			prevChapter() {
				if (this.current_chapter - 1 <= 0 ) {
					return;
				}

				this.current_chapter--;
				this.current_page = this.totalPages;
				this.broadcastEvent();
			},
			nextPage() {
				if (this.current_page + 1 > this.totalPages) {
					this.nextChapter();
					return;
				}

				this.current_page++;
				this.broadcastEvent();
			},
			prevPage() {
				if (this.current_page - 1 <= 0) {
					this.prevChapter();
					return;
				}

				this.current_page--;
				this.broadcastEvent();
			},
			handleKey(e) {
				switch(e.keyCode) {
					case 37:
						this.prevPage();
						break;
					case 39:
						this.nextPage();
						break;
				}
			}
		},
		created() {
			this.$catch('set-page', this.setPage);
			this.$catch('refresh-page', this.refreshData);
		},
		mounted() {
			if (typeof (document.onkeydown) == 'object' && document.onkeydown == null) {
				document.onkeydown = this.handleKey;
			}
		}
	}
</script>
