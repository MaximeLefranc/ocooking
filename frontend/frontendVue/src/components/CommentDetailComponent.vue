<template>
  <div class="comment">
    <p class="author" v-html="author" />
    <div v-html="content" />
  </div>
</template>

<script>
export default {
  name: 'CommentDetailComponent',
  props: {
    author: String,
    content: String
  }
}
</script>

<style lang="scss" scoped>
.comment {
  margin-bottom: 1rem;

  .author {
    font-style: oblique;
    font-size: 1.2rem;
  }
}
</style>