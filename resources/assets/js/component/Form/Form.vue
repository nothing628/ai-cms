<template>
	<form enctype="multipart/form-data"
	:action="dataAction"
	:class="dataClass" :method = "dataMethod" @submit.stop.prevent="submit" :id="dataName">
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
			dataName: { type: String, required: false, default: '' },
			dataAction: { type: String, required: false, default: '' }
		},
		computed: {
			selectorName() {
				return '#' + this.dataName;
			},
			methodName() {
				return this.dataMethod.toUpperCase();
			}
		},
		methods: {
			submit() {
				//Handle Submit Here
				switch (this.methodName) {
					case 'POST':

					break;
					case 'GET':

					break;
					case 'DELETE':

					break;
					case 'PUT':
					case 'PATCH':

					break;
				}
				console.log("test");
			},
			formSubmit(target) {
				if (this.dataName == target) {
					//Need to submit
					this.submit();
				}
			}
		},
		mounted() {
			bus.$on('form-submit', this.formSubmit);
		}
	}
</script>
