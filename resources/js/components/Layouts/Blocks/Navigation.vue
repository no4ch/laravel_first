<template>
  <div class="mb-3">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <router-link tag="a" to="/about/app/home" class="nav-link" active-class="active">Home</router-link>
      </li>
      <li class="nav-item">
        <router-link tag="a" to="/about/app/use" class="nav-link" active-class="active">How to use</router-link>
      </li>
      <li class="nav-item">
        <router-link tag="a" to="/about/app/laravel" class="nav-link" active-class="active">About laravel</router-link>
      </li>
    </ul>
  </div>
</template>

<script>
  export default {
    name: "Navigation"
  }
</script>

<style scoped>

</style>
