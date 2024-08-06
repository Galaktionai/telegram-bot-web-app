<template>
  <div class="title__wrap">
    <div class="container">
      <div class="title__flex">
        <a @click="$router.go(-1)">
          <svg class="basket__icon" width="24" height="24">
            <use href="/assets/img/sprite.svg#arrow-back"></use>
          </svg>
        </a>
        <h3 class="title">{{ titleDetail }}</h3>
        <RouterLink class="header_route_cart" to="/cart">
          <svg class="basket__icon" width="24" height="24">
            <use href="/assets/img/sprite.svg#basket"></use>
          </svg>
          <span v-if="cart.length >= 1" class="cart_length_header">{{ cart.length }}</span>
        </RouterLink>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const cart = ref([]);

onMounted( async () => {
  cart.value = JSON.parse(localStorage.getItem('cart')) || [];
});

const props = defineProps({
  titleDetail: String
});
</script>

<style>

</style>
