<template>
  <section id="side-photo">
    <div class="side-photo">
      <div class="side-photo-text-container">
        <h2 class="side-photo-title">
          Elegancki salon
        </h2>
        <p class="side-photo-text">
          Przestronny salon w nowoczesnym stylu, łączący komfort z estetyką. Idealne miejsce na relaks i spotkania z rodziną.
        </p>
        <div class="side-photo-buttons">
          <ad-button label="Umów się na wycenę" class="primary-button" />
          <ad-button label="Zobacz galerię" class="secondary-button" />
        </div>
      </div>
      <div class="side-photo-image">
        <img :src="gbImgUrl + '/golden-boys-side-photo.jpg'" alt="Salon" />
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { gsap } from 'gsap'

import { bounceFadeIn, useSplitText } from 'atomic'

useSplitText().animate(
  '.side-photo-title',
  500,
  0.2,
  0.1,
  'power2.out',
  true,
  'top 50%'
)

useSplitText().animate(
  '.side-photo-text',
  1000,
  0.2,
  0.1,
  'power2.out',
  true,
  'top 50%'
)

onMounted(() => {
  gsap.fromTo(
    '.side-photo-image',
    {
      opacity: 0,
    },
    {
      opacity: 1,
      delay: 0.5,
      ease: 'power2.out',
    }
  )

  bounceFadeIn('.primary-button', {
    delay: 3,
    ease: 'power2.out',
  })

  bounceFadeIn('.secondary-button', {
    delay: 3.5,
    ease: 'power2.out',
  })
})
</script>
