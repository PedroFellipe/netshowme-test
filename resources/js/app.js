import VueToastr from "vue-toastr";
import VueRouter from 'vue-router';
import router from './router';

const { default: Axios } = require('axios');

require('./bootstrap');
window.Vue = require('vue');

Vue.component('index', require('./Index.vue').default);

Vue.router = router;
Vue.use(VueRouter);
Vue.use(VueToastr);

const app = new Vue({
    el: '#app',
    router
});

