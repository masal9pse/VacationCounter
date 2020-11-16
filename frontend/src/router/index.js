import Vue from 'vue'
import Router from 'vue-router'
import About from '../views/About.vue'
import Count from '../views/Count.vue'
import Login from '../views/Login'
Vue.use(Router)

export default new Router({
 mode: 'history',
 base: process.env.BASE_URL,
 routes: [
  {
   path: '/',
   name: 'count',
   component: Count
  },
  {
   path: '/login',
   name: 'login',
   component: Login
  },
  {
   path: '/about',
   name: 'about',
   component: About
  },
 ]
})                                                                                                                                                                                                                                              