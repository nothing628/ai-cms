<template>
	<div class="btn-group btn-group-xs">
		<a data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
		<a data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Edit"><i class="fa fa-pencil text-primary"></i></a>
		<a data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times text-danger"></i></a>
	</div>
</template>

<script>
	export default {
		data() {
			return {};
		},
		props: {
			dataItem: { type: Array, required: true }
		}
	}
</script>
