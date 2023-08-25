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
    <section>
      <header v-if="comments.length">
        <h2>Commentaires</h2>
      </header>
      <main>
        <div v-if="comments.length">
          <CommentDetailComponent v-for="comment in comments" :key="comment.id" :author="comment.author_name"
            :content="comment.content.rendered" :id="comment.id" />
        </div>
        <CommentCreateComponent v-if="isConnected" v-on:newComment="updateComments" v-bind:id="id" />
      </main>
    </section>
  </main>
</template>

<script>
import CommentDetailComponent from '@/components/CommentDetailComponent';
import CommentCreateComponent from '@/components/CommentCreateComponent';
import CommentService from '@/services/CommentService';

export default {
  name: 'RecipeDetailComponent',
  components: { CommentDetailComponent, CommentCreateComponent },
  async mounted() {
    const response = await CommentService.findAllByRecipeID(this.$route.params.id);
    this.comments = response.data;
  },
  data() {
    return {
      comments: [],
    }
  },
  props: {
    title: String,
    image: String,
    ingredients: Array,
    content: String,
    id: Number
  },
  computed: {
    isConnected() {
      return localStorage.getItem('token') ? true : false;
    }
  },
  methods: {
    async updateComments() {
      const response = await CommentService.findAllByRecipeID(this.$route.params.id);
      this.comments = response.data;
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
</style>