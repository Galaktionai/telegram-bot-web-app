<template>
  <Title title="GALA"/>
  <div data-aos="fade-up" data-aos-duration="500" data-aos-once="true" class="profile">
    <div class="container">
      <RouterLink class="profile__item" to="/other/profile/">
        Профиль
      </RouterLink>
      <RouterLink class="profile__item" to="/other/orders">
        Заказы
      </RouterLink>
    </div>
  </div>
  <Header/>
</template>

<script setup>
import { onMounted } from 'vue';
import Header from '../components/Header.vue';
import Title from '../components/Title.vue';
import AOS from 'aos'

onMounted(() => {
  AOS.init()
});
</script>
