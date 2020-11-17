<template>
  <div>
    <!--<Header />-->
    <div class="main-container">
      <!--<v-form v-model="valid">-->
      <v-form>
        <v-text-field v-model="form.name" :rules="nameRules" :counter="10" label="Name" required></v-text-field>
        <v-text-field v-model="form.email" :rules="emailRules" label="E-mail" required></v-text-field>
        <v-text-field
          v-model="form.password"
          :rules="passwordRules"
          label="Password"
          required
          type="password"
        ></v-text-field>
        <v-text-field
          v-model="form.password_confirmation"
          :rules="repasswordRules"
          label="Confirm Password"
          required
          type="password"
        ></v-text-field>
        <v-btn small @click="register">submit</v-btn>
      </v-form>
    </div>
  </div>
</template>

<script>
//import Header from "./Header";

export default {
  //components: {
  //  Header
  //},
  metaInfo: {
    title: "会員登録",
    htmlAttrs: {
      lang: "ja"
    }
  },
  created() {
    const user = this.$store.getters["auth/user"];
    if (user !== null) {
      this.$router.push("/");
    }
  },
  data() {
    return {
      form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: ""
      },
      nameRules: [v => !!v || "名前を入力してください"],
      emailRules: [
        v => !!v || "E-mailを入力してください",
        v =>
          /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) ||
          "E-mailを正しく入力してください"
      ],
      passwordRules: [
        v => !!v || "パスワードを入力してください",
        v => v.length >= 8 || "パスワードは8文字以上で入力してください"
      ],
      repasswordRules: [
        v => !!v || "パスワードの再入力を行ってください",
        v => v == this.form.password || "パスワードが一致しません"
      ]
    };
  },
  methods: {
    //追加
    async register() {
      await this.$store.dispatch("auth/register", this.form);
      this.$router.push("/");
    }
  }
};
</script>

<style>
.main-container {
  width: 500px;
  margin: auto;
}
</style>