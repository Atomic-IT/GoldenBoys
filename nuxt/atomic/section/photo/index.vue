<template>
  <section class="photo-section">
    <h2 class="photo-title" ref="photoTitle">Nasze projekty</h2>

    <div class="photo-block" v-for="img in images" :key="img.src" :class="{ reverse: img.reverse }">
      <div class="photo-text" v-if="img.title || img.text">
        <h2 v-if="img.title">{{ img.title }}</h2>
        <p v-if="img.text">{{ img.text }}</p>
      </div>
      <div class="photo-image">
        <ad-image :src="gbImgUrl + img.src" :alt="img.alt || img.title || 'Zdjęcie'" />
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue'

const gbImgUrl = '/img/'
const photoTitle = ref<HTMLElement | null>(null)

interface GalleryItem {
  src: string
  alt?: string
  title?: string
  text?: string
  reverse?: boolean
}

const images: GalleryItem[] = [
  {
    src: 'GB1.jpg',
    alt: 'Salon',
    title: 'Elegancki salon',
    text: 'Przestronny salon w nowoczesnym stylu, łączący komfort z estetyką. Idealne miejsce na relaks i spotkania z rodziną.',
  },
  {
    src: 'GB2.jpg',
    alt: 'Umywalka',
    title: 'Designerska umywalka',
    text: 'Stylowa umywalka w minimalistycznej łazience, łącząca funkcjonalność z nowoczesnym designem.',
    reverse: true,
  },
  {
    src: 'GB3.jpg',
    alt: 'Prysznic',
    title: 'Przestronny prysznic',
    text: 'Prysznic z elegancką kabiną i nowoczesnymi rozwiązaniami, zapewniający komfort i relaks po całym dniu.',
  },
]

function typeWriter(element: HTMLElement, speed = 50) {
  const text = element.textContent || ''
  element.textContent = ''
  let i = 0
  const interval = setInterval(() => {
    element.textContent += text[i]
    i++
    if (i >= text.length) clearInterval(interval)
  }, speed)
}

onMounted(() => {
  if (photoTitle.value) typeWriter(photoTitle.value, 80)
  const blocks = document.querySelectorAll('.photo-block')
  const io = new IntersectionObserver(
    (entries) => {
      entries.forEach((e) => {
        if (e.isIntersecting) {
          e.target.classList.add('is-visible')
          io.unobserve(e.target as Element)
        }
      })
    },
    { threshold: 0.25 }
  )
  blocks.forEach((b) => io.observe(b))
})
</script>
