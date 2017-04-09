<template>
	<div class="pull-right push-5-r">
		<button class="btn dropdown-toggle btn-square" :class="btnclass" data-toggle="dropdown">
			<i class="si si-pin"></i> {{ btntxt }}
		</button>
		<ul class="bookmark-dropdown dropdown-menu">
			<li :class="{active: (bookmarkValue == 0)}"><a href="javascript:void(0)" @click="submitBookmark(0)"><i class="si si-calendar"></i> Plan to Read</a></li>
			<li :class="{active: (bookmarkValue == 1)}"><a href="javascript:void(0)" @click="submitBookmark(1)"><i class="si si-book-open"></i> Reading</a></li>
			<li :class="{active: (bookmarkValue == 2)}"><a href="javascript:void(0)" @click="submitBookmark(2)"><i class="si si-check"></i> Completed</a></li>
			<li class="divider"></li>
			<li><a href="javascript:void(0)" @click="removeBookmark"><i class="si si-close"></i> Remove Bookmark</a></li>
		</ul>
	</div>
</template>

<style>
	.bookmark-dropdown.dropdown-menu > .active > a {
		background-color: #b1efc3;
	}
</style>

<script>
	export default {
		data() {
			return {
				bookmarkValue: -1
			};
		},
		props: {
			dataMangaId: { type: String, required: true },
			dataSubmit: { type: String, required: true },
			dataValue: { type: Number, required: false, default: 2 }
		},
		computed: {
			btnclass() {
				if (this.bookmarkValue > -1) {
					return ['btn-success'];
				}

				return ['btn-default'];
			},
			btntxt() {
				if (this.bookmarkValue > -1) {
					return 'Bookmarked';
				}

				return 'Bookmark';
			}
		},
		methods: {
			onSuccess(response) {
				var dat = response.data;

				if (dat.success) {
					//Change status value
					this.bookmarkValue = dat.status;
				}
			},
			submitBookmark(type) {
				//Submit bookmark
				this.$http.post(this.dataSubmit, {
					manga_id: this.dataMangaId,
					status: type
				}, {
					timeout: 15000,
					emulateJSON: true
				}).then(this.onSuccess, function () {});
			},
			removeBookmark() {
				//Remove Bookmark
				this.$http.post(this.dataSubmit, {
					manga_id: this.dataMangaId,
					status: -1
				}, {
					timeout: 15000,
					emulateJSON: true
				}).then(this.onSuccess, function () {});
			}
		},
		mounted() {
			this.bookmarkValue = this.dataValue;
		}
	}
</script>
