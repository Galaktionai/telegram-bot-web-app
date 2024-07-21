<template>
  <HeaderDetail titleDetail="Cheat meal"/>
  <div style="margin-top: 100px;" class="container">
    <div class="item_detail">
      <img class="item_detail__img" :src="product.image_url" alt="">
      <h4 class="item_detail__title">{{ product.title }}</h4>
      <div class="item_detail__price__wrap">
        <span class="item_detail__price">{{ product.price }}</span>
        <div class="item_detail__count">
          <a class="item_detail__count__btn" href="#" @click="decrementQuantity">-</a>
          <span class="item_detail__count__num">{{ quantity }}</span>
          <a class="item_detail__count__btn" href="#" @click="incrementQuantity">+</a>
        </div>
      </div>
      <div class="item_detail__options">
        <span>{{ product.gram }}Гр</span>
        <span>{{ product.centimeter }}см</span>
        <span>{{ product.kkal }}Ккл</span>
      </div>
      <span class="item_detail__h6">Описание</span>
      <p class="item_detail__info">{{ product.detailInfo }}</p>
    </div>
  </div>
  <div class="order__btn__wrap">
    <div class="container">
      <a class="order__btn" href="#" @click="addToCart">Добавить в корзину</a>
    </div>
  </div>
</template>

<script>
import HeaderDetail from '../components/HeaderDetail.vue'
import axios from 'axios';

export default {
  components: { HeaderDetail },
  props: ['id'],
  data() {
    return {
      product: null,
      quantity: 1,
    };
  },
  created() {
    this.fetchProduct(this.id);
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
      this.$emit('add-to-cart', { ...this.product, quantity: this.quantity });
    },
    incrementQuantity() {
      this.quantity++;
    },
    decrementQuantity() {
      if (this.quantity > 1) {
        this.quantity--;
      }
    }
  }
}
</script>
