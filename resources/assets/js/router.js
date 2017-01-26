import Hello from './component/Hello.vue'
import VueRouter from 'vue-router';

const routes = [
	{ path: '/', component: Hello }
];

const router = new VueRouter({
	mode: 'history',
	routes
});

export default router;
