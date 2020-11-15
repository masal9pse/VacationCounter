<template>
  <v-navigation-drawer v-model="$store.state.drawer" absolute temporary app>
    <v-list class="pa-1">
      <v-list-item avatar>
        <v-list-item-avatar>
          <v-img
            src="https://user-images.githubusercontent.com/51937772/69498113-a4212c00-0f27-11ea-9840-31534e5867b1.jpg"
          />
        </v-list-item-avatar>

        <v-list-item-content>
          <v-list-item-title>Masato</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>

    <v-list class="pt-0" dense>
      <v-divider></v-divider>

      <v-list-item v-for="item in items" :key="item.title" :to="item.link">
        <!-- v-list-item-actionは2.0系だとエラーになる -->
        <v-list-item-icon>
          <v-icon color="blue darken-2">{{ item.icon }}</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title class="green--text">{{item.title}}</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script>
export default {
  data() {
    return {
      items: [
        { title: "カウント", icon: "mdi-domain", link: { name: "count" } },
        {
          title: "説明",
          icon: "mdi-message-text",
          link: { name: "about" }
        }
      ]
    };
  },
  methods: {}
};
</script>