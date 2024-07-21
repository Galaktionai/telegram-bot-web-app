<template>
  <div style="margin: 100px 0;" class="container">
    <div class="products__search">
      <input v-model="searchQuery" class="products__search__input" placeholder="Поиск" type="search">
    </div>
    <div class="products__filter">
      <span>Категории</span>
      <div class="products__filters__wrap">
        <div
          @click="setCategory('')"
          :class="{ active: selectedCategory === '' }"
          class="products__filter__item"
        >
          <div class="products__filter__img">
            
          </div>
          <span class="products__filter__txt">
            Все
          </span>
        </div>
        <div
          v-for="category in categories"
          :key="category" 
          @click="setCategory(category)"
          :class="{ active: selectedCategory === category }"
          class="products__filter__item"
        >
          <div class="products__filter__img">
            
          </div>
          <span class="products__filter__txt">
            {{ category }}
          </span>
        </div>
      </div>
    </div>
    <div class="products">
      <div v-for="product in filteredProducts" :key="product.id" class="product__item">
        <router-link :to="{ name: 'productDetail', params: { id: product.id } }">
          <img class="product__item__img" :src="product.image_url" alt="">
          <h4 class="product__item__name">{{ product.title }}</h4>
          <span class="product__item__info">{{ product.info }}</span>
          <span class="product__item__price">{{ product.price }}</span>
        </router-link>
        <button @click="addToCart(product)">Add to Cart</button>
      </div>
    </div>
    {{ category }}
  </div>
</template>

<script setup>
import { defineEmits, ref, computed } from 'vue';

const props = defineProps(['products']);
const emit = defineEmits(['add-to-cart']);
const cart = ref([]);
const searchQuery = ref('');
const selectedCategory = ref('');
const categories = computed(() => {
  return [...new Set(props.products.map(product => product.category.title))];
}) 

function addToCart(product) {
  emit('add-to-cart', product);
  cart.value.push(product);
  localStorage.setItem('cart', JSON.stringify(cart.value)); // Сохранение корзины в localStorage
}

function setCategory(category) {
  selectedCategory.value = category;
}

const filteredProducts = computed(() => {
  return props.products.filter((product) => {
    const matchesSearch = product.title.toLowerCase().includes(searchQuery.value.toLowerCase()) || product.category.title.toLowerCase().includes(searchQuery.value.toLowerCase());
    const matchesCategory = !selectedCategory.value || product.category.title === selectedCategory.value;
    return matchesSearch && matchesCategory;
  });
});
</script>
