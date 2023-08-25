<template>
  <div class="comment-form">
    <h3>Commenter</h3>
    <form v-on:submit.prevent="validate">
      <div class="field">
        <p v-if="errors.comment" class="field__errormessage">{{ errors.comment }}</p>
        <p v-if="errors.API" class="field__errormessage" v-html="errors.API" />
        <textarea v-model="comment" placeholder="Le texte de votre commentaire" class="textarea field__input"></textarea>
      </div>
      <button type="submit" class="button">Commenter</button>
    </form>
  </div>
</template>

<script>
import CommentService from '@/services/CommentService';

export default {
  name: 'CommentCreateComponent',
  data() {
    return {
      comment: '',
      errors: {
        comment: '',
        API: ''
      }
    }
  },
  props: {
    id: Number,
  },
  methods: {
    async validate() {
      this.errors = {
        comment: '',
        API: ''
      };
      if (this.comment === '') {
        this.errors.comment = 'Le contenu ne peut pas être vide';
      } else if (!localStorage.getItem('token')) {
        this.errors.comment = 'Vous devez être connecté pour laisser un commentaire';
      } else {
        const response = await CommentService.create({
          post: this.id,
          content: this.comment
        });

        if (response.code) {
          this.errors.API = response.message;
        } else {
          this.comment = '';
          this.$emit('newComment');
        }
      }
    }
  }
}
</script>

<style lang="scss" scoped>
.field__errormessage {
  color: red;
  font-weight: bold;
  font-size: 1rem;
  line-height: initial;
}
</style>