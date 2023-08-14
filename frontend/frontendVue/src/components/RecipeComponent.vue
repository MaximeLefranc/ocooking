<template>
  <article class="article">
    <a href="javascript:void(0)">
      <div class="media-image" v-bind:style="'background-image: url(' + image + ')'"></div>
      <div class="text-content">
        <h2>{{ title }}</h2>
        <div v-html="description"></div>
      </div>
    </a>
  </article>
</template>

<script>
export default {
  name: 'RecipeComponent',
  props: {
    title: String,
    description: String,
    image: String
  }
}
</script>

<style lang="scss" scoped>
.article {
  text-align: left;
  text-align: left;
  background-color: #f0f4ee;
  border-radius: 1rem;
  margin-bottom: 2rem;
  padding-bottom: 2rem;
  box-shadow: 0 5px 5px #0000001a;
}

.article .text-content {
  padding: 0 30px;
}

.article .media-image {
  width: 100%;
  height: 200px;
  background-position: center;
  background-size: cover;
  border-radius: 1rem 1rem 0 0;
  margin: auto;
  display: block;
}
</style>