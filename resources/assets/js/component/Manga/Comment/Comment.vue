<template>
	<div class="media push-15" >
		<div class="media-left">
			<a href="javascript:void(0)">
				<img class="img-avatar img-avatar32" :src="comment.avatar" alt="">
			</a>
		</div>
		<div class="media-body font-s13">
			<a class="font-w600" href="javascript:void(0)">{{ comment.username }}</a>
			<div class="push-5">{{ comment.comment }}</div>
			<div class="font-s12">
				<!-- <a href="javascript:void(0)">Like!</a> - -->
				<!-- <a href="javascript:void(0)">Reply</a> - -->
				<span class="text-muted"><em>{{ comment.comment_date }}</em></span>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				comment: {}
			};
		},
		props: {
			dataComment: { type: Object, required: true }
		},
		mounted() {
			this.comment = this.dataComment;
		}
	}
</script>
