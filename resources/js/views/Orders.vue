<template>
  <Title title="GALA"/>
  <div class="profile">
    <div class="container">
      <h2>
        Заказы
      </h2>
      <div class="orders">
        <router-link :to="{ name: 'OrderDetail', params: { id: item.id } }" class="order__item" v-for="(item, index) in orders" :key="index">
          <span class="order__item__num">Заказ № {{ item.id }}</span>
          <div class="order__item__flex">
            <span class="order__item__date">{{ item.date }}. в {{ item.time }}</span>
            <span class="order__item__price">{{ item.total }} ₽</span>
          </div>
        </router-link>
      </div>
    </div>
  </div>
  <Header/>
</template>

<script setup>
import { computed, ref, onMounted } from 'vue';

import Header from '../components/Header.vue';
import Title from '../components/Title.vue';

const orders = ref([]);

onMounted(() => {
  // Имитация задержки загрузки данных для демонстрации
  setTimeout(() => {
    orders.value = JSON.parse(localStorage.getItem('orders')) || [];
  }, 500); // 500 мс задержка
});

</script>
