<template>
  <main class="main-container">
    <h1>Connexion</h1>
    <form>
      <fieldset>
        <div class="field">
          <label class="field__label">Adresse e-mail</label>
          <input class="field__input" type="text" placeholder="johndoe@ocooking.local">
        </div>
        <div class="field field--error">
          <label class="field__label">Mot de passe</label>
          <input class="field__input" type="password" placeholder="Mot de passe">
          <ul class="field__error-list">
            <li>
              Le mot de passe doit être renseigné
            </li>
          </ul>
        </div>
      </fieldset>

      <div class="alert error">Le mot de passe est incorrect</div>
      <button class="button">Connexion</button>
    </form>
  </main>
</template>

<script>
export default {
  name: 'LoginFormComponent'
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