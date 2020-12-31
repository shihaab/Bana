require('./bootstrap');
window.Vue = require('vue');

Vue.component('app', require('./components/app.vue').default);

const app = new Vue({
  el: '#app',
});