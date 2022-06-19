import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import Top from './views/Top.vue'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/app/index',
    name: 'index',
    component: Top,
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
