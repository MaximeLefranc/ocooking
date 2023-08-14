<template>
  <main class="main-container">
    <div class="recipe-list">
      <h1>Recettes</h1>
      <input class="recipe-list-input" type="text" v-model="searchString">
      <RecipeComponent v-for="recipe in    displayedRecipes   " v-bind:key="recipe.id"
        v-bind:title="recipe.title.rendered" v-bind:description="recipe.excerpt.rendered"
        v-bind:image="recipe.featured_media ? recipe._embedded['wp:featuredmedia'][0].source_url : 'https://source.unsplash.com/collection/157&random=100'" />
    </div>
  </main>
</template>

<script>
import RecipeComponent from '@/components/RecipeComponent';
import RecipeService from '@/services/RecipeService.js';

export default {
  name: 'RecipesContainerComponent',
  components: {
    RecipeComponent
  },
  async mounted() {
    this.recipes = await RecipeService.findAll();
  },
  computed: {
    displayedRecipes() {
      return this.recipes.filter((recipe) => recipe.title.rendered.toLowerCase().includes(this.searchString.toLocaleLowerCase()));
    }
  },
  data() {
    return {
      searchString: "",
      recipes: []
    }
  }
}
</script>

<style lang="scss" scoped>
.main-container {
  width: 90%;
  margin-left: auto;
  margin-right: auto;
  padding-top: 5rem;
  padding-bottom: 5rem;
}

.media-image {
  min-height: 300px;
  background-position: center;
  background-size: cover;
  border-radius: 1rem;
  margin-bottom: 1rem;
}

.recipe-list {
  text-align: center;

  &-input {
    margin-bottom: 1rem;
    border-radius: .5rem;
    border: 1px solid grey;
    padding: .5rem
  }
}
</style>