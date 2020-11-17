<template>
  <v-container>
    <v-row>
      <v-col cols="6">
        <v-text-field v-model="name" label="授業名" @keyup.enter="addTodo" @click="addTodo" required></v-text-field>
        <v-btn icon @click="logout">
          <v-icon>mdi-logout</v-icon>
        </v-btn>
      </v-col>
    </v-row>
    <v-card card_id width="348" class="mx-auto mb-5">
      <v-card-title>授業名を入力してください</v-card-title>
    </v-card>
    <div v-for="(todo,index) in todos" :key="todo.name">
      <v-card card_id max-width="344" class="mx-auto pt-6">
        <v-card-title>{{ todo.lesson }}</v-card-title>
        <v-card-text>
          <v-text-field label="メモ" v-model="todo.memo" @input="addMemo"></v-text-field>
        </v-card-text>
        <v-card-actions>
          <v-btn @click="increment(todo)" color="primary">さぼり回数(+)</v-btn>
          <span>{{ todo.count }}</span>
          <v-btn @click="decrement(todo)" color="error">間違い(-)</v-btn>
          <v-btn @click="deleteItem(index)">削除</v-btn>
        </v-card-actions>
      </v-card>
    </div>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      count: 0,
      name: "",
      memo: [],
      uri: "/api/lesson/",
      todos: []
    };
  },
  created() {
    //・・・④
    const user = this.$store.getters["auth/user"];
    if (user === null) {
      this.$router.push("/login");
    }
    this.lessonList();
  },
  computed: {
    user() {
      //・・・⑤
      return this.$store.getters["auth/user"];
    }
  },
  //mounted() {
  //  this.lessonList();
  //},
  methods: {
    async logout() {
      await this.$store.dispatch("auth/logout");
      this.$router.push("/login");
    },
    lessonList() {
      //console.log(axios);
      axios.get(this.uri).then(response => {
        this.todos = response.data;
        console.log(response);
      });
    },
    addMemo() {
      this.isActive = false;
    },
    addTodo() {
      if (this.name != "") {
        this.todos.push({
          name: this.name,
          count: this.count
        });
      }
      this.name = "";
    },
    increment(todo) {
      todo.count++;
    },
    decrement(todo) {
      if (todo.count > 0) {
        todo.count--;
      }
    },
    async deleteItem(id) {
      await axios.delete("/api/lesson/destroy/" + id);
      this.todos.splice(id, 1);
    }
  }
};
</script>
