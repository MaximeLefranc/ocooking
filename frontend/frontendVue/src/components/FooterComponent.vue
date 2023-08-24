<template>
  <footer class="footer">
    <nav class="nav" v-if="displayNav">
      <router-link :to="'/'">Liste des recettes</router-link>
      <router-link v-if="!isConnected" :to="'/inscription'">Inscription</router-link>
      <router-link v-if="!isConnected" :to="'/connexion'">Connexion</router-link>
      <router-link v-if="isConnected" :to="'/recette/creation'">Créer une recette</router-link>
      <router-link v-on:click="disconnect" v-if="isConnected" :to="'/connexion'">Déconnexion</router-link>
    </nav>
  </footer>
</template>

<script>
export default {
  name: 'FooterComponent',
  data() {
    return {
      displayNav: true
    }
  },
  computed: {
    isConnected() {
      return localStorage.getItem('token') ? true : false;
    }
  },
  methods: {
    disconnect() {
      localStorage.removeItem('token');
      this.$router.push('/');
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
}
</style>
