<template>
  <Title title="GALA"/>
  <div class="profile">
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
import Header from '../components/Header.vue';
import Title from '../components/Title.vue';
</script>
