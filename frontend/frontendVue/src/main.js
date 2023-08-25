import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import userStore from './stores/UserStore';
import { createPinia } from 'pinia';

const app = createApp(App);
app.use(createPinia());
app.use(userStore);
app.use(router);
app.mount('#app');
