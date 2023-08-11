<template>
  <HeaderComponent />
  <FooterComponent />
</template>

<script>
// @ is an alias to /src
import FooterComponent from '@/components/FooterComponent.vue';
import HeaderComponent from '@/components/HeaderComponent.vue';

export default {
  name: 'HomeView',
  components: {
    HeaderComponent,
    FooterComponent
  }
}
</script>