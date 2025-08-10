<!--suppress HtmlUnknownAnchorTarget -->
<template>
  <nav class="navbar">
    <div class="container">
      <nuxt-link class="application-header" to="/strona-glowna">
        <ad-image
          :src="gbImgUrl + 'golden-boys-logo.svg'"
          class="logo"
          alt="GoldenBoys logo"
          fetchpriority="high"
        />

        <ad-heading
          :tag="1"
          text="GoldenBoys"
          class="application-header-text"
        />
      </nuxt-link>

      <navbar-links />
      <ad-button
        class="navbar-drawer-toggler"
        :icon="navbarExpanded ? 'hidden' : 'prime:align-justify'"
        aria-label="Menu"
        @click="toggleNavbar()"
      />
    </div>
    <navbar-drawer v-model:visible="navbarExpanded">
      <navbar-links />
    </navbar-drawer>
  </nav>
</template>

<script setup lang="ts">
import gsap from 'gsap'

import { bounceFadeIn, useNavbar } from 'atomic'

import { NavbarDrawer, NavbarLinks } from './components'

const { navbarExpanded, toggleNavbar } = useNavbar()

onMounted(() => {
  bounceFadeIn('.navbar .logo', { delay: 0.5, duration: 0.3 })
  gsap.fromTo(
    '.navbar .application-header-text',
    { opacity: 0, y: 20 },
    { opacity: 1, y: 0, duration: 0.2, delay: 0.5 }
  )
  gsap.to('.navbar', {
    opacity: 1,
    duration: 0.3,
    ease: 'power2.out',
    delay: 0.5,
  })
})
</script>
