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

<style lang="scss" scoped></style>