<template>
	<div class="block-header" :class="dataClass">
		<ul class="block-options" v-show="isShow">
			<li v-if="withRefresh"><button type="button" data-toggle="block-option" data-action="refresh_toggle"><i class="si si-refresh"></i></button></li>
			<li v-if="withContent"><button type="button" data-toggle="block-option" data-action="content_toggle"><i class="si si-refresh"></i></button></li>
			<li v-if="withFullscreen"><button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-refresh"></i></button></li>
		</ul>
		<h3 class="block-title">
			<slot></slot>
		</h3>
	</div>
</template>

<script>
	export default {
		data() {
			return {};
		},
		props: {
			dataClass: { type: Array, required: false, default() { return []; } },
			withRefresh: { type: Boolean, default: false },
			withContent: { type: Boolean, default: false },
			withFullscreen: { type: Boolean, default: false }
		},
		computed: {
			isShow() {
				return (this.withContent || this.withFullscreen || this.withRefresh);
			}
		}
	}
</script>
