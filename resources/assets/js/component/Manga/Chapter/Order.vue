<template>
	<div class="btn-group btn-group-sm">
		<button class="btn btn-default" @click="move('last')"><i class="fa fa-angle-double-left"></i></button>
		<button class="btn btn-default" @click="move('next')"><i class="fa fa-angle-left"></i></button>
		<button class="btn btn-default" @click="move('prev')"><i class="fa fa-angle-right"></i></button>
		<button class="btn btn-default" @click="move('first')"><i class="fa fa-angle-double-right"></i></button>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				//
			};
		},
		props: {
			dataItem: { type: Object, required: true },
			dataLink: { type: String, default: null, required: true }
		},
		methods: {
			move(pos) {
				var that = this;
				var data = {
					position: pos,
					chapter: this.dataItem.origin
				};

				this.$http.post(this.dataLink, data, {
					timeout: this.dataTimeout,
					emulateJSON: true
				}).then(this.onSuccess, this.onFailed);
			},
			onFailed(response) {
				bus.$emit('refresh');
			},
			onSuccess(response) {
				bus.$emit('refresh');
			}
		}
	}
</script>
