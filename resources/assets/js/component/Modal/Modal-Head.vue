<template>
	<div class="block-header bg-primary-dark">
		<ul class="block-options">
			<li>
				<button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
			</li>
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
		}
	}
</script>
