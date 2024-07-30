import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/rates',
      name: 'rates',
      component: () => import('../views/Rates.vue')
    },
    {
      path: '/item/:id',
      name: 'productDetail',
      component: () => import('../views/productDetail.vue'),
      props: true
    },
    {
      path: '/cart',
      name: 'Cart',
      component: () => import('../views/Cart.vue')
    },
    {
      path: '/other',
      name: 'Other',
      component: () => import('../views/Other.vue')
    },
    {
      path: '/other/profile',
      name: 'Profile',
      component: () => import('../views/Profile.vue')
    },
    {
      path: '/other/orders',
      name: 'Orders',
      component: () => import('../views/Orders.vue')
    },
    {
      path: '/other/orders/:id',
      name: 'OrderDetail',
      component: () => import('../views/OrderDetail.vue'),
      props: true
    },
    {
      path: '/get/',
      name: 'get',
      component: () => import('../components/Get.vue')
    },
    {
      path: '/user/login/',
      name: 'user.login',
      component: () => import('../views/Login.vue')
    },
    {
      path: '/user/registration',
      name: 'user.registration',
      component: () => import('../views/Registration.vue')
    },
  ]
})

export default router
