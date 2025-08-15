<template>
  <section id="about-us">
    <div class="about-us">
      <div class="container">
        <div class="about-us-intro-container">
          <h2 class="about-us-title">
            O nas
          </h2>
            <p class="about-us-text">
          Wszystko zaczęło się od prostego pomysłu i ogromnej pasji w Lublinie. GOLDEN BOYS to mała, ale pełna energii firma, w której liczy się każdy detal. Stawiamy na jakość, uczciwość i pełne zaangażowanie w to, co robimy – od pierwszego pomysłu, aż po finalny efekt. Naszym celem jest tworzenie rozwiązań, które naprawdę robią różnicę.
        </p>
        </div>
      </div>
      <div class="container">
        <div class="about-us-text-image-container">
          <div class="about-us-text-container">
            <h2 class="about-us-title">
              Nasza misja
            </h2>
            <p class="about-us-text">
              Chcemy pokazać, że kreatywność i innowacja mogą iść w parze z profesjonalizmem. Każdy projekt traktujemy indywidualnie, dostosowując nasze działania do potrzeb klienta. Dzięki temu możemy w pełni wspierać rozwój Twojej marki, a nasze historie opowiadane w pikselach stają się Twoją wizytówką.
            </p>
          </div>
          <div class="about-us-image">
            <img :src="gbImgUrl + '/golden-boys-about-us.jpg'" alt="O Nas" />
          </div>
        </div>
      </div>
      <div class="container">
        <div class="about-us-text-image-container reverse">
          <div class="about-us-text-container">
            <h2 class="about-us-title">
              Oferta i wartości
            </h2>
            <p class="about-us-text">
              W GOLDEN BOYS łączymy estetykę z funkcjonalnością. Tworzymy treści i rozwiązania, które nie tylko wyglądają świetnie, ale też działają bez zarzutu. Stawiamy na transparentność, rzetelność i partnerskie podejście do współpracy. Nasze doświadczenie i pasja gwarantują, że każde zlecenie realizujemy na najwyższym poziomie.
            </p>
          </div>
          <div class="about-us-image">
            <img :src="gbImgUrl + '/golden-boys-about-us1.jpg'" alt="O Nas" />
          </div>
        </div>
      </div>
      <div class="container">
        <div class="about-us-outro-container">
          <h2 class="about-us-title">
            Współpraca
          </h2>
            <p class="about-us-text">
          Zapraszamy do wspólnego działania! Cenimy kreatywność, innowacyjność i zaangażowanie. Razem możemy tworzyć projekty, które wyróżniają się na rynku. Oferujemy jasne zasady współpracy, dopasowanie do Twoich potrzeb oraz pełne wsparcie na każdym etapie – od pomysłu, aż po realizację.
        </p>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { gsap } from 'gsap'

import { bounceFadeIn, useSplitText } from 'atomic'

useSplitText().animate(
  '.about-us-title',
  500,
  0.2,
  0.1,
  'power2.out',
  true,
  'top 50%'
)

useSplitText().animate(
  '.about-us-text',
  600,
  0.8,
  0.1,
  'power2.out',
  true,
  'top 50%'
)

onMounted(() => {
  gsap.fromTo(
    '.container',
    {
      opacity: 0,
    },
    {
      opacity: 1,
      delay: 0.5,
      ease: 'power2.out',
    }
  )

  gsap.fromTo(
    '.about-us-image',
    {
      opacity: 0,
    },
    {
      opacity: 1,
      delay: 1,
      ease: 'power2.out',
    }
  )
})
</script>
