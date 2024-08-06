<template>
  <HeaderDetail titleDetail="GALA"/>
  <div data-aos="fade-up" data-aos-duration="500" data-aos-once="true" class="order__detail" v-if="loading">
    <p>Загрузка...</p>
  </div>
  <div data-aos="fade-up" data-aos-duration="500" data-aos-once="true" class="order__detail" v-else-if="order">
    <!-- <pre>
      {{ order }}
    </pre> -->
    <div class="container">
      <div class="order__detail__top">
        <h5 class="order__detail__top__title">Заказ № {{ order.id }}</h5>
        <span v-if="order.status == 'Принят'" class="status__detail accept">{{ order.status }}</span>
        <span v-if="order.status == 'Завершен'" class="status__detail completed">{{ order.status }}</span>
        <span v-if="order.status == 'Отменен'" class="status__detail canceled">{{ order.status }}</span>
      </div>
      <div class="order__detail__grid">
        <div class="order__detail__item" v-for="(item, index) in order.order_products" :key="item.id">
          <div class="order__detail__item__img">
            <img :src="item.preview_image" alt="">
          </div>
          <div>
            <span class="order__detail__item__title">{{ item.title }}</span>
            <span class="order__detail__item__info">{{ item.info }}</span>
            <span class="order__detail__item__price">{{ item.price }} ₽</span>
          </div>
        </div>
      </div>
      <div class="order__detail__details">
        <div class="order__detail__details__txt">
          <span>Дата и время</span>
          <span>{{ order.date }}</span>
        </div>
        <div class="order__detail__details__txt">
          <span>Тип заказа</span>
          <span>{{ order.type }}</span>
        </div>
        <div v-if="order.address" class="order__detail__details__txt">
          <span>Адрес</span>
          <span>{{ order.address }}</span>
        </div>
        <div v-if="order.entrance" class="order__detail__details__txt">
          <span>Подъезд</span>
          <span>{{ order.entrance }}</span>
        </div>
        <div v-if="order.apartment" class="order__detail__details__txt">
          <span>Квартира</span>
          <span>{{ order.apartment }}</span>
        </div>
        <div v-if="order.address" class="order__detail__details__txt">
          <span>Доставка</span>
          <span>500 ₽</span>
        </div>
        <div v-if="order.all_price" class="order__detail__details__txt">
          <span>2 товара</span>
          <span>{{ order.all_price }} ₽</span>
        </div>
        <div v-if="order.all_price" class="order__detail__details__txt">
          <span>Итого</span>
          <span>{{ Number(order.all_price) + 500 }} ₽</span>
        </div>
      </div>
    </div>
  </div>
  <Header/>
</template>

<script setup>
import HeaderDetail from '../components/HeaderDetail.vue'
import Header from '../components/Header.vue';
import { onMounted, ref, computed } from 'vue';
import { useRoute } from 'vue-router';
import axios from 'axios';
import AOS from 'aos'

// Получаем параметр id из маршрута
const route = useRoute();
const id = ref(route.params.id);

const order = ref({});

// Метод для получения деталей заказа
const fetchOrderDetails = async () => {
  try {
    const response = await axios.get(`http://127.0.0.1:8000/api/orders/${id.value}`);
    order.value = response.data.data;
  } catch (error) {
    console.error('Error fetching order details:', error);
  }
};

// Вызываем метод при монтировании компонента
onMounted(() => {
  fetchOrderDetails();
  AOS.init()
});
</script>

<style scoped>
/* Add your styles here */
</style>
