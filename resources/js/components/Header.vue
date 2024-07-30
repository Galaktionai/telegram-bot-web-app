<template>
  <header>
    <div class="header">
      <div class="container">
        <div class="header__wrap">
          <nav>
            <ul>
              <li>
                <RouterLink class="header__wrap__a" to="/">
                  <svg  class="header__wrap__a__svg_fill" width="24" height="24">
                    <use href="/assets/img/sprite.svg#home-icon"></use>
                  </svg>
                  <span class="header__wrap__a__span">Главная</span>
                </RouterLink>
              </li>
              <li>
                <RouterLink class="header__wrap__a active" to="/rates">
                  <svg class="header__wrap__a__svg_stroke" width="24" height="24">
                    <use href="/assets/img/sprite.svg#stock"></use>
                  </svg>
                  <span class="header__wrap__a__span">Акции</span>
                </RouterLink>
              </li>
              <li>
                <RouterLink class="header__wrap__a" to="/cart">
                  <svg class="header__wrap__a__svg_stroke" width="24" height="24">
                    <use href="/assets/img/sprite.svg#basket"></use>
                  </svg>
                  <span class="header__wrap__a__span">Корзина</span>
                </RouterLink>
              </li>
              <li>
                <RouterLink class="header__wrap__a" to="/other">
                  <svg class="header__wrap__a__svg_stroke" width="24" height="24">
                    <use href="/assets/img/sprite.svg#profile-icon"></use>
                  </svg>
                  <span class="header__wrap__a__span">Профиль</span>
                </RouterLink>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import { RouterLink } from 'vue-router'
</script>

<style>

</style>
