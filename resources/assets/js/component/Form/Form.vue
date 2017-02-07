<template>
	<form enctype="multipart/form-data" :class="dataClass" :method = "dataMethod" @submit.prevent="submit" :id="dataName">
		<slot></slot>
	</form>
</template>

<script>
	export default {
		data() {
			return {
				//
			};
		},
		props: {
			dataClass: { type: Array, required: false, default() {return ['form-horizontal']}},
			dataMethod: { type: String, required: false, default: 'POST' },
			dataName: { type: String, required: false, default: '' }
		},
		computed: {
			selectorName() {
				return '#' + this.dataName;
			}
		},
		methods: {
			submit(e) {
				//Handle Submit Here
				console.log(e);
			},
			formSubmit(target) {
				if (this.dataName == target) {
					//Need to submit
					$(this.selectorName).submit();
				}
			}
		},
		mounted() {
			bus.$on('form-submit', this.formSubmit);
		}
	}
</script>
