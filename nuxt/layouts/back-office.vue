<template>
  <div id="back-office" class="golden-boys">
    <slot />
    <ad-dock />
  </div>
</template>

<script setup lang="ts">
definePageMeta({
  layout: 'back-office',
})
</script>
