<template>
  <header class="header logo-only">
    <div class="logo-container">
      <img class="logo" v-bind:src="logo">
      <div class="text-container">
        <span class="first-part">10 minutes</span>
        <span class="second-part">{{ title }}</span>
      </div>
    </div>
  </header>
</template>

<script>
import oven from '@/assets/oven.svg';

export default {
  name: 'HeaderComponent',
  data() {
    return {
      logo: oven,
      title: 'O\'four'
    }
  }
}
</script>

<style lang="scss" scoped>
.header {
  width: 100%;
  background-color: #f0f4ee;
  justify-content: space-between;
  align-items: center;
  padding-bottom: 1rem;
  line-height: 1;
  display: flex;
  position: fixed;
  top: 0;
  box-shadow: 0 0 10px #14141433;

  &.logo-only {
    justify-content: center;
  }

  .logo-container {
    padding: 1rem 1rem 0;
    display: flex;

    .logo {
      height: 2.4rem;
      vertical-align: middle;
    }

    .text-container {
      flex-direction: column;
      display: flex;

      .first-part {
        font-family: Montserrat Bold, Arial;
      }

      .second-part {
        font-family: Montserrat, Arial;
        font-size: 1.7rem;
      }
    }
  }

  .user {
    padding: 1rem 1rem 0;
    font-family: Montserrat Bold, Arial;
    text-align: center;

    .user-badge {
      position: absolute;
      top: 1rem;
      right: .8rem;

      svg {
        fill: #306715;
      }
    }

    .user-actions {
      background-color: #cad6c4;
      padding: 1rem;
      position: fixed;
      top: 3.5rem;
      right: 0;
      box-shadow: 0 0 10px #14141433;

      a {
        margin-bottom: 1rem;
        line-height: 2;
        display: block;

        &:last-child {
          margin-bottom: 0;
        }
      }
    }

    .username {
      padding-right: .5rem;
    }

    .avatar {
      vertical-align: middle;
      height: 2rem;
      width: 2rem;
      border-radius: 50px;
      display: inline-block;
    }
  }

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