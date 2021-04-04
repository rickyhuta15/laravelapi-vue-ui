import { createRouter, createWebHashHistory } from 'vue-router'
import Home from '../views/friends/Home.vue'
import Createfriends from'../views/friends/Createfriends.vue'
import Editfriends from'../views/friends/Editfriends.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/createfriends',
    name: 'Createfriends',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: Createfriends
  },

  {
    path: '/editfriends/:id',
    name: 'Editfriends',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component:Editfriends
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
