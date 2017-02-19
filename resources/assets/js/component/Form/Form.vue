<template>
	<form :enctype="dataEnctype"
	:action="actionUrl"
	:class="dataClass" :method = "dataMethod" @submit.stop.prevent="submit" :id="dataName">
		<button type="submit" style="display: none;"></button>
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
			dataAction: { type: String, required: false, default: '' },
			dataTimeout: { type: Number, required: false, default: 15000 },
			dataEnctype: { type: String, required: false, default: 'application/x-www-form-urlencoded' },
			isFollowRedirect: { type: Boolean, default: true },
			isRaw: { type: Boolean, default: false }
			//application/x-www-form-urlencoded
			//multipart/form-data
		},
		computed: {
			actionUrl() {
				if (this.dataAction == '') {
					return window.location.href;
				}

				return this.dataAction;
			},
			selectorName() {
				return '#' + this.dataName;
			},
			methodName() {
				return this.dataMethod.toUpperCase();
			}
		},
		methods: {
			formData() {
				var form = document.forms[this.dataName];
				var formData = new FormData(form);

				return formData;
			},
			formObject() {
				var formData = this.formData();
				var emp = {};

				formData.forEach(function (value, key) {
					emp[key] = value;
				});

				return emp;
			},
			onSuccess(response) {
				var res = response.data;
				var redirect_url = ('redirect_url' in res)?res.redirect_url:'';

				this.$dispatch('block-loading', false);
				if (res.success) {
					bus.$emit('hide-modal', '');
					bus.$emit('refresh');
					bus.$emit('input-clear');
				}

				var title = res.hasOwnProperty('title')?res.title:'Success';
				var text = res.hasOwnProperty('message')?res.message:'Success save your data';
				var type = res.hasOwnProperty('type')?res.type:'success';

				bus.$emit('alert-show', {title:title, text: text, type: type, timer: 800});

				if (this.isFollowRedirect && redirect_url != '') {
					window.location = redirect_url;
				}
			},
			onFailed(response) {
				var code = response.status.toString();
				var msg = response.statusText;

				this.$dispatch('block-loading', false);
				bus.$emit('hide-modal', '');
				bus.$emit('alert-show', {title: code, text: msg, type: 'error'});
				bus.$emit('refresh');
			},
			submit(e) {
				//Handle Submit Here
				var formData = {};

				if (this.isRaw) {
					document.forms[this.dataName].submit();
					return;
				}

				this.$dispatch('block-loading', true);
				if (this.dataEnctype == 'multipart/form-data') {
					formData = this.formData();
				} else {
					formData = this.formObject();
				}

				switch (this.methodName) {
					case 'POST':
						this.$http.post(this.actionUrl, formData, {
							timeout: this.dataTimeout,
							emulateJSON: true
						}).then(this.onSuccess, this.onFailed);
					break;
					case 'GET':
						this.$http.get(this.actionUrl, {
							body: formData,
							timeout: this.dataTimeout
						}).then(this.onSuccess, this.onFailed);
					break;
					case 'DELETE':
						this.$http.delete(this.actionUrl, {
							body: formData,
							timeout: this.dataTimeout
						}).then(this.onSuccess, this.onFailed);
					break;
					case 'PUT':
						this.$http.put(this.actionUrl, formData, {
							timeout: this.dataTimeout
						}).then(this.onSuccess, this.onFailed);
					break;
					case 'PATCH':
						this.$http.patch(this.actionUrl, formData, {
							timeout: this.dataTimeout
						}).then(this.onSuccess, this.onFailed);
					break;
				}
			},
			formSubmit(target) {
				if (this.dataName == target) {
					//Need to submit
					//this.submit();
					document.querySelector('#' + this.dataName +' > button').click();
				}
			}
		},
		created() {
			bus.$on('form-submit', this.formSubmit);
		}
	}
</script>
