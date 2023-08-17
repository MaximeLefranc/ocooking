<template>
  <HeaderComponent />
  <RegisterComponent />
  <FooterComponent />
</template>

<script>
import FooterComponent from '@/components/FooterComponent.vue';
import HeaderComponent from '@/components/HeaderComponent.vue';
import RegisterComponent from '@/components/RegisterComponent.vue';

export default {
  name: 'RegisterView',
  components: { HeaderComponent, FooterComponent, RegisterComponent }
}
</script>

<style lang="scss" scoped></style>