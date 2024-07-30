<template>
  <div>
    Registration
    <br>
    <input v-model="name" type="text" placeholder="name">
    <input v-model="telegram_id" type="text" placeholder="tg_id">
    <input v-model="first_name" type="text" placeholder="first_name">
    <input v-model="last_name" type="text" placeholder="last_name">
    <input v-model="photo_url" type="text" placeholder="photo_url">
    <input v-model="role" type="text" placeholder="role">
    <input v-model="password" type="password" placeholder="password">
    <input v-model="password_confirmation" type="password" placeholder="password_confirmation">
    <input @click.prevent="register" type="submit" value="register">
  </div>
</template>

<script>
import axios from 'axios';

export default{
  name: "Registration",
  data() {
    return{
      name: null,
      telegram_id: null,
      first_name: null,
      last_name: null,
      photo_url: null,
      role: null,
      password: null,
      password_confirmation: null,
    }
  },
  methods: {
    register() {
      axios.get('/sanctum/csrf-cookie')
        .then(response => {
          axios.post('/register', {
            name: this.name,
            telegram_id: this.telegram_id,
            first_name: this.first_name,
            last_name: this.last_name,
            photo_url: this.photo_url,
            role: this.role,
            password: this.password,
            password_confirmation: this.password_confirmation
          })
          .then( res => {
            console.log(res);
          })
        }
      )
    }
  }
}
</script>