<style>
	.sortable {
		width: 100%;
		padding:0em 1em;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}
	.sortable.grid {
		overflow: hidden;
	}
	.sortable li {
		list-style: none;
		border: 1px solid #CCC;
		background-color: #F6F6F6;
		background-repeat: no-repeat;
		background-size: 100% 100%;
		background-position: center center;
		color: #1C94C4;
		margin: 5px;
		padding: 5px;
		height: 22px;
	}
	.sortable.grid li {
		float: left;
		width: 150px;
		height: 225px;
		position: relative;
	}
	.sortable.grid.mini li {
		width: 120px;
		height: 180px;
	}
	.sortable.grid li .content {
		background-color: rgba(0, 0, 0, 0.5);
		position: absolute;
		color: white;
		padding: 5px;
		left: 0px;
		right: 0px;
		word-break: break-all;
		word-wrap: break-word;
	}
	.sortable.grid li a.link {
		display:block;
		cursor: pointer;
		position: absolute;
		z-index: 99;
		top:0;
		left: 0;
		right: 0;
		bottom: 0;
	}
	.sortable.grid li .dimm {
		position: absolute;
		top:30px;
		bottom: 0px;
		left:0px;
		right:0px;
		cursor: pointer;
		color:white;
		text-align: center;
		z-index: 3;
	}
	.sortable.grid li input {
		display: none;
	}
	.sortable.grid li input[type="checkbox"]:checked + .dimm {
		background-color:rgba(0, 0, 0, 0.5);
	}
	.sortable.grid li .dimm i.icon {
		margin-top:calc(50% - 28px);
		display: none;
	}
	.sortable.grid li input[type="checkbox"]:checked + .dimm i.icon {
		display: inline-block;
	}
	.sortable.grid li .content:not(.extra) {
		bottom: 0px;
	}
	.sortable.grid li .content.extra {
		top:0px;
	}
	.sortable.grid li .content .header {
		color:#FAFAFA;
	}
</style>

<template>
	<ul class="sortable mini grid" v-if="items.length > 0">
		<li v-for="item in items" :style="getBackground(item[maps.image])">
			<div class="content"><span class="header" >{{ item[maps.title] }}</span></div>
			<a v-if="withLink" class="link" :href="getLinks(item)"></a>
			<input type="checkbox" :name="namecheck" :value="item[maps.id]" v-model="checks">
			<div class="dimm">
				<i class="icon huge checkmark"></i>
			</div>
			<div class="extra content" v-show="isComponent != null">
				<component
				:is="$options.components[isComponent]"
				:data-row="item"></component>
			</div>
		</li>
	</ul>
</template>

<script>
	module.exports = {
		props: {
			maps:			{ required: true, type: Object },
			isComponent:	{ required: false, type: String, default: null },
			canSelect: 		{ required: false, type: Boolean, default: true },
			withLink: 		{ required: false, type: Boolean, default: false },
			linkFormat: 	{ required: false, type: String, default: null }
		},
		computed: {
			namecheck: function () {
				return this.maps.id + '[]';
			},
			select_all: {
				set: function (val) {
					var that = this;
					this.checks = [];
					if (val) {
						$.each(this.items, function (index, item) {
							that.checks.push(item[that.maps.id]);
						});
					}
				},
				get: function () {
					if (this.checks.length == this.items.length && this.items.length > 0)
						return true;
					return false;
				}
			}
		},
		data: function () {
			return {
				items: [],
				checks: []
			}
		},
		methods: {
			getLinks: function (item) {
				var target = /\{\w+\}/ig;
				var keytarget = null;
				var key = '';
				var ret = '';
				var that = this;
				keytarget = this.linkFormat.match(target);
				if (keytarget != null) {
					ret = this.linkFormat;
					$.each(keytarget, function (index, regres) {
						key = regres.substring(regres.length-1,1);
						ret = ret.replace(regres, item[that.maps[key]]);
					});
				}
				return ret;
			},
			getBackground: function (image) {
				if (image == '')
					return {backgroundImage:"url('/manga/image/original/dummy.png')"};
				return {backgroundImage:"url('" + '/manga/image/thumb/' + image + "')"};
			}
		},
		events: {
			'row-flash': function (data, selectall) {
				if (typeof data != 'undefined') {
					this.items = data;
					this.checks = [];

					if (this.canSelect) {
						this.$nextTick(function () {
							$('.sortable.grid li').on('click','.dimm', function () {
								$(this).parent().find('input').trigger('click');
							});
						});
					}
					if (selectall) this.select_all = true;
				}
				
			},
			'row-clear': function () {
				this.checks = [];
				this.items = [];
			}
		},
		ready: function () {
			if (this.canSelect) {
				$('.sortable.grid li').on('click','.dimm', function () {
					$(this).parent().find('input').trigger('click');
				});
			}
		}
	}
</script>