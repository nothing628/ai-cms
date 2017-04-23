<template>
	<div class="page">
		<div class="page-img" @click="toggleSelected">
			<img :src="dataPage.thumb_url" class="img-responsive">
		</div>

		<div class="page-overlay">
			<span>Page {{ dataPage.page_num }}</span>
			<a class="btn btn-xs btn-default" @click="moveUp"><i class="fa fa-caret-up"></i></a>
			<a class="btn btn-xs btn-default" @click="moveDown"><i class="fa fa-caret-down"></i></a>
			<a class="btn btn-xs btn-danger" @click="remove"><i class="fa fa-trash"></i></a>
			<div class="clearfix"></div>
		</div>

		<div class="page-selected" v-if="is_selected" @click="toggleSelected"></div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				is_selected: false
			};
		},
		props: {
			dataPage: { type: Object, required: true }
		},
		computed: {},
		methods: {
			toggleSelected() {
				this.is_selected = !this.is_selected;
			},
			moveUp() {
				this.$dispatch('page-order', { page: this.dataPage.page_num, move: -1 });
			},
			moveDown() {
				this.$dispatch('page-order', { page: this.dataPage.page_num, move: 1 });
			},
			remove() {
				this.$dispatch('page-remove', { page: this.dataPage.page_num });
			}
		},
		mounted() {
		}
	}
</script>
