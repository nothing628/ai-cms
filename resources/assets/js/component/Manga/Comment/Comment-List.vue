<template>
	<div>
		<comment v-for="comment in comments"></comment>
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
			dataID: { type: String, required: true }
		},
		methods: {
			parseComments(response) {
				//
			},
			refresh() {
				this.$http.post(
					this.dataSrc,
					{},
					{}
				).then(this.parseComments, (response) => {});
			}
		},
		created() {
			//
		},
		mounted() {
			this.refresh();
		}
	}
</script>
