
<template>
  <HeaderComponent />
  <EditRecipeFormComponent />
  <FooterComponent />
</template>

<script>
// @ is an alias to /src
import EditRecipeFormComponent from '@/components/EditRecipeFormComponent.vue';
import FooterComponent from '@/components/FooterComponent.vue';
import HeaderComponent from '@/components/HeaderComponent.vue';



export default {
  name: 'EditRecipeView',
  components: {
    HeaderComponent,
    FooterComponent,
    EditRecipeFormComponent
  },
}
</script>

<style lang="scss" scoped></style>