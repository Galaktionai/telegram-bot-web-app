<template>
  <Title title="GALA"/>
  <div class="profile">
    <div class="container">
      <div class="profile__wrap">
        <img class="profile__wrap__img" src="https://i.pinimg.com/originals/1f/b3/b8/1fb3b8ef5c071daa09749dedf3951c6e.jpg" alt="">
        <div>
          <div class="profile__wrap__info">
            <span class="profile__wrap__name">{{user.name}}</span>
            <span class="profile__wrap__all_name">{{user.first_name}} {{user.last_name}} </span>
            <span class="profile__wrap__all_name">{{user.id}}</span>
          </div>
        </div>
      </div>
      <div class="profile__inputs">
        <div class="cart__form__div">
          <span class="cart__form__span">Введите номер телефона</span>
          <input class="cart__form__input" placeholder="Номер телефона" :value="user.phone_number" type="text">
        </div>
        <div class="cart__form__div">
          <span class="cart__form__span">Введите адрес</span>
          <input class="cart__form__input" placeholder="Адрес" :value="user.address" type="text">
        </div>
        <div class="cart__form__div">
          <span class="cart__form__span">Введите подъезд</span>
          <input class="cart__form__input" placeholder="Подъезд" :value="user.entrance" type="text">
        </div>
        <div class="cart__form__div">
          <span class="cart__form__span">Введите квартиру</span>
          <input class="cart__form__input" placeholder="Квартира" :value="user.apartment" type="text">
        </div>
      </div>
      <pre>
        {{user}}
      </pre>
      
    </div>
  </div>
  <Header/>
</template>



<script setup>
import { onMounted, ref } from 'vue';
import Header from '../components/Header.vue';
import Title from '../components/Title.vue';
import axios from 'axios';

const user = ref([])

onMounted(async () => {
  await axios
    .get('http://127.0.0.1:8000/api/user')
    .then(response => {
      user.value = response.data
    })
})
</script>
