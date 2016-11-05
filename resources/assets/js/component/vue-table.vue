<template>
	<table class="ui table" :class="class">
		<thead v-if="withHeader">
			<tr>
				<th v-if="withCheck"><div class="ui fitted checkbox"><input type="checkbox" v-model="select_all"> <label></label></div></th>
				<th v-for="item in maps" v-text="item.text"></th>
				<th v-if="withControl"></th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="row in rows">
				<td class="collapsing" v-if="withCheck">
					<div class="ui fitted checkbox">
						<input type="checkbox" :name="namecheck" :value="row[id]" v-model="checks">
						<label></label>
					</div>
				</td>
				<td v-for="col in maps" v-html="row[col.key]"></td>
				<td v-if="withControl">
					<vue-row-control
					:data-row.once="row"
					:is-href.once="href"
					:can-detail.once="canDetail"
					:can-edit.once="canEdit"
					:can-delete.once="canDelete"
					></vue-row-control>
				</td>
			</tr>
		</tbody>
	</table>
</template>

<script>
	module.exports = {
		props: {
			class: 			{ required: false, type: Array, default: function () {return [];} },
			id: 			{ required: false, type: String, default: 'id' },
			maps: 			{ required: true, type: Array },
			canDelete: 		{ required: false, type: Boolean, default: false },
			canEdit: 		{ required: false, type: Boolean, default: false },
			canDetail: 		{ required: false, type: Boolean, default: false },
			withHeader: 	{ required: false, type: Boolean, default: true },
			withCheck: 		{ required: false, type: Boolean, default: false },
			withControl: 	{ required: false, type: Boolean, default: false },
			href: 			{ required: false, type: Object, default: function () {
				return {
					detail: {
						enable: false,
						format: '{0}'
					},
					edit: {
						enable: false,
						format: '{0}'
					},
					delete: {
						enable: false,
						format: '{0}'
					}
				};
			} },
		},
		computed: {
			namecheck: function () {
				return this.id + '[]';
			},
			select_all: {
				set: function (val) {
					var that = this;
					this.checks = [];
					if (val) {
						if (this.rows.length > 0) {
							$.each(this.rows, function (index, item) {
								that.checks.push(item[that.id]);
							});
						}
					}
				},
				get: function () {
					if (this.checks.length == this.rows.length && this.rows.length > 0)
						return true;
					return false;
				}
			}
		},
		data: function () {
			return {
				rows: [],
				checks: []
			}
		},
		events: {
			'row-flash': function (data, selectall) {
				if (typeof data != 'undefined') {
					this.rows = data;
					this.checks = [];
					if (selectall) this.select_all = true;
				}
			},
			'row-clear': function () {
				this.checks = [];
				this.rows = [];
			}
		}
	}
</script>