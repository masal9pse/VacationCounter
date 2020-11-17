import Vue from 'vue'
import Vuex from 'vuex'
import auth from './auth';

Vue.use(Vuex)

export default new Vuex.Store({
 modules: {
  auth
 },
 state: {
  drawer: false,
 },
 mutations: {
  toggleSideMenu(state) {
   state.drawer = !state.drawer
  }
 },
 actions: {
  toggleSideMenu({commit}) {
   commit("toggleSideMenu")
  },
 }
})
