<template>
  <v-container>
    <form @submit.prevent="signup">
      <v-text-field v-model="form.name" label="Name" type="text"></v-text-field>
      <span class="red--text" v-if="errors.name">{{ errors.name[0] }}</span>
      <v-text-field
        v-model="form.email"
        label="E-mail"
        type="email"
      ></v-text-field>
      <span class="red--text" v-if="errors.email">{{ errors.email[0] }}</span>

      <v-text-field
        v-model="form.password"
        label="Password"
        type="password"
      ></v-text-field>
      <span class="red--text" v-if="errors.password">{{
        errors.password[0]
      }}</span>

      <v-text-field
        v-model="form.password_confirmation"
        label="Confirm Password"
        type="password"
      ></v-text-field>

      <v-btn depressed color="gray" class="mr-4" type="submit">SignUp </v-btn>
      <router-link to="/login">
        <v-btn depressed color="black" class="mr-4"> Login </v-btn>
      </router-link>
    </form>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      form: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
      },
      errors: {},
    };
  },

  created() {
    if (User.loggedIn()) {
      this.$router.push({ name: "forum" });
    }
  },

  methods: {
    signup() {
      axios
        .post("/api/auth/signup", this.form)
        .then((result) => {
          User.responseAfterLogin(result), this.$router.push({ name: "forum" });
        })
        .catch((err) => (this.errors = err.response.data.errors));
    },
  },
};
</script>

<style>
</style>