<template>
  <div class="recipe">
    <RecipeComponent class="recipe__article" :title="title" :id="id" :description="description" :image="image" />
    <div class="button__container">
      <button v-on:click="publishRecipe" class="button button-publish">Publier</button>
      <button v-on:click="deleteRecipe" class="button button-delete">Supprimer</button>
    </div>
  </div>
</template>

<script>
import RecipeService from '@/services/RecipeService';
import RecipeComponent from './RecipeComponent.vue';

export default {
  name: 'RecipeDraftComponent',
  props: {
    id: Number,
    title: String,
    description: String,
    image: String
  },
  components: { RecipeComponent },
  methods: {
    async publishRecipe() {
      const response = await RecipeService.recipeStatusPublished(this.id);
      this.checkResponse(response);
    },
    async deleteRecipe() {
      const response = await RecipeService.delete(this.id);
      this.checkResponse(response);
    },
    checkResponse(response) {
      if (response.id) {
        this.$emit('NewChangeInRecipeDraftComponent')
      } else {
        console.error(response);
      }
    }
  }
}
</script>

<style lang="scss" scoped>
.recipe {
  display: flex;
  width: 100%;
  flex-direction: row;
  flex-wrap: nowrap;
  justify-content: space-between;
  align-items: stretch;

  &__article {
    width: 90%;
  }
}

.button__container {
  display: flex;
  flex-direction: column;
  justify-content: space-evenly;
  padding: 0.1rem;
  margin-bottom: 2rem;
}

.button {
  margin: 0.1rem;
  border-radius: 50%;
  padding: 1rem;
  height: 8rem;
  width: 8rem;
  font-weight: bold;
  border: 1px solid #F0F4ED;
  cursor: pointer;
}

.button-publish {
  background-color: rgb(19, 135, 19);
}

.button-delete {
  background-color: rgb(200, 26, 26);
}
</style>