<template>
  <div class="container">
    <navigation></navigation>
    <router-view></router-view>
    <div class="alert alert-dark mt-3 d-flex justify-content-center" role="alert">
      <a class="alert-link" href="/tests">Go to tests</a>
    </div>
  </div>
</template>

<script>
  import Navigation from "./components/Layouts/Blocks/Navigation";

  export default {
    name: "App",
    components: {Navigation}
  }
</script>

<style scoped>

</style>
