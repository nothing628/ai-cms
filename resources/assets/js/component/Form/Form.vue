<template>
	<form :enctype="dataEnctype"
	:action="dataAction"
	:class="dataClass" :method = "dataMethod" @submit.stop.prevent="submit" :id="dataName">
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
			dataEnctype: { type: String, required: false, default: 'application/x-www-form-urlencoded' }
			//application/x-www-form-urlencoded
			//multipart/form-data
			//text/plain
		},
		computed: {
			selectorName() {
				return '#' + this.dataName;
			},
			methodName() {
				return this.dataMethod.toUpperCase();
			},
			formObject() {
				var form = document.forms[this.dataName];
				var formData = new FormData(form);
				var emp = {};

				formData.forEach(function (value, key) {
					emp[key] = value;
				});

				return emp;
			}
		},
		methods: {
			onSuccess(response) {
				var res = response.data;

				if (res.success) {
					var title = res.hasOwnProperty('title')?res.title:'Success';
					var text = res.hasOwnProperty('message')?res.message:'Success save your data';
					var type = res.hasOwnProperty('type')?res.type:'success';

					bus.$emit('hide-modal', '');
					bus.$emit('alert-show', {title:title, text: text, type: type});
					bus.$emit('refresh');
				}
			},
			onFailed(response) {
				var code = response.status.toString();
				var msg = response.statusText;

				bus.$emit('hide-modal', '');
				bus.$emit('alert-show', {title: code, text: msg, type: 'error'});
				bus.$emit('refresh');
			},
			submit() {
				//Handle Submit Here

				var formData = this.formObject;
				switch (this.methodName) {
					case 'POST':
						this.$http.post(this.dataAction, formData, {
							timeout: this.dataTimeout,
							emulateJSON: true
						}).then(this.onSuccess, this.onFailed);
					break;
					case 'GET':
						this.$http.get(this.dataAction, {
							body: formData,
							timeout: this.dataTimeout
						}).then(this.onSuccess, this.onFailed);
					break;
					case 'DELETE':
						this.$http.delete(this.dataAction, {
							body: formData,
							timeout: this.dataTimeout
						}).then(this.onSuccess, this.onFailed);
					break;
					case 'PUT':
						this.$http.put(this.dataAction, formData, {
							timeout: this.dataTimeout
						}).then(this.onSuccess, this.onFailed);
					break;
					case 'PATCH':
						this.$http.patch(this.dataAction, formData, {
							timeout: this.dataTimeout
						}).then(this.onSuccess, this.onFailed);
					break;
				}
			},
			formSubmit(target) {
				if (this.dataName == target) {
					//Need to submit
					this.submit();
				}
			}
		},
		created() {
			bus.$on('form-submit', this.formSubmit);
		}
	}
</script>
