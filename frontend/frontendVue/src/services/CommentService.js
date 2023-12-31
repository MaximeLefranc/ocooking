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
  async findAllByRecipeID(id) {
    return await apiClient.get('/comments?post=' + id);
  },

  async create(params) {
    const userStore = useUserStore();
    try {
      const response = await apiClient.post('/comments', params, {
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
