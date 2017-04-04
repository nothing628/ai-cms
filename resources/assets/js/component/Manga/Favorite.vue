<template>
	<button class="btn" :class="btnclass" @click="submit">
		<i class="fa fa-heart" :class="iclass"></i>
	</button>
</template>

<script>
	export default {
		data() {
			return {
				is_favorited: false
			};
		},
		props: {
			dataClass: { required: false, type: Array, default() { return []; }},
			dataNclass: { required: false, type: Array, default() { return ['text-white']; }},
			dataYclass: { required: false, type: Array, default() { return ['text-danger']; }},
			dataMangaId: { required: true, type: String },
			dataSubmit: { required: true, type: String },
			isFavorited: { type: Boolean, default: false }
		},
		computed: {
			iclass() {
				if (this.is_favorited) {
					return this.dataYclass;
				}

				return this.dataNclass;
			},
			btnclass() {
				if (this.is_favorited) {
					//return ['btn-primary'];
				}

				return [].concat(this.dataClass);
			}
		},
		methods: {
			onSuccess(response) {
				var dat = response.data;

				if (dat.success) {
					this.is_favorited = !this.is_favorited;
				}
			},
			submit() {
				//submit the favorited status
				this.$http.post(this.dataSubmit, { manga_id: this.dataMangaId }, {
					timeout: 15000,
					emulateJSON: true
				}).then(this.onSuccess, function () {});
			}
		},
		mounted() {
			this.is_favorited = this.isFavorited;
		}
	}
</script>
