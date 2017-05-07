<template>
	<div>
		<manga-comment-data v-for="comment in comments" :data-comment="comment"></manga-comment-data>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				comments: []
			};
		},
		props: {
			dataSrc: { type: String, required: true },
			dataId: { type: String, required: true }
		},
		methods: {
			parseComments(response) {
				var data = response.data;
				var that = this;

				if (Array.isArray(data)) {
					this.comments = [];

					data.forEach(function (value) {
						that.comments.push(value);
					});
				}
			},
			refresh() {
				this.$http.post(
					this.dataSrc,
					{ id: this.dataId },
					{ timeout: 15000 }
				).then(this.parseComments, (response) => {});
			}
		},
		created() {
			this.$catch('refresh', this.refresh);
			bus.$on('refresh', this.refresh);
		},
		mounted() {
			this.refresh();
		}
	}
</script>
