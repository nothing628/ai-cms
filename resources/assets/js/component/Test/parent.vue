<template>
	<div class="parent">
		<h2>{{ counter }}</h2>
		<button @click="increment">Add</button>
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
				tmp[this.parentName] = this.counter;
				this.$children[0].mutateData(tmp);
			}
		}
	}
</script>
