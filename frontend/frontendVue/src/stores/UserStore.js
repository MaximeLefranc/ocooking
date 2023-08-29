import { defineStore } from 'pinia';

export const useUserStore = defineStore('userStore', {
  state: () => ({
    token: null,
    role: null,
    isConnected: false,
  }),
  getters: {
    getIsConnected: (state) => {
      if (!state.token) {
        state.token = localStorage.getItem('token');
        if (state.token) {
          state.isConnected = true;
        }
      }
      return state;
    },
  },
  actions: {
    connect(newToken) {
      localStorage.setItem('token', newToken);
      this.token = newToken;
      this.isConnected = true;
    },
    disconnect() {
      localStorage.removeItem('token');
      this.token = null;
      this.role = null;
      this.isConnected = false;
    },
  },
});
