<template>
	<table class="table table-hover" :class="dataClass">
		<slot></slot>
	</table>
</template>

<script>
	export default {
		data() {
			return {};
		},
		props: {
			dataClass: { type: Array, required: false, default() { return []; } },
			dataTarget: { type: String, required: false, default: '' },
			dataName: { type: String, required: false, default: '' }
		},
		methods: {
			refresh() {
				this.$broadcast('refresh');
			},
			changePage(data) {
				if (this.dataName == data.name) {
					this.$broadcast('change-page', data.page);
				}
			},
			'pagination-max-page': function (data) {
				var merge = Object.assign({name: this.dataTarget}, data);

				if (this.dataTarget != '') {
					bus.$emit('pagination-max-page', merge)
				}
			},
			'pagination-page': function (data) {
				var merge = Object.assign({name: this.dataTarget}, data);

				if (this.dataTarget != '') {
					bus.$emit('pagination-page', merge)
				}
			},
			'record-state': function (data) {
				var merge = Object.assign({name: this.dataTarget}, data);

				if (this.dataTarget != '') {
					bus.$emit('record-state', merge)
				}
			}
		},
		created() {
			bus.$on('refresh', this.refresh);
			bus.$on('change-page', this.changePage);
			this.$catch('pagination-max-page', this['pagination-max-page']);
			this.$catch('pagination-page', this['pagination-page']);
			this.$catch('record-state', this['record-state'])
		}
	}
</script>
