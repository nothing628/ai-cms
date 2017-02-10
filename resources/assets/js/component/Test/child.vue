<template>
	<button @click="dispatch">Dispatch</button>
</template>

<script>
	export default {
		data() {
			return {
				counter: 0
			}
		},
		props: ['dataName'],
		methods: {
			mutateData(data) {
				if (data.hasOwnProperty(this.dataName)) {
					this.counter = data[this.dataName];
				}
			},
			dispatch() {
				this.$dispatch('notify-parent', {data: 200});
			}
		},
		mounted() {
			this.$catch('notify-child', function (data) {
				console.log('notify child success', data);
			});
		}
	}
</script>
