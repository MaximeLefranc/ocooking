<template>
  <main class="main-container">
    <div class="recipe-list">
      <h1>Recettes</h1>
      <input class="recipe-list-input" type="text" v-model="searchString">
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
    let response = await RecipeService.findAll();
    this.recipes = response.data;
    this.maxPages = response.headers['x-wp-totalpages'];
  },
  computed: {
    displayedRecipes() {
      return this.recipes.filter((recipe) => recipe.title.rendered.toLowerCase().includes(this.searchString.toLocaleLowerCase()));
    }
  },
  data() {
    return {
      maxPages: 0,
      currentPage: 1,
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