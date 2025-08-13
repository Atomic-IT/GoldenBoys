<template>
  <section id="why-us">
    <div class="section-header">
      <span>Dlaczego </span>
      <span class="accent">my?</span>
    </div>
    <div class="viewport-box">
      <div class="main-circle"></div>
    </div>
    <Dialog
      v-model:visible="dialogVisible"
      :data="dialogData"
      :dismissable-mask="true"
      modal
      class="why-us-dialog"
      @close="dialogVisible = false"
    >
      <template #header>
        <ad-heading :tag="4" :text="dialogData?.header" />
      </template>
      <template #default>
        <ad-paragraph :text="dialogData?.description" />
      </template>
    </Dialog>
  </section>
</template>

<script setup lang="ts">
import { gsap } from 'gsap'
import { onBeforeUnmount, onMounted, ref, watch } from 'vue'

import type { WhyUsInterface, WhyUsItemInterface } from 'atomic'
import { bounceFadeIn, useScrollTrigger, useSplitText } from 'atomic'

import { Draggable } from 'gsap/Draggable'
import { InertiaPlugin } from 'gsap/InertiaPlugin'

gsap.registerPlugin(Draggable)
gsap.registerPlugin(InertiaPlugin)

defineProps<WhyUsInterface>()

const manualItems: WhyUsItemInterface[] = [
  {
    header: 'Doświadczenie, na które możesz liczyć',
    description:
      'Zespół Goldenboys to grupa profesjonalistów z wieloletnim doświadczeniem w branży elektrycznej. Dzięki zdobytej wiedzy i doświadczeniu, mamy umiejętność radzenia sobie z najbardziej skomplikowanymi projektami, od instalacji w nowych obiektach po modernizację starych, wymagających systemów elektrycznych.',
  },
  {
    header: 'Innowacyjne rozwiązania dla nowoczesnych domów',
    description:
      'Jako firma, która śledzi najnowsze technologie, oferujemy usługi związane z inteligentnymi systemami zarządzania budynkami (smart home) i instalacjami fotowoltaicznymi. Wprowadzamy innowacje, które poprawiają komfort i oszczędności w Państwa codziennym życiu.',
  },
  {
    header: 'Priorytet na bezpieczeństwo',
    description:
      'Bezpieczeństwo naszych klientów jest dla nas najważniejsze. Wszystkie instalacje realizujemy zgodnie z najnowszymi normami bezpieczeństwa i przepisami prawa. Każdy nasz projekt przechodzi szczegółową kontrolę jakości, co daje pewność, że prace wykonane przez nas są nie tylko estetyczne, ale przede wszystkim bezpieczne.',
  },
  {
    header: 'Indywidualne podejście do klienta',
    description:
      'Nie ma dwóch takich samych projektów. Dlatego dokładamy wszelkich starań, aby każda instalacja była dokładnie dopasowana do Państwa potrzeb, wymagań i budżetu. Niezależnie od tego, czy chodzi o małą instalację w domu, czy skomplikowany projekt przemysłowy, nasze podejście jest zawsze spersonalizowane i elastyczne.',
  },
  {
    header: 'Terminowość i rzetelność',
    description:
      'Rozumiemy, jak ważny jest czas naszych klientów. Dlatego zawsze dotrzymujemy ustalonych terminów, a prace wykonujemy w sposób szybki, ale bez kompromisów w kwestii jakości. Z nami nie muszą Państwo martwić się opóźnieniami czy nieprzewidzianymi kosztami.',
  },
  {
    header: 'Transparentność i konkurencyjność cenowa',
    description:
      'Proponujemy jasne warunki współpracy oraz przejrzyste ceny, bez ukrytych kosztów. Oferujemy konkurencyjne ceny na rynku, nie rezygnując przy tym z jakości usług. Każdy klient wie, za co płaci i jaką wartość otrzymuje w zamian.',
  },
  {
    header: 'Gwarancja satysfakcji',
    description:
      'Nasze usługi objęte są gwarancją, dzięki czemu mają Państwo pewność, że w razie jakichkolwiek problemów, zostaną one szybko i profesjonalnie rozwiązane. Dążymy do tego, aby każdy klient był w pełni zadowolony z naszych usług i chętnie polecał nas innym.',
  },
  {
    header: 'Ekologiczne podejście',
    description:
      'Jako firma odpowiedzialna społecznie, promujemy rozwiązania ekologiczne, takie jak instalacje fotowoltaiczne, które pozwalają na obniżenie zużycia energii i zmniejszenie śladu węglowego. Wspieramy naszych klientów w przejściu na odnawialne źródła energii.',
  },
]

