import Vue from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify';
import store from './store';
import router from './router';
import axios from 'axios';


Vue.use(axios);
Vue.use(VueMeta, {refreshOnceOnNavigation: true});    //追加

new Vue({
 vuetify,
 router,
 store,
 render: h => h(App)
}).$mount('#app')
