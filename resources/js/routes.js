import Vue from 'vue';
import VueRouter from "vue-router";
import Home from "./components/pages/Home";
import HowToUse from "./components/pages/HowToUse";
import Laravel from "./components/pages/Laravel";

export default new VueRouter({
  routes: [
    {
      path: '/about/app/Home',
      component: Home
    },
    {
      path: '/about/app/use',
      component: HowToUse
    },
    {
      path: '/about/app/laravel',
      component: Laravel
    }
  ],
  mode: 'history'
})
