require('./bootstrap');

window.Vue = require('vue');

/**
 * Application modules
 */
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('users-module', require('./modules/Users.vue').default);

const app = new Vue({
    el: '#app',
});
