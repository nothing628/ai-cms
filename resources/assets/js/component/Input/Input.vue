<template>
	<div :class="dataCol">
		<div class="form-material form-material-primary" :class="{'floating':isFloating}">
			<input v-if="dataType == 'text'" type="text" :name="dataName" :class="dataClass" :required="dataRequired" :placeholder="valPlaceholder" v-model="currentVal">
			<input v-if="dataType == 'password'" type="password" :name="dataName" :class="dataClass" :required="dataRequired" :placeholder="valPlaceholder" v-model="currentVal">
			<input v-if="dataType == 'email'" type="email" :name="dataName" :class="dataClass" :required="dataRequired" :placeholder="valPlaceholder" v-model="currentVal">
			<label for="field-title">{{ dataLabel }}</label>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				currentVal: null
			};
		},
		props: {
			dataCol: { type: Array, required: false, default() { return ['col-md-6']; }},
			dataClass: { type: Array, required: false, default() { return ['form-control']; }},
			dataLabel: { type: String, required: false, default: ''},
			dataName: { type: String, required: true},
			dataPlaceholder: { type: String, required: false, default: ''},
			dataRequired: { type: Boolean, required: false, default: false},
			dataType: { type: String, required: false, default: 'text'},
			dataValue: { type: Object, required: false, default: null},
			isFloating: { type: Boolean, required: false, default: false}
		},
		computed: {
			valPlaceholder() {
				if (this.isFloating) {
					return '';
				} else {
					return this.dataPlaceholder;
				}
			}
		},
		mounted() {
			this.currentVal = this.dataValue;
		}
	}
</script>
