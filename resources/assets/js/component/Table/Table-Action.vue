<template>
	<button v-if="isDelete || isModal" class="btn" :class="dataClass" @click="action"><slot></slot></button>
	<a v-else class="btn" :class="dataClass" :href="link"><slot></slot></a>
</template>

<script>
	export default {
		data() {
			return {};
		},
		props: {
			dataItem: { type: Object, required: true },
			dataKey: { type: String, default: 'id'},
			dataClass: { type: Array, default() { return ['btn-default'];}},
			dataLink: { type: String, default: '{0}'},
			dataMethod: { type: String, default: 'delete' },
			dataTarget: { type: String, default: '' },
			isDelete: { type: Boolean, default: false },
			isModal: { type: Boolean, default: false }
		},
		computed: {
			keyval() {
				if (!this.dataKey in this.dataItem.origin) return '';

				var format = this.dataLink;
				var keyval = this.dataItem.origin[this.dataKey];

				return keyval;
			},
			clearLink() {
				return this.dataLink.replace(/\{0\}/gi,'');
			},
			link() {
				var keyval = this.keyval;
				var linkme = format.format(keyval);

				return linkme;
			},
			methodName() {
				return this.dataMethod.toUpperCase();
			}
		},
		methods: {
			action() {
				if (this.isDelete) {
					this.deleteAct();
				}

				if (this.isModal) {
					this.showModal();
				}
			},
			deleteAct() {
				var params = {};
				params.title = 'Are you sure?';
				params.text = 'You won\'t be able to revert this!'
				params.type = 'warning';
				params.confirmButtonText = 'Yes, delete it!';
				params.onOK = this.deleteOK;
				params.onCancel = this.deleteCancel;

				bus.$emit('confirm-show', params);
			},
			deleteOK() {
				var keyval = this.keyval;
				var obj = {};
				var link = this.clearLink;

				obj[this.dataKey] = keyval;

				switch (this.methodName) {
					case 'DELETE':
						this.$http.delete(link,{
							body: obj,
							timeout: this.dataTimeout
						}).then(this.deleteSuccess, this.deleteFailed);
					break;
					case 'POST':
						this.$http.post(link, {
							body: obj,
							timeout: this.dataTimeout
						}).then(this.deleteSuccess, this.deleteFailed);
					break;
					default:
						console.log('cannot use method \'' + this.dataMethod + '\'');
				}
			},
			deleteCancel(dismiss) { },
			deleteSuccess(response) {
				var res = response.data;

				if (res.success) {
					var title = res.hasOwnProperty('title')?res.title:'Success';
					var text = res.hasOwnProperty('message')?res.message:'Success delete your data';
					var type = res.hasOwnProperty('type')?res.type:'success';

					bus.$emit('alert-show', {title:title, text: text, type: type, timer: 800});
					bus.$emit('refresh');
				}
			},
			deleteFailed(response) {
				var code = response.status.toString();
				var msg = response.statusText;

				bus.$emit('alert-show', {title: code, text: msg, type: 'error'});
				bus.$emit('refresh');
			},
			showModal() {
				//
			}
		}
	}
</script>
