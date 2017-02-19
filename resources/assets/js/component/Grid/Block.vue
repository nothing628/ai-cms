<template>
	<div class="block" :class="blockClass" v-show="! is_hide">
		<slot></slot>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				is_loading: false,
				is_fullscreen: false,
				is_hide: false,
				is_hide_content: false
			};
		},
		props: {
			dataClass: { type: Array, required: false, default() { return []; }},
			dataName: { type: String, default: '' },
			isThemed: { type: Boolean, default: false }
		},
		computed: {
			blockClass() {
				var tmp = this.dataClass.slice(0);

				if (this.isThemed) {
					tmp.push('block-themed');
				}

				if (this.is_loading) {
					tmp.push('block-opt-refresh');
				}

				if (this.is_fullscreen) {
					tmp.push('block-opt-fullscreen');
				}

				if (this.is_hide_content) {
					tmp.push('block-opt-hidden');
				}

				return tmp;
			}
		},
		methods: {
			loading(state) {
				this.is_loading = state;
			},
			fullscreen(state) {
				this.is_fullscreen = state;
			},
			hidecontent(state) {
				this.is_hide_content = state;
			},
			toggleLoading(data) {
				if (data.name == this.dataName && this.dataName != '') {
					this.is_loading = data.state;
				}
			},
			toggleFullscreen(data) {
				if (data.name == this.dataName && this.dataName != '') {
					this.is_fullscreen = data.state;
				}
			},
			toggleHide(data) {
				if (data.name == this.dataName && this.dataName != '') {
					this.is_hide_content = data.state;
				}
			}
		},
		created() {
			this.$catch('block-loading', this.loading);
			this.$catch('block-fullscreen', this.fullscreen);
			this.$catch('block-hide', this.hidecontent);
			this.$on('block-loading', this.toggleLoading);
			this.$on('block-fullscreen', this.toggleFullscreen);
			this.$on('block-hide', this.toggleHide);
		}
	}
</script>
