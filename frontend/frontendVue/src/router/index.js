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
    beforeEnter: () => {
      if (localStorage.getItem('token')) {
        return {
          path: '/',
        };
      }
    },
  },
  {
    path: '/inscription',
    name: 'inscription',
    component: () =>
      import(/* webpackChunkName: "about" */ '../views/RegisterView.vue'),
    beforeEnter: () => {
      if (localStorage.getItem('token')) {
        return {
          path: '/',
        };
      }
    },
  },
  {
    path: '/recette/:id(\\d+)',
    name: 'recette',
    component: () =>
      import(/* webpackChunkName: "about" */ '../views/RecipeView.vue'),
  },
  {
    path: '/recette/creation',
    name: 'recette_creation',
    component: () =>
      import(/* webpackChunkName: "about" */ '../views/NewRecipeView.vue'),
    beforeEnter: () => {
      if (!localStorage.getItem('token')) {
        return {
          path: '/',
        };
      }
    },
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
