<template>
	<div class="row" id="control">
		<div class="col-md-12">
			<nav>
				<ul class="pager">
					<li class="previous">
						<a data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
					</li>
					<li class="next">
						<a data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
					</li>
				</ul>
			</nav>
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
		},
		mounted() {
			//
		}
	}
</script>
