window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from "vue-router";
import router from "./routes";
import App from "./App.vue"



Vue.use(VueRouter);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('test', require('./components/Test/Test.vue').default);


const app = new Vue({

  el: '#app',
  render: h => h(App),
  router
});
