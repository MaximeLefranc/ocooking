import axios from 'axios';

const apiClient = axios.create({
  baseURL: 'http://ocooking.api.local/wp-json',
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json',
  },
  timeout: 20000,
});

export default {
  async register(params) {
    try {
      const response = await apiClient.post('/wp/v2/users/register', params);
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  },
  async login(params) {
    try {
      const response = await apiClient.post('/jwt-auth/v1/token', params);
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  },
  async getRole(id) {
    try {
      const response = await apiClient.get(
        '/wp/v2/users/' + id + '?context=edit',
        {
          headers: {
            Authorization: 'Bearer ' + localStorage.getItem('token'),
          },
        }
      );
      return response.data;
    } catch (e) {
      return e.response.data;
    }
  },
};
