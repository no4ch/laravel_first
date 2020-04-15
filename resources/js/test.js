window.Vue = require('vue');

Vue.component('test', require('./components/Test/Test').default);

const test = new Vue({
  el: '#test'
});
