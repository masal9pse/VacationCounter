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
  auth_user: null,
  test: 'testだよ〜'
 },
 mutations: {
  toggleSideMenu(state) {
   state.drawer = !state.drawer
  },
  setAuthUser(state, auth_user) {
   state.auth_user = auth_user
  }
 },
 actions: {
  toggleSideMenu({commit}) {
   commit("toggleSideMenu")
  },
  async login({commit}, {email, password}) {
   const response = await this.$axios.$post('/api/login', {email, password})
    .catch(err => {
     console.log(err)
    })
   commit('setAuthUser', response)
  }
 }
})
