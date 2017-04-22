<template>
	<div class="page">
		<div class="page-img">
			<img :src="dataSrc" alt="" class="img-responsive">
		</div>

		<span>Page {{ dataNum }}</span>
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
			}
		},
		mounted() {
			this.is_use = this.isUse;
		}
	}
</script>
