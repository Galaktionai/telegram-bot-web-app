<template>
  <div style="margin: 100px 0;" class="container">
    <div data-aos="fade-up" data-aos-duration="500" data-aos-once="true" class="products__search">
      <input v-model="searchQuery" class="products__search__input" placeholder="Поиск" type="search">
    </div>
    <div data-aos="fade-up" data-aos-duration="500" data-aos-once="true" class="products__filter">
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
    <div v-auto-animate class="products">
      <div v-for="product in visibleProducts" :key="product.id" class="product__item">
        <router-link :to="{ name: 'productDetail', params: { id: product.id } }">
          <img class="product__item__img" :src="product.image_url" alt="">
          <h4 class="product__item__name">{{ product.title }}</h4>
          <span class="product__item__info">{{ product.info }}</span>
          <span class="product__item__price">{{ product.price }}</span>
        </router-link>
        <!-- <button @click="addToCart(product)">Add to Cart</button> -->
      </div>
    </div>
    <div class="show_more_wrap">
      <button class="show_more_wrap__btn" v-if="visibleProducts.length < filteredProducts.length" @click="showMore">Смотреть еще</button>
    </div>
  </div>
</template>

<script setup>
import { defineEmits, ref, computed, onMounted } from 'vue';
import AOS from 'aos'

const props = defineProps(['products']);
const emit = defineEmits(['add-to-cart']);
const cart = ref([]);
const searchQuery = ref('');
const selectedCategory = ref('');
const productsToShow = ref(16);

const categories = computed(() => {
  return [...new Set(props.products.map(product => product.category.title))];
}) 

const addToCart = (product) => {
  const existingProduct = cart.value.find(item => item.id === product.id);

  if (existingProduct) {
    // If product is already in the cart, increase its count
    existingProduct.count++;
  } else {
    // If product is not in the cart, add it with count 1
    const productWithCount = { ...product, count: 1 };
    cart.value.push(productWithCount);
    emit('add-to-cart', productWithCount);
  }
  localStorage.setItem('cart', JSON.stringify(cart.value)); // Save cart to localStorage
};

function setCategory(category) {
  selectedCategory.value = category;
}

onMounted(() => {
  AOS.init()
});

const filteredProducts = computed(() => {
  return props.products.filter((product) => {
    const matchesSearch = product.title.toLowerCase().includes(searchQuery.value.toLowerCase()) || product.category.title.toLowerCase().includes(searchQuery.value.toLowerCase());
    const matchesCategory = !selectedCategory.value || product.category.title === selectedCategory.value;
    return matchesSearch && matchesCategory;
  }).reverse();
});

const visibleProducts = computed(() => {
  return filteredProducts.value.slice(0, productsToShow.value);
});

// Method to show more products
const showMore = () => {
  productsToShow.value += 16;
};
</script>
