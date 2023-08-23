<template>
  <main class="main-container">
    <h1>Connexion</h1>
    <form v-on:submit.prevent="validateForm">
      <fieldset>
        <div class="field">
          <label class="field__label">Pseudo</label>
          <p v-if="errors.username" class="field__errormessage">{{ errors.username }}</p>
          <input v-model="username" class="field__input" type="text" placeholder="JohnWick">
        </div>
        <div class="field field--error">
          <label class="field__label">Mot de passe</label>
          <p v-if="errors.password" class="field__errormessage">{{ errors.password }}</p>
          <input v-model="password" class="field__input" type="password" placeholder="Mot de passe">
        </div>
      </fieldset>

      <div v-if="errors.API" class="field__errormessage" v-html="errors.API" />
      <button class="button">Connexion</button>
    </form>
  </main>
</template>

<script>
import UserService from '@/services/UserService';

export default {
  name: 'LoginFormComponent',
  data() {
    return {
      'username': '',
      'password': '',
      errors: {
        username: '',
        password: '',
        API: ''
      }
    }
  },
  methods: {
    async validateForm() {
      let hasError = false;
      this.errors = {
        username: '',
        password: '',
        API: ''
      };
      if (this.username === '') {
        this.errors.username = 'Le nom d\'utilisateur ne peut pas être vide.';
        hasError = true;
      }

      if (this.password === '') {
        this.errors.password = 'Le mot de passe ne peut pas être vide.';
        hasError = true;
      }

      if (!hasError) {
        const response = await UserService.login({
          username: this.username,
          password: this.password
        })

        if (response.token) {
          localStorage.setItem('token', response.token);
        } else {
          this.errors.API = response.message;
        }
      }
    }
  }
}

</script>

<style lang="scss" scoped>
.main-container {
  text-align: center;
  display: flex;
  margin: 8rem auto 2rem auto;
  flex-direction: column;
  align-items: center;
  background-color: #F0F4ED;
  width: fit-content;
  padding: 5rem;
  border-radius: .5rem;
  box-shadow: 2px 2px 6px 0px black;
}

.field {
  line-height: 2rem;
  font-size: 1.3rem;

  &__input {
    width: 100%;
    padding: 0.5rem;
    border: 0px;
    background-color: #ffffff;
    border-radius: .5rem;
    margin-bottom: 1rem;
  }

  &__errormessage {
    color: red;
    font-weight: bold;
    font-size: 1rem;
    line-height: initial;
  }
}

fieldset {
  text-align: initial;
}

.button {
  border: 1px solid gray;
  background-color: transparent;
  padding: .6rem;
  border-radius: .5rem;
  font-size: 1.2rem;
  text-transform: uppercase;
  margin-top: 1rem;
  cursor: pointer;
}
</style>