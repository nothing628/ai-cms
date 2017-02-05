import VueResource from 'vue-resource';
import VueRouter from 'vue-router';
import Vuex from 'vuex';

/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */
Vue.use(VueResource);
Vue.use(VueRouter);

import './component/component';
import './bootstrap';
import router from './router';
import store from './vuex';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

const bus = window.bus = new Vue({});

const app = new Vue({
	el: '#page-container',
	store,
	router
});
