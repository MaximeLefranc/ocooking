<template>
  <HeaderComponent />
  <RecipeDetailComponent v-bind:title="title" v-bind:content="content" v-bind:image="image"
    v-bind:ingredients="ingredients" v-bind:comments="comments" />
  <FooterComponent />
</template>

<script>
import FooterComponent from '@/components/FooterComponent';
import HeaderComponent from '@/components/HeaderComponent';
import RecipeDetailComponent from '@/components/RecipeDetailComponent';
import RecipeService from '@/services/RecipeService';

export default {
  name: 'RecipeView',
  components: { HeaderComponent, FooterComponent, RecipeDetailComponent },
  async mounted() {
    const recipe = await RecipeService.findOne(this.$route.params.id);
    if (recipe.code && recipe.code === 'rest_post_invalid_id') {
      this.$router.push('/');
    }
    this.content = recipe.content.rendered;
    this.title = recipe.title.rendered;
    this.image = recipe.featured_media ? recipe._embedded['wp:featuredmedia'][0].source_url : 'https://source.unsplash.com/collection/157&random=100';
    this.ingredients = recipe.ingredients.length ? recipe._embedded["wp:term"][0] : [];
    this.comments = recipe._embedded && recipe._embedded.replies ? recipe._embedded.replies[0] : [];
  },
  data() {
    return {
      title: '',
      image: '',
      content: '',
      ingredients: [],
      comments: [],
    }
  }
}
</script>

<style lang="scss" scoped></style>