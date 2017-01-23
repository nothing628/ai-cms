const store = new Vuex.Store({
	state: {
		angka: 1
	},
	mutations: {
		increment(state) {
			state.angka++;
		}
	}
});