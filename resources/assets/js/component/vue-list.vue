<template>
	<div class="ui grid" :class="classDiv">
		<div class="column" v-for="item in items">
			<a :href="getLinks(item)" v-if="withLink" v-text="item[text]"></a>
			<span v-else v-text="item[text]"></span>
		</div>
	</div>
</template>

<script>
	module.exports = {
		props: {
			withLink: 		{ required: false, type: Boolean, default: false },
			linkFormat: 	{ required: false, type: String, default: "{0}" },
			text: 			{ required: true, type: String },
			column: 		{ required: false, type: String, default: 'five' },
		},
		computed: {
			classDiv: function () {
				return [this.column, 'column'];
			}
		},
		data: function () {
			return {
				items: []
			}
		},
		methods: {
			getLinks: function (item) {
				var target = /\{\w+\}/ig;
				var keytarget = null;
				var key = '';
				var ret = '';
				keytarget = this.linkFormat.match(target);
				if (keytarget != null) {
					ret = this.linkFormat;
					$.each(keytarget, function (index, regres) {
						key = regres.substring(regres.length-1,1);
						ret = ret.replace(regres, item[key]);
					});
				}
				return ret;
			},
		},
		events: {
			'row-flash': function (data, selectall) {
				if (typeof data != 'undefined') {
					this.items = data;
				}
			},
			'row-clear': function () {
				this.items = [];
			}
		}
	}
</script>