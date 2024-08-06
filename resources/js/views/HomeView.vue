<template>
  <Title title="GALA"/>
  <Catalog :products="products"/>
  <Header/>
</template>

<script setup>
import { ref } from 'vue';
import Header from '../components/Header.vue';
import Title from '../components/Title.vue';
import Catalog from '../components/Catalog/Catalog.vue';

const props = defineProps(['products']);
</script>
