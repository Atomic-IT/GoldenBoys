<template>
  <section id="newsletter">
    <div class="newsletter-container">
      <div class="newsletter-container-content">
        <ad-label 
          label="Zapisz się do newslettera" 
          class="newsletter-label"
        />
        <ad-heading 
          :tag="2" 
          text="Chcesz być na bieżąco z najnowszymi informacjami z budowy?" 
          class="newsletter-heading"
        />
        <ad-button label="Zapisz się" class="newsletter-button" />
      </div>

      <img :src="gbImgUrl + 'budowa.jpg'" alt="Newsletter" class="newsletter-image" />
    </div>
  </section>
</template>

<script setup lang="ts">
</script>