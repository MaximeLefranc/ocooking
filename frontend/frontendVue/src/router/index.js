import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
  },
  {
    path: '/connexion',
    name: 'connexion',
    component: () =>
      import(/* webpackChunkName: "about" */ '../views/ConnectView.vue'),
  },
  {
    path: '/inscription',
    name: 'inscription',
    component: () =>
      import(/* webpackChunkName: "about" */ '../views/RegisterView.vue'),
  },
  {
    path: '/recette',
    name: 'recette',
    component: () =>
      import(/* webpackChunkName: "about" */ '../views/RecipeView.vue'),
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
