<template>
  <HeaderComponent />
  <LoginFormComponent />
  <FooterComponent />
</template>

<script>
import FooterComponent from '@/components/FooterComponent.vue';
import HeaderComponent from '@/components/HeaderComponent.vue';
import LoginFormComponent from '@/components/LoginFormComponent.vue';

export default {
  name: 'ConnectView',
  components: { HeaderComponent, FooterComponent, LoginFormComponent }
}
</script>

<style lang="scss" scoped></style>