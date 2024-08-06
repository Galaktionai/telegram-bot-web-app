<template>
  <HeaderDetail titleDetail="Cheat meal"/>
  <div data-aos="fade-up" data-aos-duration="500" data-aos-once="true" style="margin: 100px 0;" class="container">
    <div class="item_detail">
      <swiper v-if="product.product_images.id"
        :pagination="{
          type: 'fraction',
        }"
        :loop="true"
        :modules="modules"
        class="mySwiper"
      >
        <swiper-slide v-for="image in product.product_images" :key="image.id">
          <img class="item_detail__img" :src="image.url" :alt="product.title">
        </swiper-slide>
      </swiper>
      <img v-else class="item_detail__img" :src="product.image_url" :alt="product.title">
      <h4 class="item_detail__title">{{ product.title }}</h4>
      <div class="item_detail__price__wrap">
        <span class="item_detail__price">{{ product.price }}</span>
        <div class="item_detail__count">
          <a class="item_detail__count__btn" href="#" @click.prevent="decrementQuantity">-</a>
          <span class="item_detail__count__num">{{ quantity }}</span>
          <a class="item_detail__count__btn" href="#" @click.prevent="incrementQuantity">+</a>
        </div>
      </div>
      <div class="item_detail__options">
        <span v-if="product.weight">{{ product.weight }} Гр</span>
        <span v-if="product.size">{{ product.size }}см</span>
        <span v-if="product.calories">{{ product.calories }}Ккл</span>
      </div>
      <span class="item_detail__h6">Описание</span>
      <p class="item_detail__info">{{ product.description }}</p>
      <ul>
        <li v-if="product.id" class="item_detail__info">
          Артикул: {{ product.id }}
        </li>
        <li  v-if="product.weight"class="item_detail__info">
          Вес: {{ product.weight }} Гр
        </li>
        <li v-if="product.size" class="item_detail__info">
          Размер: {{ product.size }} см
        </li>
        <li v-if="product.calories" class="item_detail__info">
          Калории: {{ product.calories }}
        </li>
        <li v-if="product.squirrels" class="item_detail__info">
          Белки: {{ product.squirrels }}
        </li>
        <li v-if="product.fats" class="item_detail__info">
          Жиры: {{ product.fats }}
        </li>
        <li v-if="product.carbohydrates" class="item_detail__info">
          Углеводы: {{ product.carbohydrates }}
        </li>
      </ul>
    </div>
  </div>
  <div class="order__btn__wrap">
    <div class="container">
      <a class="order__btn" href="#" @click="addToCart">Добавить в корзину</a>
    </div>
  </div>
  <!-- <pre>
    {{ product }}
  </pre> -->
</template>

<script>
import HeaderDetail from '../components/HeaderDetail.vue'
import axios from 'axios';
import AOS from 'aos'

import { Swiper, SwiperSlide } from 'swiper/vue';

import 'swiper/css';

import 'swiper/css/pagination';
import 'swiper/css/navigation';

import { Pagination, Navigation } from 'swiper/modules';

export default {
  components: { 
    HeaderDetail,
    Swiper,
    SwiperSlide,
  },
  setup() {
    return {
      modules: [Pagination, Navigation],
    };
  },
  props: ['id'],
  data() {
    return {
      product: null,
      quantity: 1,
      cart: JSON.parse(localStorage.getItem('cart')) || [],
    };
  },
  created() {
    this.fetchProduct(this.id);
  },
  mounted() {
    AOS.init()
  },
  methods: {
    fetchProduct(id) {
      axios.get(`http://127.0.0.1:8000/api/products/${id}`)
        .then(response => {
          this.product = response.data.data;
        })
        .catch(error => {
          console.error('Error fetching product:', error);
        });
    },
    addToCart() {
      const existingProduct = this.cart.find(item => item.id === this.product.id);

      if (existingProduct) {
        // Если продукт уже в корзине, увеличиваем его количество
        existingProduct.count += this.quantity;
      } else {
        // Если продукта нет в корзине, добавляем его с количеством равным quantity
        const productWithCount = { ...this.product, count: this.quantity };
        this.cart.push(productWithCount);
        this.$emit('add-to-cart', productWithCount);
      }
      localStorage.setItem('cart', JSON.stringify(this.cart)); // Сохранение корзины в localStorage
    },
    incrementQuantity() {
      this.quantity++;
    },
    decrementQuantity() {
      if (this.quantity > 1) {
        this.quantity--;
      }
    },
  }
}
</script>