<template>
  <HeaderComponent />
  <RecipesContainerComponent />
  <FooterComponent />
</template>

<script>
// @ is an alias to /src
import FooterComponent from '@/components/FooterComponent.vue';
import HeaderComponent from '@/components/HeaderComponent.vue';
import RecipesContainerComponent from '@/components/RecipesContainerComponent.vue';

export default {
  name: 'HomeView',
  components: {
    HeaderComponent,
    FooterComponent,
    RecipesContainerComponent
  }
}
</script>