const data = ref(manualItems)
const dialogVisible = ref(false)
const dialogData = ref<WhyUsItemInterface | null>(null)

const openDialog = (item: WhyUsItemInterface) => {
  dialogData.value = item
  dialogVisible.value = true
}

function truncate(text?: string) {
  if (!text) return ''
  const max = 110
  return text.length > max ? text.slice(0, max) + '…' : text
}

onMounted(() => {
  if (!import.meta.client) return
  const circle = document.querySelector('.main-circle') as HTMLElement | null
  if (!circle || !data.value.length) return

  const items = data.value

  circle.innerHTML = ''

  function placeItems(items: WhyUsItemInterface[]) {
    const angleIncrement = (Math.PI * 2) / items.length
    const outerRadius = circle!.offsetWidth / 2
    const innerRadius = outerRadius * 0.9
    const center = outerRadius
    const elements: HTMLElement[] = []

    items.forEach((item, i) => {
      const angle = angleIncrement * i
      const radius = i % 2 === 0 ? outerRadius : innerRadius

      const el = document.createElement('div')
      el.classList.add('circle-item')

      const card = document.createElement('div')
      card.classList.add('why-us-mini-card')
      card.setAttribute('role', 'button')
      card.setAttribute('tabindex', '0')
      card.setAttribute('aria-label', item.header || 'Why us item')
      card.innerHTML = `
          <h5 class=\"why-us-mini-card__title\">${item.header || ''}</h5>
        `
      el.appendChild(card)

      const xPos = center + Math.cos(angle) * radius
      const yPos = center + Math.sin(angle) * radius

      gsap.set(el, {
        position: 'absolute',
        top: 0,
        left: 0,
        xPercent: -50,
        yPercent: -50,
        transformOrigin: '50% 50%',
        x: xPos,
        y: yPos,
        cursor: 'pointer',
        userSelect: 'none',
        pointerEvents: 'auto',
      })

      el.addEventListener('click', () => openDialog(item))
      el.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') openDialog(item)
      })
      circle!.appendChild(el)
      elements.push(el)
    })

    return elements
  }

  function counterRotateItems(elements: HTMLElement[], angle: number) {
    elements.forEach((el) => {
      gsap.set(el, {
        rotation: -angle,
      })
    })
  }
  const elements = placeItems(items)
  const spin = gsap
    .timeline({ repeat: -1, defaults: { duration: 30, ease: 'none' } })
    .to(circle, { rotation: 360 })
    .to(elements, { rotation: -360 }, 0)

  Draggable.create(circle, {
    type: 'rotation',
    inertia: true,

    onPressInit() {
      spin.pause()
    },

    onRelease() {
      spin.play()
    },

    onDrag() {
      const angle = (this.rotation % 360) + 360
      spin.progress(angle / 360)
      counterRotateItems(elements, angle)
    },

    onThrowUpdate() {
      const angle = (this.rotation % 360) + 360
      spin.progress(angle / 360)
      counterRotateItems(elements, angle)
    },

    onThrowComplete() {
      spin.play()
    },
  })

  const scrollHeight =
    document.documentElement.scrollHeight - window.innerHeight

  window.addEventListener('scroll', () => {
    const scrollProgress = window.scrollY / scrollHeight
    const currentProgress = spin.progress()

    const targetProgress = (currentProgress / 0.4 + scrollProgress) / 4

    gsap.to(spin, {
      progress: targetProgress,
      duration: 0.5,
      ease: 'power2.out',
      overwrite: 'auto',
    })
  })

  watch(
    () => dialogVisible.value,
    () => spin.play()
  )
})

onBeforeUnmount(() => {
  if (import.meta.client) {
    const draggable = Draggable.get('.main-circle')
    draggable?.kill()
    gsap.killTweensOf('.main-circle')
  }
})

useSplitText().animate(
  '.section-header',
  500,
  0.2,
  0.1,
  'power2.out',
  true,
  'top 50%'
)

useScrollTrigger(
  '.section-header',
  () => {
    bounceFadeIn('.viewport-box', {
      duration: 0.3,
      ease: 'power2.out',
    })
  },
  {
    start: 'top 25%',
  }
)
</script>
