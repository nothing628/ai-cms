<template>
	<thead>
		<tr>
			<th v-for="column in columns" :class="column.class">{{ column.value }}</th>
		</tr>
	</thead>
</template>

<script>
	export default {
		data() {
			return {};
		},
		props: {
			dataColumn: { type: Array, required: true }
		},
		computed: {
			columns() {
				var mapcol = this.dataColumn.map(function (val) {
					if (typeof val == 'string') {
						return { class: [], value: val};
					} else {
						return val;
					}
				});

				return mapcol;
			}
		}
	}
</script>
