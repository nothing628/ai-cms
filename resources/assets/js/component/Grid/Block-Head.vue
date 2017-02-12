<template>
	<div class="block-header" :class="dataClass">
		<ul class="block-options" v-if="withOptions">
			<li><button type="button" data-toggle="block-option" data-action="refresh_toggle"><i class="si si-refresh"></i></button></li>
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
			withOptions: { type: Boolean, default: false }
		}
	}
</script>
