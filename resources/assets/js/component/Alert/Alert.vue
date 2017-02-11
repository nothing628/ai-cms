<template></template>

<script>
	import swal from 'sweetalert2';

	export default {
		data() {
			return {};
		},
		methods: {
			alertShow(opts) {
				swal(opts).catch(swal.noop);
			},
			confirmShow(opts) {
				var data = Object.assign({}, opts, {
					allowEscapeKey: true,
					allowOutsideClick: true,
					showCloseButton: true,
					showCancelButton: true
				});

				delete data['onOK'];
				delete data['onCancel'];

				swal(data).then(opts.onOK, opts.onCancel);
			}
		},
		created() {
			bus.$on('alert-show', this.alertShow);
			bus.$on('confirm-show', this.confirmShow);
		}
	}
</script>
