<template>
  <main class="main-container">
    <h1>Créer un compte</h1>
    <form v-on:submit.prevent="validateForm">
      <fieldset>
        <div class="field">
          <p v-if="errors.email" class="field__errormessage">{{ errors.email }}</p>
          <label class="field__label">Adresse e-mail</label>
          <input v-model="email" class="field__input" type="text" placeholder="johndoe@ocooking.local">
        </div>
      </fieldset>
      <fieldset>
        <div class="field">
          <p v-if="errors.username" class="field__errormessage">{{ errors.username }}</p>
          <label class="field__label">Identifiant</label>
          <input v-model="username" class="field__input" type="text" placeholder="johndoe">
        </div>
        <div class="field">
          <p v-if="errors.password" class="field__errormessage">{{ errors.password }}</p>
          <label class="field__label">Mot de passe</label>
          <input v-model="password" class="field__input" type="password" placeholder="Mot de passe">
        </div>
        <div class="field">
          <p v-if="errors.passwordVerification" class="field__errormessage">{{ errors.passwordVerification }}</p>
          <label class="field__label">Confirmation du mot de passe</label>
          <input v-model="passwordVerification" class="field__input" type="password"
            placeholder="Confirmez le mot de passe">
        </div>
      </fieldset>

      <button class="button">Créer le compte</button>
    </form>
  </main>
</template>

<script>
export default {
  name: 'RegisterComponent',
  data() {
    return {
      email: '',
      username: '',
      password: '',
      passwordVerification: '',
      errors: {
        email: '',
        username: '',
        password: '',
        passwordVerification: ''
      }
    }
  },
  methods: {
    validateForm() {
      let hasError = false;
      this.errors = {
        email: '',
        username: '',
        password: '',
        passwordVerification: ''
      };

      if (this.email === '') {
        this.errors.email = 'l\'email est vide, merci de le remplir';
        hasError = true;
      }
      if (this.username === '' || this.username.length < 4) {
        this.errors.username = 'Le pseudo doit contenir au minimum 4 charactères';
        hasError = true;
      }
      if (this.password === '' || this.password.length < 5) {
        this.errors.password = 'Le mot de passe doit contenir au minimum 5 charactères';
        hasError = true;
      } else {
        if (this.passwordVerification !== this.password) {
          this.errors.passwordVerification = 'Les mots de pases ne sont pas égaux';
          hasError = true;
        }
      }

      if (!hasError) {
        console.log('envoie la requête');
      }
    }
  }
}
</script>

<style lang="scss" scoped>
.main-container {
  text-align: center;
  display: flex;
  margin: 5rem auto 2rem auto;
  flex-direction: column;
  align-items: center;
  background-color: #F0F4ED;
  width: fit-content;
  padding: 5rem;
  border-radius: .5rem;
  box-shadow: 2px 2px 6px 0px black;
}

.field {
  line-height: 3rem;
  font-size: 1.3rem;

  &__input {
    margin-left: 1rem;
    padding: 0.5rem;
    border: 0px;
    background-color: #ffffff;
    border-radius: .5rem;
  }

  &__errormessage {
    color: red;
    font-weight: bold;
    text-align: center;
    font-size: initial;
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
  margin-top: 2rem;
  cursor: pointer;
}
</style>