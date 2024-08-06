<template>
  <Title title="GALA"/>
  <div class="profile">
    <div class="container">
      <h2>
        Заказы
      </h2>
      <div class="orders" v-auto-animate>
        <router-link :to="{ name: 'OrderDetail', params: { id: item.id } }" class="order__item" v-for="(item, index) in visibleOrders" :key="index">
          <div class="order__item__top">
            <span class="order__item__num">Заказ № {{ item.id }}</span>
            <span v-if="item.status == 'Принят'" class="order__item__status accept">{{ item.status }}</span>
            <span v-if="item.status == 'Завершен'" class="order__item__status completed">{{ item.status }}</span>
            <span v-if="item.status == 'Отменен'" class="order__item__status canceled">{{ item.status }}</span>
          </div>
          <div class="order__item__flex">
            <span class="order__item__date">{{ item.date }}</span>
            <span class="order__item__price">{{ item.all_price }} ₽</span>
          </div>
        </router-link>
        <!-- <pre>
          {{ user }}
        </pre>
        <pre>
          {{ orders }}
        </pre> -->
      </div>
      <div class="show_more_wrap">
        <button class="show_more_wrap__btn" v-if="visibleOrders.length < orders.length" @click="showMore">Смотреть еще</button>
      </div>
    </div>
  </div>
  <Header/>
</template>

<script setup>
import { computed, ref, onMounted } from 'vue';
import axios from 'axios';

import Header from '../components/Header.vue';
import Title from '../components/Title.vue';

const orders = ref([]);
const user = ref([]);

const ordersToShow = ref(12);

onMounted(async () => {
  await axios
    .get('http://127.0.0.1:8000/api/user')
    .then(response => {
      user.value = response.data
    })

  await axios
    .get('http://127.0.0.1:8000/api/orders?user_id=' + user.value.id)
    .then(response => {
      orders.value = response.data.data.reverse()
    })
})

const visibleOrders = computed(() => {
  return orders.value.slice(0, ordersToShow.value);
});

// Method to show more products
const showMore = () => {
  ordersToShow.value += 12;
};

</script>
