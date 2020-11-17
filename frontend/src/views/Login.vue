<template>
  <div>
    <!--<Header />-->
    <div class="main-container">
      <v-form v-model="valid">
        <v-text-field v-model="form.email" :rules="emailRules" label="E-mail" required></v-text-field>
        <v-text-field
          v-model="form.password"
          :rules="passwordRules"
          label="Password"
          required
          type="password"
        ></v-text-field>
        <v-btn small>submit</v-btn>
      </v-form>
    </div>
  </div>
</template>

<script>
export default {
  metaInfo: {
    title: "ログイン",
    htmlAttrs: {
      lang: "ja"
    }
  },
  created() {
    const user = this.$store.getters["auth/user"];
    if (user !== null) {
      this.$router.push("/todo");
    }
  },
  data() {
    return {
      form: {
        email: "",
        password: ""
      },
      emailRules: [
        v => !!v || "E-mailを入力してください",
        v =>
          /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) ||
          "E-mailを正しく入力してください"
      ],
      passwordRules: [v => !!v || "パスワードを入力してください"]
    };
  }
};
</script>

<style>
.main-container {
  width: 500px;
  margin: auto;
}
</style>
