<template>
  <div class="comment">
    <p class="author" v-html="author" />
    <p v-html="content" />
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

<style lang="scss" scoped></style>