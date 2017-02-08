<template></template>

<script>
	import swal from 'sweetalert2';

	export default {
		data() {
			return {};
		},
		methods: {
			alertShow(opts) {
				swal(opts);
			},
			confirmShow(opts) {
				var data = Object.assign({}, opts, {
					allowEscapeKey: true,
					allowOutsideClick: true,
					showCloseButton: true
				});

				swal(data).then(opts.onOK, opts.Cancel);
			}
		},
		mounted() {
			bus.$on('alert-show', this.alertShow);
			bus.$on('confirm-show', this.confirmShow);
		}
	}
</script>
