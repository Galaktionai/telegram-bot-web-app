<template>
  <Title title="Cheat meal"/>
  <Catalog :products="products" @add-to-cart="handleAddToCart"/>
  <Header/>
</template>

<script setup>
import { ref } from 'vue';
import Header from '../components/Header.vue';
import Title from '../components/Title.vue';
import Catalog from '../components/Catalog/Catalog.vue';

const props = defineProps(['products']);
const cart = ref([]);

function handleAddToCart(product) {
  cart.value.push(product);
}
</script>
