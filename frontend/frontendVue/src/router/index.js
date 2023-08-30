import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import { useUserStore } from '@/stores/UserStore';

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
      const userStore = useUserStore();
      if (userStore.$state.isConnected) {
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
      const userStore = useUserStore();
      if (userStore.$state.isConnected) {
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
    path: '/recette/validation',
    name: 'recette_validation ',
    component: () =>
      import(/* webpackChunkName: "about" */ '../views/PublishRecipeView.vue'),
  },
  {
    path: '/recette/creation',
    name: 'recette_creation',
    component: () =>
      import(/* webpackChunkName: "about" */ '../views/NewRecipeView.vue'),
    beforeEnter: () => {
      const userStore = useUserStore();
      if (!userStore.$state.isConnected) {
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
