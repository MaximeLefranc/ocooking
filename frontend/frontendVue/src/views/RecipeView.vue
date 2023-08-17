<template>
  <HeaderComponent />
  <h1>RecipeView</h1>
  <FooterComponent />
</template>

<script>
import FooterComponent from '@/components/FooterComponent.vue';
import HeaderComponent from '@/components/HeaderComponent.vue';

export default {
  name: 'RecipeView',
  components: { HeaderComponent, FooterComponent }
}
</script>

<style lang="scss" scoped></style>