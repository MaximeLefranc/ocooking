import { useUserStore } from '@/stores/UserStore';
import axios from 'axios';

const apiClient = axios.create({
  baseURL: 'http://ocooking.api.local/wp-json/wp/v2',
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json',
  },
  timeout: 20000,
});

export default {
  async findAll(page = 1) {
    return await apiClient.get('/recettes?_embed&per_page=10&page=' + page);
  },

  async findAllStatus() {
    const userStore = useUserStore();
    const response = await apiClient.get(
      '/recettes?per_page=100&_fields=title,id&status=publish,draft',
      {
        headers: {
          Authorization: 'Bearer ' + userStore.$state.token,
        },
      }
    );
    return response.data;
  },

  async findOne(id) {
    const userStore = useUserStore();
    try {
      const response = await apiClient.get('/recettes/' + id + '?_embed', {
        headers: {
          Authorization: userStore.$state.isConnected
            ? 'Bearer ' + userStore.$state.token
            : null,
        },
      });
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  },

  async create(params) {
    const userStore = useUserStore();
    try {
      const response = await apiClient.post('/recettes', params, {
        headers: {
          Authorization: 'Bearer ' + userStore.$state.token,
        },
      });
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  },

  async findAllDraftRecipies() {
    const userStore = useUserStore();
    try {
      const response = await apiClient.get('/recettes?_embed&status=draft', {
        headers: {
          Authorization: 'Bearer ' + userStore.$state.token,
        },
      });
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  },

  async update(id, params) {
    const userStore = useUserStore();
    try {
      const response = await apiClient.post('/recettes/' + id, params, {
        headers: {
          Authorization: 'Bearer ' + userStore.$state.token,
        },
      });
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  },

  async delete(id) {
    const userStore = useUserStore();
    try {
      const response = await apiClient.delete('/recettes/' + id, {
        headers: {
          Authorization: 'Bearer ' + userStore.$state.token,
        },
      });
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  },
};
