<template>
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
</template>

<script>
export default {
  name: 'CommentCreateComponent'
}
</script>

<style lang="scss" scoped></style>