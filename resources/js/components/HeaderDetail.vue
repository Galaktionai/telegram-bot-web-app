<template>
  <div class="title__wrap">
    <div class="container">
      <div class="title__flex">
        <a @click="$router.go(-1)"><--</a>
        <h3 class="title">{{ titleDetail }}</h3>
        <RouterLink to="/cart">
          <svg class="basket__icon" width="24" height="24">
            <use href="/assets/img/sprite.svg#basket"></use>
          </svg>
        </RouterLink>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['titleDetail'],
}
</script>

<style>

</style>
