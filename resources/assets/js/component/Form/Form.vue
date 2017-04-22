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
				showModal: false		//Show modal after getting data?
			};
		},
		props: {
			dataClass: { type: Array, required: false, default() {return ['form-horizontal']}},
			dataMethod: { type: String, required: false, default: 'POST' },
			dataName: { type: String, required: true },
			dataAction: { type: String, required: false, default: '' },
			dataGet: { type: String, required: false, default: '' },
			dataTimeout: { type: Number, required: false, default: 15000 },
			dataEnctype: { type: String, required: false, default: 'application/x-www-form-urlencoded' },
			isFollowRedirect: { type: Boolean, default: true },
			isRaw: { type: Boolean, default: false }
			//application/x-www-form-urlencoded				//Put and patch only use this enctype
			//multipart/form-data							//Only POST
		},
		computed: {
			actionUrl() {
				if (this.dataAction == '') {
					return window.location.href;
				}

				return this.dataAction;
			},
			getUrl() {
				if (this.dataGet == '') {
					return window.location.href;
				}

				return this.dataGet;
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
					if (key.indexOf('[]') != -1) {
						var newkeyname = key.replace('[]', '');

						if (!(newkeyname in emp)) {
							emp[newkeyname] = [];
						}

						emp[newkeyname].push(value);
					} else {
						emp[key] = value;
					}
				});

				return emp;
			},
			onSuccess(response) {
				var res = response.data;
				var redirect_url = ('redirect_url' in res)?res.redirect_url:'';

				this.$dispatch('block-loading', {state: false});
				if (res.success) {
					bus.$emit('hide-modal', '');
					bus.$emit('refresh');
					bus.$emit('input-clear');
				}

				var title = res.hasOwnProperty('title')?res.title:'Success';
				var text = res.hasOwnProperty('message')?res.message:'Success save your data';
				var type = res.hasOwnProperty('type')?res.type:'success';
				var timer = res.hasOwnProperty('timer')?res.timer:800;

				if (!res.success) {
					if (title == 'Success') title = "Failed";
					timer = 60000;
				}

				bus.$emit('alert-show', {title:title, text: text, type: type, timer: timer});

				if (this.isFollowRedirect && redirect_url != '') {
					setTimeout(function () {
						window.location = redirect_url;
					}, timer + 200);
				}
			},
			onFailed(response) {
				var code = response.status.toString();
				var msg = response.statusText;

				this.$dispatch('block-loading', {state: false});
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

				this.$dispatch('block-loading', {state: true});
				if (this.dataEnctype == 'multipart/form-data') {
					formData = this.formData();
				} else {
					formData = this.formObject();
				}

				switch (this.methodName) {
					case 'POST':
						this.$http.post(this.actionUrl, formData, {
							timeout: this.dataTimeout
						}).then(this.onSuccess, this.onFailed);
					break;
					case 'GET':
						this.$http.get(this.actionUrl, {
							params: formData,
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
			},
			formGetData(data) {
				if (typeof data == "undefined" || data.name != this.dataName || this.dataGet == '') return;

				if (data.hasOwnProperty('modal') && data.modal) {
					this.showModal = data.modal;
				} else {
					this.showModal = false;
				}

				this.$http.post(this.getUrl, data.data, {
					timeout: this.dataTimeout,
					emulateJSON: true
				}).then(this.onGetSuccess, this.onGetFailed);
			},
			onGetSuccess(response) {
				var data = response.data;

				if (data.success) {
					this.$broadcast('input-fill', data.data);

					if (this.showModal) {
						this.$dispatch('show-modal');
					}
				} else {
					bus.$emit('alert-show', {title: "Error", text: data.message, type: 'error'});
					bus.$emit('refresh');
				}
			},
			onGetFailed(response) {
				var code = response.status.toString();
				var msg = response.statusText;

				bus.$emit('alert-show', {title: code, text: msg, type: 'error'});
				bus.$emit('refresh');
			}
		},
		created() {
			this.$catch('form-get', this.formGetData);
			bus.$on('form-submit', this.formSubmit);
			bus.$on('form-get', this.formGetData);
		}
	}
</script>
