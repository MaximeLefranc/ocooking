
<template>
  <main class="main-container">
    <h1>Éditer une recette</h1>
    <select v-on:change="loadRecipe" v-model="recipeID">
      <option value="" default>-</option>
      <option v-for="recipe in recipies" :key="recipe.id" :value="recipe.id" v-html="recipe.title.rendered" />
    </select>
    <form v-on:submit.prevent="validateForm" v-if="recipeID">
      <fieldset>
        <div class="field">
          <label class="field__label">Titre</label>
          <p v-if="errors.title" class="field__errormessage">{{ errors.title }}</p>
          <input v-model="recipe.title" class="field__input" type="text">
        </div>
        <div class="field">
          <label class="field__label">Contenu de la recette</label>
          <p v-if="errors.content" class="field__errormessage">{{ errors.content }}</p>
          <textarea v-model="recipe.content" class="field__input" cols="30" rows="10"></textarea>
        </div>
      </fieldset>

      <div v-if="errors.API" class="field__errormessage" v-html="errors.API" />
      <button class="button">Editer</button>
    </form>
  </main>
</template>

<script>
import RecipeService from '@/services/RecipeService';




export default {
  name: 'EditRecipeFormComponent',
  data() {
    return {
      errors: {
        title: '',
        content: '',
        API: '',
      },
      recipies: [],
      recipeID: null,
      recipe: {
        id: null,
        title: null,
        content: null,
      }
    }
  },
  async mounted() {
    this.loadRecipies();
  },
  methods: {
    async loadRecipies() {
      const response = await RecipeService.findAllStatus();
      this.recipies = response;
    },
    async loadRecipe() {
      if (this.recipeID) {
        const response = await RecipeService.findOne(this.recipeID);
        if (response.id) {
          this.recipe = {
            id: response.id,
            title: response.title.rendered,
            content: response.content.rendered,
          }
        } else {
          console.error(response);
        }
      }
    },

    async validateForm() {
      this.errors = {
        title: '',
        content: '',
        API: '',
      };
      if (!this.recipe.title) {
        this.errors.title = 'Le titre ne peut pas être vide.';
      } else if (!this.recipe.content) {
        this.errors.content = 'Le contenu de la recette ne peut pas être vide !';
      } else {
        const response = await RecipeService.update(this.recipe.id, {
          title: this.recipe.title,
          content: this.recipe.content,
        });
        if (response.id) {
          this.recipeID = null;
          this.recipe = {
            id: null,
            title: null,
            content: null,
          };
          this.loadRecipies();
        } else {
          this.errors.API = response.message;
        }
      }
    }
  }
}

</script>

<style lang="scss" scoped>
.main-container {
  text-align: center;
  display: flex;
  margin: 8rem auto 2rem auto;
  flex-direction: column;
  align-items: center;
  background-color: #F0F4ED;
  width: 50%;
  padding: 5rem;
  border-radius: .5rem;
  box-shadow: 2px 2px 6px 0px black;

  form {
    width: 100%;
  }
}

.field {
  line-height: 2rem;
  font-size: 1.3rem;

  &__input {
    width: 100%;
    padding: 0.5rem;
    border: 0px;
    background-color: #ffffff;
    border-radius: .5rem;
    margin-bottom: 1rem;
  }

  &__errormessage {
    color: red;
    font-weight: bold;
    font-size: 1rem;
    line-height: initial;
  }

  textarea {
    resize: none;
  }
}

fieldset {
  text-align: initial;
}

.button {
  border: 1px solid gray;
  background-color: transparent;
  padding: .6rem;
  border-radius: .5rem;
  font-size: 1.2rem;
  text-transform: uppercase;
  margin-top: 1rem;
  cursor: pointer;
}
</style>