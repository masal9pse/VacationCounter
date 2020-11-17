<template>
  <v-card color="grey lighten-4" flat height="200px" tile>
    <v-toolbar dense>
      <v-app-bar-nav-icon></v-app-bar-nav-icon>

      <v-toolbar-title>Todo-List</v-toolbar-title>

      <v-spacer></v-spacer>

      <router-link to="/signup">
        <v-btn icon>
          <v-icon>mdi-account</v-icon>
        </v-btn>
      </router-link>

      <router-link to="/todo">
        <v-btn icon>
          <v-icon>mdi-align-horizontal-left</v-icon>
        </v-btn>
      </router-link>

      <router-link to="/login">
        <v-btn icon>
          <v-icon>mdi-login</v-icon>
        </v-btn>
      </router-link>

      <v-btn icon>
        <v-icon>mdi-logout</v-icon>
      </v-btn>
    </v-toolbar>
  </v-card>
</template>