<template>
	<span>{{ counter }}</span>
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
			}
		}
	}
</script>
