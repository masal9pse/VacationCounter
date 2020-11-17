import Vue from 'vue';
import App from './App.vue';
import router from './router/';
import store from './store/';
import vuetify from './plugins/vuetify';
import axios from 'axios';
import VueMeta from 'vue-meta';

//Vue.config.productionTip = false

//Vue.use(axios);
Vue.use(VueMeta, {refreshOnceOnNavigation: true});

const createApp = async () => {    //追加
 await store.dispatch('auth/searchUser');

 new Vue({
  router,
  vuetify,
  store,
  axios,
  render: h => h(App)
 }).$mount('#app')
}

createApp();    //追加