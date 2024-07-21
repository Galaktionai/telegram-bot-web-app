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
      path: '/profile',
      name: 'Profile',
      component: () => import('../views/Profile.vue')
    },
    {
      path: '/profile/orders',
      name: 'Orders',
      component: () => import('../views/Orders.vue')
    },
    {
      path: '/profile/orders/:id',
      name: 'OrderDetail',
      component: () => import('../views/OrderDetail.vue'),
      props: true
    },
  ]
})

export default router
