<template>
	<div :class="dataClass">
		<a class="img-container ribbon ribbon-modern ribbon-danger ribbon-left" :href="mangaUrl">
			<img :src="thumbUrl" :alt="title" class="img-responsive">
			<div class="ribbon-box" v-if="withRibbon">
				<a href="#" class="ribbon-link"><i class="fa fa-fw fa-ellipsis-h"></i></a>
				<i class="fa fa-fw fa-fire"></i>{{ views }}
			</div>
			<div class="img-overlay text-center">
				<h2 class="rf-title">{{ title }}</h2>
				<div class="rf-info">
					<h4 class="h6 text-muted">
						<b v-if="withCategory">{{ category }}</b>
						<span v-if="withUploader"> By {{ uploader }}</span>
					</h4>
					<div class="rating" v-if="withRating">
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
			mangaUrl: { type: String, default: null },
			thumbUrl: { type: String, default: null },
			title: { type: String, default: null },
			views: { type: String, default: null },
			category: { type: String, default: null },
			uploader: { type: String, default: null },
			dataClass: { type: Array, default() { return ['col-md-2','col-lg-2','col-sm-4','col-xs-6']; }},
			withRibbon: { type: Boolean, default: false },
			withRating: { type: Boolean, default: false },
			withCategory: { type: Boolean, default: false },
			withUploader: { type: Boolean, default: false }
		},
		computed: {
			//
		}
	}
</script>
