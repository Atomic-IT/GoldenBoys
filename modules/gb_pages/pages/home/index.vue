<template>
  <div class="home-container">
    <ad-section-navbar />
    <gb-newsletter />
    <ad-section-footer />
  </div>
</template>

<script setup lang="ts">
import { onBeforeMount } from 'vue'

onBeforeMount(() => window.scrollTo(0, 0))
</script>
