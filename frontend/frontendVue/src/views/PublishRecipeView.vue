<template>
  <HeaderComponent />
  <h1>Publications de Recettes</h1>
  <FooterComponent />
</template>

<script>
// @ is an alias to /src
import FooterComponent from '@/components/FooterComponent.vue';
import HeaderComponent from '@/components/HeaderComponent.vue';


export default {
  name: 'PublisRecipeView',
  components: {
    HeaderComponent,
    FooterComponent,
  }
}
</script>