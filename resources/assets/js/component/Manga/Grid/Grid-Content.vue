<template>
	<div class="col-md-20p col-xl-2 col-sm-4 col-xs-6">
		<a class="img-container ribbon ribbon-modern ribbon-danger ribbon-left border" :href="item.manga_url">
			<img :src="item.thumb_url" :alt="item.title" class="img-responsive">
			<div class="ribbon-box">
				<a href="#" class="ribbon-link"><i class="fa fa-fw fa-ellipsis-h"></i></a>
				<i class="fa fa-fw fa-fire"></i>{{ item.views }}
			</div>
			<div class="img-overlay text-center">
				<h2 class="rf-title">{{ item.title }}</h2>
				<div class="rf-info">
					<h4 class="h6 text-muted">
						<b>{{ item.category.category }}</b> By {{ item.user.username }}
					</h4>
					<div class="rating">
						<i class="fa fa-star text-warning"></i>
						<i class="fa fa-star text-warning"></i>
						<i class="fa fa-star text-warning"></i>
						<i class="fa fa-star text-warning"></i>
						<i class="fa fa-star text-gray"></i>
					</div>
				</div>
			</div>
		</a>
	</div>
</template>

<script>
	export default {
		data() {
			return {};
		},
		props: {
			item: { type: Object, required: true }
		}
	}
</script>
