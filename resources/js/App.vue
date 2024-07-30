<template>
  <!-- <RouterLink style="margin-right: 24px" to="/get">get</RouterLink>
  <RouterLink style="margin-right: 24px" class="" to="/user/login">login</RouterLink>
  <RouterLink style="margin-right: 24px" class="" to="/user/registration">registration</RouterLink>
  <a @click.prevent="logout" href="#">Logout</a> -->
  <RouterView :products="products" :cart="cart" @add-to-cart="handleAddToCart"/>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const products = ref([]);
const cart = ref(JSON.parse(localStorage.getItem('cart')) || []);

function handleAddToCart(product) {
  cart.value.push(product);
  localStorage.setItem('cart', JSON.stringify(cart.value));
}

function logout() {
  axios.post('/logout')
  .then( res => {
    this.$router.push({name: 'user.login'})
  })
}

onMounted(async () => {
  try {
    //const { data } = await axios.get('https://03c39002b5867385.mokky.dev/products');
    const { data } = await axios.get('http://127.0.0.1:8000/api/products');
    products.value = data.data;
  } catch (err) {
    console.log(err);
  }
});
</script>
