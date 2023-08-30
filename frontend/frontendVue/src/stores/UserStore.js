import { defineStore } from 'pinia';

export const useUserStore = defineStore('userStore', {
  state: () => ({
    token: localStorage.getItem('token'),
    role: localStorage.getItem('role'),
    isConnected: localStorage.getItem('token') ? true : false,
  }),
  getters: {
    getIsConnected: (state) => {
      if (state.token) {
        state.isConnected = true;
      }
      return state.isConnected;
    },
    canValidatePendingRecipies: (state) => {
      const authorizedRoles = ['administrator', 'cuisinier'];
      if (authorizedRoles.includes(state.role)) {
        return true;
      }
      return false;
    },
  },
  actions: {
    connect(newToken) {
      localStorage.setItem('token', newToken);
      this.token = newToken;
      this.isConnected = true;
    },
    saveRole(role) {
      localStorage.setItem('role', role);
      this.role = role;
    },
    disconnect() {
      localStorage.removeItem('token');
      localStorage.removeItem('role');
      this.token = null;
      this.role = null;
      this.isConnected = false;
    },
  },
});
