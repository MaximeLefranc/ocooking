<template>
  <HeaderComponent />
  <h1>RecipeView</h1>
  <FooterComponent />
</template>

<script>
import FooterComponent from '@/components/FooterComponent';
import HeaderComponent from '@/components/HeaderComponent';
import RecipeService from '@/services/RecipeService';

export default {
  name: 'RecipeView',
  components: { HeaderComponent, FooterComponent },
  async mounted() {
    const recipe = await RecipeService.findOne(this.$route.params.id);
    if (recipe.code && recipe.code === 'rest_post_invalid_id') {
      this.$router.push('/');
    }
  }
}
</script>

<style lang="scss" scoped></style>