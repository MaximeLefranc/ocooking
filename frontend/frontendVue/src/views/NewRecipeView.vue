<template>
  <HeaderComponent />
  <CreateRecipeFormComponent />
  <FooterComponent />
</template>

<script>
// @ is an alias to /src
import CreateRecipeFormComponent from '@/components/CreateRecipeFormComponent.vue';
import FooterComponent from '@/components/FooterComponent.vue';
import HeaderComponent from '@/components/HeaderComponent.vue';


export default {
  name: 'NewRecipeView',
  components: {
    HeaderComponent,
    FooterComponent,
    CreateRecipeFormComponent
  }
}
</script>