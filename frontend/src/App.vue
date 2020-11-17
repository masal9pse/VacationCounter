<template>
  <v-app>
    <SideNav />
    <v-app-bar app>
      <v-app-bar-nav-icon @click="toggleSideMenu"></v-app-bar-nav-icon>
      <v-toolbar-title class="headline text-uppercase">
        <span class="font-weight-light">Vacation Counter</span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
    </v-app-bar>
    <v-content>
      <router-view></router-view>
    </v-content>
  </v-app>
</template>

<script>
import { mapActions } from "vuex";

// import Count from "./components/Count";
import SideNav from "./components/SideNav";
export default {
  name: "App",
  components: {
    // Count,
    SideNav
  },
  methods: {
    ...mapActions(["toggleSideMenu"])
  }
};
</script>

<style scoped>
#nav {
  padding: 30px;
  font-size: 20px;
  color: red;
}
#nav a {
  font-weight: bold;
  color: #2c3e50;
}
#nav a.router-link-exact-active {
  color: #42b983;
}
</style>