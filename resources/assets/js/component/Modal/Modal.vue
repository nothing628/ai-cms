<template>
	<div class="modal" :class="effect" :id="dataName" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" :class="dataClass">
            <div class="modal-content">
                <div class="block block-themed block-transparent remove-margin-b">
                    <slot></slot>
                </div>
                <slot name="footer"></slot>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
		data() {
			return {};
		},
		props: {
			dataClass: { type: Array, required: false, default() { return []; } },
			dataName: { type: String, required: true },
			isFade: { type: Boolean, required: false, default: false }
		},
		computed: {
			nameSelect() {
				return '#' + this.dataName;
			},
			effect() {
				if (this.isFade) {
					return ['fade'];
				}

				return [];
			},
			shownPosition() {
				var dataEffect = [
					'modal-dialog-top',
					'modal-dialog-popin',
					'modal-dialog-popout',
					'modal-dialog-slideup',
					'modal-dialog-slideright',
					'modal-dialog-slideleft',
					'modal-dialog-fromright',
					'modal-dialog-fromleft'
				];

				var dataSize = [
					'modal-lg',
					'modal-sm'
				];

				return [dataEffect, dataSize];
			}
		},
		methods: {
			showModal(target) {
				if (this.dataName == target) {
					$(this.nameSelect).modal('show');
				}
			},
			hideModal(target) {
				if (this.dataName == target) {
					$(this.nameSelect).modal('hide');
				}
			},
			toggleModal(target) {
				if (this.dataName == target) {
					$(this.nameSelect).modal('toggle');
				}
			}
		},
		mounted() {
			bus.$on('show-modal', this.showModal);
			bus.$on('hide-modal', this.hideModal);
			bus.$on('toggle-modal', this.toggleModal);
		}
	}
</script>
