import { createApp } from 'vue';
import App from './App.vue';
import userStore from './stores/UserStore';
import { createPinia } from 'pinia';
import router from './router';

const app = createApp(App);
app.use(createPinia());
app.use(userStore);
app.use(router);

router.isReady().then(() => {
  app.mount('#app');
});
