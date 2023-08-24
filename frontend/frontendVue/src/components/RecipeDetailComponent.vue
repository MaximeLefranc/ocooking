<template>
  <main class="main-container">
    <h1 v-html="title" />
    <article class="recipe">
      <section class="informations">
        <ul v-if="false">
          <li>Temps de préparation : 25m</li>
          <li>Coût par personne : 3€</li>
        </ul>
        <div class="media-image" v-bind:style="'background-image: url(' + image + ')'"></div>
      </section>

      <section v-if="ingredients.length" class="ingredients">
        <h2>Ingrédients</h2>
        <ul>
          <li v-for="ingredient in ingredients" v-bind:key="ingredient.id">{{ ingredient.name }}</li>
        </ul>
      </section>
      <section class="preparation">
        <h2>Préparation</h2>
        <div v-html="content"></div>
      </section>
    </article>
    <section v-if="false">
      <header>
        <h2>Commentaires (1)</h2>
      </header>
      <main>
        <div class="comment">
          <p class="author">Jean-Paul Belmondo</p>
          <p>Coucou, je suis un commentaire. J’adore les pantouflets de légumes.</p>
        </div>
        <div class="comment-form">
          <h3>Commenter</h3>
          <form>
            <div>
              <div class="field">
                <textarea placeholder="Le texte de votre commentaire" class="textarea field__input"></textarea>
              </div>
            </div>
            <button type="submit" class="button">Commenter</button>
          </form>
        </div>
      </main>
    </section>
  </main>
</template>

<script>

export default {
  name: 'RecipeDetailComponent',
  props: {
    title: String,
    image: String,
    ingredients: Array,
    content: String,
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
</style>