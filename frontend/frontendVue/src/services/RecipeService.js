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
};
