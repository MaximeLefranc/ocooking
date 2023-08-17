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
  async register(params) {
    try {
      const response = await apiClient.post('/users/register', params);
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  },
};
