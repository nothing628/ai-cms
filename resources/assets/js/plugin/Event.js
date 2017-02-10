const MyPlugin = {
	install(Vue, options) {
		Vue.prototype.$broadcast = function (eventname, options) {
			var data = options || {};
			var child = this.$children;

			child.forEach(function (value, idx) {
				if (eventname in value.$event) {
					if (typeof value.$event[eventname] == 'function') {
						//call callback
						var cb = value.$event[eventname];
						var dataret = cb(data);

						if (dataret) {
							//if return not false, then continue broadcast
							value.$broadcast(eventname, data);
						}
					}
				} else {
					value.$broadcast(eventname, data);
				}
			});
		}

		Vue.prototype.$dispatch = function (eventname, options) {
			var data = options || {};
			var parent = this.$parent;

			if (typeof parent == 'undefined') {
				//Already get root element
				return;
			}
			
			if (eventname in parent.$event) {
				if (typeof parent.$event[eventname] == 'function') {
					var cb = parent.$event[eventname];
					var dataret = cb(data);

					if (dataret) {
						//if return not false, then continue dispatch
						value.$dispatch(eventname, data);
					}
				}
			} else {
				parent.$dispatch(eventname, data);
			}
		}

		Vue.prototype.$catch = function(eventname, cbs) {
			//if eventname already catch, return;
			if (eventname in this.$event) return;

			this.$event[eventname] = cbs;
		}

		Vue.mixin({
			created() {
				if (!this.$event) {
					this.$event = Object.create(null);
				}

				console.log('Created!');
			}
		});
	}
}

export default MyPlugin;
