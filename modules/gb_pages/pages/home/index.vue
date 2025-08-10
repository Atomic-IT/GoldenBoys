<template>
  <div class="home-container">
    <ad-section-navbar />
    <h1>Home</h1>
  </div>
</template>

<script setup lang="ts">
import { onBeforeMount } from 'vue'

onBeforeMount(() => window.scrollTo(0, 0))
</script>
