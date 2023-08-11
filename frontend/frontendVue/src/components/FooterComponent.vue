<template>
  <footer class="footer">
    <nav v-if="displayNav" class="nav">
      <a v-for="navElement in navElements" v-bind:key="navElement.name" v-bind:href="navElement.link">{{ navElement.name
      }}</a>
    </nav>
  </footer>
</template>

<script>
export default {
  name: 'FooterComponent',
  data() {
    return {
      navElements: [
        {
          name: 'Liste des recettes',
          link: '#'
        },
        {
          name: 'Inscription',
          link: '#'
        },
        {
          name: 'Connexion',
          link: '#'
        }
      ]
    }
  }
}
</script>

<style lang="scss" scoped></style>
