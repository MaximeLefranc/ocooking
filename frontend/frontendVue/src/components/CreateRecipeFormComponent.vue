<template>
  <main class="main-container">
    <h1>Créer une recette</h1>
    <form v-on:submit.prevent="validateForm">
      <fieldset>
        <div class="field">
          <label class="field__label">Titre</label>
          <p v-if="errors.title" class="field__errormessage">{{ errors.title }}</p>
          <input v-model="title" class="field__input" type="text">
        </div>
        <div class="field">
          <label class="field__label">Contenu de la recette</label>
          <p v-if="errors.content" class="field__errormessage">{{ errors.content }}</p>
          <textarea v-model="content" class="field__input" cols="30" rows="10"></textarea>
        </div>
      </fieldset>

      <div v-if="errors.API" class="field__errormessage" v-html="errors.API" />
      <button class="button">Création</button>
    </form>
  </main>
</template>

<script>
import RecipeService from '@/services/RecipeService';



export default {
  name: 'CreateRecipeFormComponent',
  data() {
    return {
      'title': '',
      'content': '',
      errors: {
        title: '',
        content: '',
        API: ''
      }
    }
  },
  methods: {
    async validateForm() {
      let hasError = false;
      this.errors = {
        title: '',
        content: '',
        API: ''
      };
      if (this.title === '') {
        this.errors.title = 'Le titre ne peut pas être vide.';
        hasError = true;
      }

      if (this.content === '') {
        this.errors.content = 'Le contenu ne peut pas être vide.';
        hasError = true;
      }

      if (!hasError) {
        const response = await RecipeService.create({
          title: this.title,
          content: this.content,
          excerpt: '',
        });
        console.log(response);
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