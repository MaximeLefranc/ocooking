<template>
  <HeaderComponent />
  <main class="main-container">
    <h1 class="title">Recettes en attentes de validation</h1>
    <RecipeDraftComponent v-for="draftRecipe in draftRecipies" :key="draftRecipe.id" :id="draftRecipe.id"
      :title="draftRecipe.title.rendered" :description="draftRecipe.excerpt.rendered"
      :image="draftRecipe.featured_media ? draftRecipe._embedded['wp:featuredmedia'][0].source_url : 'https://source.unsplash.com/collection/157&random=100'"
      v-on:NewChangeInRecipeDraftComponent="updateList" />
  </main>
  <FooterComponent />
</template>

<script>
// @ is an alias to /src
import FooterComponent from '@/components/FooterComponent.vue';
import HeaderComponent from '@/components/HeaderComponent.vue';
import RecipeDraftComponent from '@/components/RecipeDraftComponent.vue';
import RecipeService from '@/services/RecipeService';


export default {
  name: 'PublisRecipeView',
  components: {
    HeaderComponent,
    FooterComponent,
    RecipeDraftComponent
  },
  data() {
    return {
      draftRecipies: [],
    }
  },
  mounted() {
    this.getDraftRecipies();
  },
  methods: {
    async getDraftRecipies() {
      const response = await RecipeService.findAllDraftRecipies();
      if (Array.isArray(response)) {
        this.draftRecipies = response;
      } else {
        console.erreur(response);
      }
    },
    updateList() {
      this.getDraftRecipies();
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

.title {
  color: rgb(200, 26, 26);
  margin-bottom: 2rem;
}
</style>