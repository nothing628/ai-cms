<template>
	<div v-if="dataType == 'hidden'" >
		<input :name="dataName" :id="dataName" type="hidden" v-model="currentVal">
	</div>
	<div v-else :class="dataCol">
		<div class="form-material form-material-primary" :class="{'floating':isFloating}">
			<input v-if="dataType == 'text'" type="text" :name="dataName" :id="dataName" :class="dataClass" :required="isRequired" :placeholder="valPlaceholder" v-model="currentVal" :disabled="isDisabled" :readonly="isReadonly">
			<input v-if="dataType == 'password'" type="password" :name="dataName" :id="dataName" :class="dataClass" :required="isRequired" :placeholder="valPlaceholder" v-model="currentVal" :disabled="isDisabled" :readonly="isReadonly">
			<input v-if="dataType == 'email'" type="email" :name="dataName" :id="dataName" :class="dataClass" :required="isRequired" :placeholder="valPlaceholder" v-model="currentVal" :disabled="isDisabled" :readonly="isReadonly">
			<label :for="dataName">{{ dataLabel }}</label>
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
			dataType: { type: String, required: false, default: 'text'},
			dataValue: { type: String, required: false, default: null},
			isRequired: { type: Boolean, required: false, default: false},
			isFloating: { type: Boolean, required: false, default: false },
			isReadonly: { type: Boolean, required: false, default: false },
			isDisabled: { type: Boolean, required: false, default: false }
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
		methods: {
			clear() {
				this.currentVal = null;
			},
			fill(data) {
				if (data.hasOwnProperty(this.dataName)) {
					this.currentVal = data[this.dataName];
				}
			}
		},
		created() {
			this.$catch('input-fill', this.fill);
			bus.$on('input-clear', this.clear);
		},
		mounted() {
			this.currentVal = this.dataValue;
		}
	}
</script>
