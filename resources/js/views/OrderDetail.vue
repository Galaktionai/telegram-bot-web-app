<template>
  <HeaderDetail titleDetail="GALA"/>
  <div class="order__detail" v-if="loading">
    <p>Загрузка...</p>
  </div>
  <div class="order__detail" v-else-if="order">
    <div class="container">
      <div class="order__detail__top">
        <h5 class="order__detail__top__title">Заказ № {{ order.id }}</h5>
        <span class="status__detail green">Завершено</span>
      </div>
      <div class="order__detail__grid">
        <div class="order__detail__item" v-for="(item, index) in order.items" :key="index">
          <div class="order__detail__item__img">
            <img :src="item.image" alt="">
          </div>
          <div>
            <span class="order__detail__item__title">{{ item.name }}</span>
            <span class="order__detail__item__info">{{ item.info }}</span>
            <span class="order__detail__item__price">{{ item.price }} ₽</span>
          </div>
        </div>
      </div>
      <div class="order__detail__details">
        <div class="order__detail__details__txt">
          <span>Дата и время</span>
          <span>{{ order.date }} {{ order.time }}</span>
        </div>
        <div class="order__detail__details__txt">
          <span>Адрес</span>
          <span>{{ order.date }} {{ order.address }}</span>
        </div>
        <div class="order__detail__details__txt">
          <span>Подъезд</span>
          <span>{{ order.date }} {{ order.entrance }}</span>
        </div>
        <div class="order__detail__details__txt">
          <span>Квартира</span>
          <span>{{ order.date }} {{ order.apartment }}</span>
        </div>
        <div class="order__detail__details__txt">
          <span>Доставка</span>
          <span>500 ₽</span>
        </div>
        <div class="order__detail__details__txt">
          <span>{{ order.items.length }} товара</span>
          <span>{{ order.total }}</span>
        </div>
        <div class="order__detail__details__txt">
          <span>Итого</span>
          <span>{{ order.total + 500 }} ₽</span>
        </div>
      </div>
    </div>
  </div>
  <Header/>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import HeaderDetail from '../components/HeaderDetail.vue'
import Header from '../components/Header.vue';

const route = useRoute();
const order = ref(null);
const loading = ref(true);

onMounted(() => {
  const orders = JSON.parse(localStorage.getItem('orders')) || [];
  const orderId = parseInt(route.params.id);
  order.value = orders.find(order => order.id === orderId);

  // Имитация задержки загрузки данных для демонстрации
  setTimeout(() => {
    loading.value = false;
  }, 500); // 500 мс задержка
});
</script>

<style scoped>
/* Add your styles here */
</style>
