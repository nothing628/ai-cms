<template>
	<div class="block" :class="blockClass">
		<slot></slot>
	</div>
</template>

<script>
	export default {
		data() {
			return {};
		},
		props: {
			dataClass: { type: Array, required: false, default() { return []; }},
			isThemed: { type: Boolean, default: false }
		},
		computed: {
			blockClass() {
				var tmp = this.dataClass.slice(0);

				if (this.isThemed) {
					tmp.push('block-themed');
				}

				return tmp;
			}
		},
		methods: {
			refresh() {
				//
			}
		}
	}
</script>
