<template>
  <main class="main-container">
    <div class="recipe-list">
      <h1>Recettes</h1>
      <input class="recipe-list-input" type="text" v-model="searchString">
      <select class="recipe-list-select" v-model="ingredientSearch">
        <option value="0">-</option>
        <option v-for="ingredient in ingredients" v-bind:key="ingredient.id" v-bind:value="ingredient.id">{{
          ingredient.name }}</option>
      </select>
      <div>
        <button v-if="currentPage !== 1" v-on:click="previousPage">Page Précédente</button>
        <button v-if="maxPages > this.currentPage" v-on:click="nextPage">Page Suivante</button>
      </div>
      <RecipeComponent v-for="recipe in    displayedRecipes   " v-bind:key="recipe.id"
        v-bind:title="recipe.title.rendered" v-bind:description="recipe.excerpt.rendered"
        v-bind:image="recipe.featured_media ? recipe._embedded['wp:featuredmedia'][0].source_url : 'https://source.unsplash.com/collection/157&random=100'" />
    </div>
  </main>
</template>

<script>
import RecipeComponent from '@/components/RecipeComponent';
import RecipeService from '@/services/RecipeService.js';
import IngredientService from '@/services/IngredientService.js';

export default {
  name: 'RecipesContainerComponent',

  components: {
    RecipeComponent
  },

  methods: {
    async nextPage() {
      this.currentPage++;
      const response = await RecipeService.findAll(this.currentPage);
      this.recipes = response.data;
      this.maxPages = response.headers['x-wp-totalpages'];
    },

    async previousPage() {
      this.currentPage--;
      const response = await RecipeService.findAll(this.currentPage);
      this.recipes = response.data;
      this.maxPages = response.headers['x-wp-totalpages'];
    },
  },

  async mounted() {
    const recipiesResponse = await RecipeService.findAll();
    this.recipes = recipiesResponse.data;
    this.maxPages = recipiesResponse.headers['x-wp-totalpages'];
    const ingredientsResponse = await IngredientService.findAllUsed();
    this.ingredients = ingredientsResponse.data;
  },

  computed: {
    displayedRecipes() {
      if (this.searchString !== '' && parseInt(this.ingredientSearch) !== 0) {
        return this.recipes.filter((recipe) => recipe.title.rendered.toLowerCase().includes(this.searchString.toLocaleLowerCase()) && recipe.ingredients.includes(this.ingredientSearch));
      } else if (this.searchString === '' && parseInt(this.ingredientSearch) !== 0) {
        return this.recipes.filter((recipe) => recipe.ingredients.includes(this.ingredientSearch));
      } else {
        return this.recipes.filter((recipe) => recipe.title.rendered.toLowerCase().includes(this.searchString.toLocaleLowerCase()));
      }
    }
  },

  data() {
    return {
      maxPages: 0,
      currentPage: 1,
      searchString: "",
      recipes: [],
      ingredients: [],
      ingredientSearch: 0,
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
    border-top-left-radius: .5rem;
    border-bottom-left-radius: .5rem;
    border: 1px solid grey;
    border-right: none;
    padding: .5rem
  }

  &-select {
    margin-bottom: 1rem;
    border-top-right-radius: .5rem;
    border-bottom-right-radius: .5rem;
    border: 1px solid grey;
    border-left: none;
    padding: .45rem
  }
}
</style>