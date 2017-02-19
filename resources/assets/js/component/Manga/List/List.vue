<template>
	<ul class="nav-users">
		<li class="js-lts-grp ribbon ribbon-modern ribbon-primary ribbon-right" v-for="m in 4">
			<slot :item="m"></slot>
		</li>
	</ul>
</template>

<script>
	export default {
		data() {
			return {};
		}
	}
</script>
