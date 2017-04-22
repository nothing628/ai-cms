<template>
	<div class="page">
		<div class="page-img">
			<img :src="dataSrc" alt="" class="img-responsive">
		</div>

		<div class="page-overlay">
			<span>Page {{ dataNum }}</span>
			<a class="btn btn-xs btn-default" @click="moveUp"><i class="fa fa-caret-up"></i></a>
			<a class="btn btn-xs btn-default" @click="moveDown"><i class="fa fa-caret-down"></i></a>
			<a class="btn btn-xs btn-danger" @click="remove"><i class="fa fa-trash"></i></a>
			<div class="clearfix"></div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				is_use: true
			};
		},
		props: {
			dataSrc: { type: String, required: true },
			dataNum: { type: Number, required: true },
			isUse: { type: Boolean, default: true }
		},
		methods: {
			toggleUse() {
				this.is_use = !this.is_use;
			},
			moveUp() {
				//
			},
			moveDown() {
				//
			},
			remove() {
				//
			}
		},
		mounted() {
			this.is_use = this.isUse;
		}
	}
</script>
