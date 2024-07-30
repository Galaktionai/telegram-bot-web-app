<template>
  <HeaderDetail titleDetail="Cheat meal"/>
  <div class="cart" style="margin: 100px 0;">
    <div class="container">
      <div class="cart__tabs">
        <div class="cart__tab__item active">
          Доставка
        </div>
        <div class="cart__tab__item">
          Самовывоз
        </div>
      </div>
      <h6 class="cart__title">{{ cart.length }} товара на {{ total }} Р</h6>
      <div class="cart__item" v-for="(item, index) in cart" :key="index" @click="deleteCartItem(index)">
        <div class="cart__item__top">
          <img class="cart__item__top__img" :src="item.image_url" alt="">
          <div>
            <p class="cart__item__top__title">{{ item.title }}</p>
            <p class="cart__item__top__info">{{ item.info }}</p>
          </div>
        </div>
        <div class="cart__item__bottom">
          <span class="cart__item__bottom__price">{{ item.price }} ₽</span>
          <div>
            - 1 +
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="cart__form__div">
        <span class="cart__form__span">Введите ФИО</span>
        <input class="cart__form__input" v-model="full_name" placeholder="ФИО" type="text">
      </div>
      <div class="cart__form__div">
        <span class="cart__form__span">Введите адрес</span>
        <input class="cart__form__input" v-model="address" placeholder="Адрес" type="text">
      </div>
      <div class="cart__form__div__grid">
        <div class="cart__form__div">
          <span class="cart__form__span">Введите подъезд</span>
          <input class="cart__form__input" v-model="entrance" placeholder="Подъезд" type="text">
        </div>
        <div class="cart__form__div">
          <span class="cart__form__span">Введите квартиру</span>
          <input class="cart__form__input" v-model="apartment" placeholder="Квартира" type="text">
        </div>
      </div>
      <div class="cart__form__div">
        <span class="cart__form__span">Введите номер телефона</span>
        <input class="cart__form__input" v-model="phone_number" placeholder="номер телефона" type="text">
      </div>
    </div>
    <div class="order__btn__wrap">
      <div class="container">
        <button @click.prevent="submitOrder" class="order__btn">Оформить заказа на {{ total }} Р</button>
      </div>
    </div>
    <div class="container">
      <div class="cart__details">
        <div class="cart__detail__item">
          <span>{{ cart.length }} товара</span>
          <span>{{ total }} Р</span>
        </div>
        <div class="cart__detail__item">
          <span>Доставка</span>
          <span>{{deliveryPrice}} Р</span>
        </div>
        <div class="cart__detail__item">
          <span>Итого</span>
          <span>{{ total + deliveryPrice }} Р</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed, ref, onMounted } from 'vue';
import HeaderDetail from '../components/HeaderDetail.vue';
import axios from 'axios';

const cart = ref([]);
const full_name = ref('');
const address = ref('');
const entrance = ref('');
const apartment = ref('');
const phone_number = ref('');
const orders = ref([]);
const deliveryPrice = ref(500);
const discount = ref('');

onMounted(() => {
  cart.value = JSON.parse(localStorage.getItem('cart')) || [];
  orders.value = JSON.parse(localStorage.getItem('orders')) || [];
  
  let tg = window.Telegram.WebApp;
  tg.expand();
});

const total = computed(() => {
  return cart.value.reduce((sum, item) => sum + item.price, 0);
});

const deleteCartItem = (index) => {
  cart.value.splice(index, 1);
  localStorage.setItem('cart', JSON.stringify(cart.value));
};

const submitOrder = () => {
  // let tg = window.Telegram.WebApp;

  let data = {
    full_name: full_name.value,
    address: address.value,
    entrance: entrance.value,
    apartment: apartment.value,
    phone_number: phone_number.value,
    delivery_price: deliveryPrice.value.toString(),
    all_price: total.value.toString(),
    quantity_products: cart.value.length.toString(),
    discount: discount.value.toString(),
  };

  console.log(data)

  // Add the current order to orders array
  // orders.value.push(data);
  // localStorage.setItem('orders', JSON.stringify(orders.value));

  // // Reset cart and form fields after submitting order
  // cart.value = [];
  // localStorage.setItem('cart', JSON.stringify(cart.value));
  // full_name.value = '';
  // address.value = '';
  // entrance.value = '';
  // apartment.value = '';

  // // Send order data via Telegram WebApp
  // tg.sendData(JSON.stringify(data));
  // tg.close();


  axios.post('/api/order/', data)
  .then( res => {
    cart.value.forEach(product => {
      axios.post('/api/order_products', {product_id: product.id.toString(), order_id: res.data.id.toString()})
      .then( res => {
        console.log(res)
      })
    })
  })
  .catch(err => {
    console.error(err);
  });
  
};
</script>

<style scoped>
/* Add your styles here */
</style>
