<template>
  <div class="home-container">
    <ad-section-navbar />
    <gb-side-photo />
    <ad-section-faq :questions="questions" />
    <ad-section-contact />
    <gb-newsletter />
    <ad-section-footer />
  </div>
</template>

<script setup lang="ts">
import { onBeforeMount } from 'vue'

import type { QuestionObjectInterface } from 'atomic'

onBeforeMount(() => window.scrollTo(0, 0))

const questions: QuestionObjectInterface[] = [
  {
    index: 1,
    content: 'Jakie usługi oferuje GoldenBoys Lublin?',
    answer:
      'Realizujemy remonty, renowacje i wykończenia pod klucz – od mieszkań ekonomicznych po luksusowe apartamenty. Odświeżamy wnętrza, odnawiamy zabytkowe kamienice i tworzymy nowoczesne przestrzenie.',
    category: 'Services',
  },
  {
    index: 2,
    content: 'Na jakim obszarze działacie?',
    answer: 'Pracujemy w Lublinie i na terenie całego województwa lubelskiego.',
    category: 'General',
  },
  {
    index: 3,
    content: 'Czy mogę zlecić Wam projekt i wykonanie całości?',
    answer:
      'Tak. Zajmujemy się wszystkim – od projektu wnętrza, przez realizację i nadzór prac, po sprzątanie po remoncie. Ty opowiadasz o swoich marzeniach, a my je realizujemy.',
    category: 'Services',
  },
  {
    index: 4,
    content: 'Czy wykonujecie renowacje zabytkowych budynków?',
    answer:
      'Tak. Odnawiamy stare kamienice z zachowaniem historycznego charakteru, łącząc go z wygodą i estetyką XXI wieku.',
    category: 'Services',
  },
  {
    index: 5,
    content: 'Co wyróżnia Was na tle innych firm?',
    answer:
      'Łączymy rzemiosło z wizją. Współpracujemy z doświadczonymi fachowcami i projektantami, oferujemy transparentne wyceny i dbamy o każdy detal.',
    category: 'About',
  },
  {
    index: 6,
    content: 'Czy mogę obejrzeć Wasze dotychczasowe realizacje?',
    answer:
      'Oczywiście. W portfolio mamy nowoczesne apartamenty, mieszkania inwestycyjne i odrestaurowane kamienice. Zdjęcia i opisy znajdziesz w naszej galerii realizacji.',
    category: 'Portfolio',
  },
  {
    index: 7,
    content: 'Jak wygląda proces współpracy?',
    answer:
      'Najpierw poznajemy Twoje potrzeby i budżet, przygotowujemy projekt, a po akceptacji przechodzimy do realizacji. Na każdym etapie informujemy o postępach.',
    category: 'Process',
  },
  {
    index: 8,
    content: 'Czy oferujecie gwarancję na wykonane prace?',
    answer:
      'Tak, wszystkie nasze realizacje są objęte gwarancją jakości – jeśli pojawi się problem, naprawimy go bez dodatkowych kosztów.',
    category: 'Support',
  },
]
</script>
