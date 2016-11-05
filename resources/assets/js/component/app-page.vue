<template>
	<div class="ui grid" :class="class" :id="id">
		<slot></slot>
	</div>
</template>

<script>
	module.exports = {
		props:{
			urlAjax: {required: true, type:String},
			class: {required:false, type:Array, default:function () {return [];}},
			id: {required:false, type:String, default:null}
		},
		data: function () {
			return {};
		},
		methods: {
			appInput: function (data) {
				if (! "type" in data) data.type="text";
				if (! "value" in data) data.value="";
				swal({
					title: data.title,
					html: '<p><input id="input-confirm" type="' + data.type + '" value="'+ data.value +'"></p>',
					closeOnConfirm:false,
					showCancelButton:true,
					showConfirmButton:true,
					allowEscapeKey:false,
					allowOutsideClick: false
				}, function () {
					swal.disableButtons();
					var newvalue = $('#input-confirm').val();
					$('#input-confirm').val('');
					data.onconfirm && data.onconfirm.call( this, newvalue );
				});
			},
			appNotify: function (data) {
				swal({
					title:data.title,
					text:data.text,
					type: ("type" in data)?data.type:'success',
					timer: 1400,
					showConfirmButton:false
				});
			},
			appConfirm: function (data) {
				swal({
					title: data.title,
					text: data.text,
					type: 'warning',
					showCancelButton:true,
					showConfirmButton:true,
					closeOnConfirm:false,
					allowEscapeKey:false,
					allowOutsideClick: false
				}, function () {
					swal.disableButtons();
					data.onconfirm && data.onconfirm();
				});
			},
			appAjax: function (data) {
				var that = this;
				var param = {
					data: data.data,
					client_action: data.client_action
				};

				this.$http.post(this.urlAjax, param, {emulateJSON:true,timeout: 15000}).then(function (response) {
					var resdata = $.extend(response.data);

					Vue.http.headers.common['X-CSRF-TOKEN'] = resdata.new_csrf;

					data.onsuccess && data.onsuccess(resdata);
				}, function(failresponse) {
					swal({
						title:failresponse.status,
						text:failresponse.statusText,
						type: 'error',
						showConfirmButton:true
					});
					data.onerror && data.onerror(failresponse);
				});
			},
			appTitle: function (title) {
				$('title').html(title);
			}
		},
		events: {
			'form-submit': function(data, name) { return this.$broadcast('form-submit', data, name);},
			'form-close': function (name) { return this.$broadcast('form-close', name);},
			'form-edit': function (data,name, isdetail) {return this.$broadcast('form-edit', data, name, isdetail);},
			'form-refresh': function () {return this.$broadcast('form-refresh');},
			'form-new': function (name) {return this.$broadcast('form-new',name);},
			'app-notify': function(data) {return this.appNotify(data);},
			'app-confirm': function (data) {return this.appConfirm(data);},
			'app-input': function (data) {return this.appInput(data);},
			'ajax-action': function (data) {return this.appAjax(data);},
			'title-change': function (title) {return this.appTitle(title);},
		},
		ready: function () {
			$('.ui.fluid.accordion').accordion({selector: {trigger   : '.title .caption'}});
		}
	}
</script>