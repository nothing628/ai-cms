<template>
	<div class="dataTables_info">
		Showing <strong>{{ from }}</strong>-<strong>{{ to }}</strong> of <strong>{{ total }}</strong>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				from: 0,
				to: 0,
				total: 0
			}
		},
		props: {
			dataFrom: { type: Number, required: false, default: 0 },
			dataTo: { type: Number, required: false, default: 0 },
			dataTotal: { type: Number, required: false, default: 0 },
			dataName: { type: String, required: true }
		},
		methods: {
			changeState(state) {
				if (state.name == this.dataName) {
					this.from = state.from;
					this.to = state.to;
					this.total = state.total;
				}
			}
		},
		created() {
			//binding event
			bus.$on('record-state', this.changeState);
		},
		mounted() {
			this.from = this.dataFrom;
			this.to = this.dataTo;
			this.total = this.dataTotal;
		}
	}
</script>
