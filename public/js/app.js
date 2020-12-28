require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router'

import routes from './routes'

window.Vue = require('vue');
Vue.use(VueRouter)

const app = new Vue({
    el: '#app',
    data: {
        message: 'You loaded this page on ' + new Date().toLocaleString()
    },
    router: new VueRouter(routes)
});