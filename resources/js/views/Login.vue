<template>
  <div>
    Login
    <br>
    <input v-model="telegram_id" type="text" placeholder="tg_id">
    <input v-model="password" type="password" placeholder="password">
    <input @click.prevent="login" type="submit" value="login">
  </div>
</template>

<script>
import axios from 'axios';

export default{
  name: "Login",
  data() {
    return {
      telegram_id: null,
      password: null,
    }
  },
  methods: {
    login() {
      axios.get('/sanctum/csrf-cookie').then(response => {
        axios.post('/login', {telegram_id: this.telegram_id, password: this.password})
        .then( r => {
          console.log(r)
        })
        .catch(err => {
          console.log(err.response)
        })
      })
    }
  }
}
</script>