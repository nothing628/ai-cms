<template>
	<div class="parent">
		<button @click="broadcast">Broadcast</button>
		<slot></slot>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				counter: 0
			}
		},
		props: ['parentName'],
		methods: {
			increment() {
				this.counter++;

				var tmp = {};
				this.$broadcast('test', {data:1});
				tmp[this.parentName] = this.counter;
				this.$children[0].mutateData(tmp);
			},
			broadcast() {
				this.$broadcast('notify-child', {data: 12})
			}
		},
		mounted() {
			this.$catch('notify-parent', function (data) {
				console.log('notify parent success', data);
			});
		}
	}
</script>
