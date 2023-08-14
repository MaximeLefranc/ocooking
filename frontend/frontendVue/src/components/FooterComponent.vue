<template>
  <footer class="footer">
    <nav class="nav">
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

<style lang="scss" scoped>
.footer {
  width: 100%;
  background-color: #fff;
  position: fixed;
  bottom: 0;
  box-shadow: 0 0 10px #14141433;

  .nav {
    justify-content: space-around;
    align-items: center;
    padding: 1rem;
    display: flex;

    a {
      color: #2c3e50;
      font-weight: bold;

      &.router-link-exact-active {
        color: #42b983;
      }
    }
  }
}</style>
