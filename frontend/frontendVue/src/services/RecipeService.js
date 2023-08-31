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

  async findOne(id) {
    try {
      const response = await apiClient.get('/recettes/' + id + '?_embed');
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

  async recipeStatusPublished(id) {
    const userStore = useUserStore();
    try {
      const response = await apiClient.post(
        '/recettes/' + id,
        {
          status: 'publish',
        },
        {
          headers: {
            Authorization: 'Bearer ' + userStore.$state.token,
          },
        }
      );
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
