import { defineStore } from 'pinia';

export const useUserStore = defineStore('userStore', {
  state: () => ({
    token: null,
    role: null,
  }),
  getters: {},
  actions: {},
});
