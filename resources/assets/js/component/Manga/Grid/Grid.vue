<template>
	<div class="block-content row items-push-10 bg-white bc-xs">
		<manga-grid-content v-for="item in items" :item="item"></manga-grid-content>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				items: []
			};
		},
		props: {
			dataSource: { type: String, required: true },
			dataOptions: { type: Object, required: false, default() { return {}; } },
			dataMethod: { type: String, required: false, default: 'get' },
			dataTimeout: { type: Number, required: false, default: 15000 }
		},
		computed: {
			methodName() {
				return this.dataMethod.toUpperCase();
			}
		},
		methods: {
			refreshGrid() {
				switch (this.methodName) {
					case 'POST':
						this.$http.post(this.dataSource, this.dataOptions, {
							timeout: this.dataTimeout,
							emulateJSON: true
						}).then(this.onSuccess, this.onFailed);
					break;
					case 'GET':
						this.$http.get(this.dataSource, {
							params: this.dataOptions,
							timeout: this.dataTimeout
						}).then(this.onSuccess, this.onFailed);
					break;
				}
			},
			onSuccess(response) {
				var data = response.data;
				var that = this;

				this.items = [];

				data.data.forEach(function (value) {
					that.items.push(value);
				});
			},
			onFailed(response) {
				console.log(response);
			}
		},
		mounted() {
			this.refreshGrid();
		}
	}
</script>
