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
            <p class="cart__item__top__title">{{ item.name }}</p>
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
    <form action="" class="cart__form">
      <div class="container">
        <div class="cart__form__div">
          <span class="cart__form__span">Введите ФИО</span>
          <input class="cart__form__input" v-model="userName" placeholder="ФИО" type="text">
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
      </div>
      <div class="order__btn__wrap">
        <div class="container">
          <button @click.prevent="submitOrder" class="order__btn">Оформить заказа на {{ total }} Р</button>
        </div>
      </div>
    </form>
    <div class="container">
      <div class="cart__details">
        <div class="cart__detail__item">
          <span>{{ cart.length }} товара</span>
          <span>{{ total }} Р</span>
        </div>
        <div class="cart__detail__item">
          <span>Доставка</span>
          <span>500 Р</span>
        </div>
        <div class="cart__detail__item">
          <span>Итого</span>
          <span>{{ total + 500 }} Р</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed, ref, onMounted } from 'vue';
import HeaderDetail from '../components/HeaderDetail.vue';

const cart = ref([]);
const userName = ref('');
const address = ref('');
const entrance = ref('');
const apartment = ref('');
const orders = ref([]);
let orderIdCounter = ref(0); // Counter for order IDs

onMounted(() => {
  cart.value = JSON.parse(localStorage.getItem('cart')) || [];
  orders.value = JSON.parse(localStorage.getItem('orders')) || [];
  orderIdCounter.value = parseInt(localStorage.getItem('orderIdCounter')) || 0;

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
  let tg = window.Telegram.WebApp;

  
  //const orderIdCounter = Math.floor(Math.random() * 1000) + 2; // Example of generating random ID

  orderIdCounter.value++;
  localStorage.setItem('orderIdCounter', orderIdCounter.value.toString());
  const currentDate = new Date();
  const orderDate = currentDate.toLocaleDateString(); // Format date as per your requirement
  const orderTime = currentDate.toLocaleTimeString(); // Format time as per your requirement

  let data = {
    id: orderIdCounter.value,
    date: orderDate,
    time: orderTime,
    name: userName.value,
    address: address.value,
    entrance: entrance.value,
    apartment: apartment.value,
    items: cart.value,
    total: total.value // Assuming total includes delivery charge
  };

  // Add the current order to orders array
  orders.value.push(data);
  localStorage.setItem('orders', JSON.stringify(orders.value));

  // Reset cart and form fields after submitting order
  cart.value = [];
  localStorage.setItem('cart', JSON.stringify(cart.value));
  userName.value = '';
  address.value = '';
  entrance.value = '';
  apartment.value = '';

  // Send order data via Telegram WebApp
  tg.sendData(JSON.stringify(data));
  tg.close();
};
</script>

<style scoped>
/* Add your styles here */
</style>
