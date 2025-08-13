import type { NuxtApp } from 'nuxt/app'
import { defineNuxtPlugin } from 'nuxt/app'
import {
  // DataManager modules
  registerDMActivity,
  registerDMAnimations,
  registerDMAuth,
  registerDMEntities,
  registerDMEntitiesStructural,
  registerDMMedia,
  registerDMPages,
  registerDMScreenLights,
  registerDMScreenLoader,
  registerDMTasks,
  // GoldenBoys modules
  registerGBPages,
  registerGBTemplates,
} from '../../modules'

export default defineNuxtPlugin({
  name: 'modules-registration',
  enforce: 'pre',
  setup(nuxtApp: NuxtApp) {
    // DataManager modules
    registerDMActivity(nuxtApp.vueApp)
    registerDMAnimations(nuxtApp.vueApp)
    registerDMAuth(nuxtApp.vueApp)
    registerDMEntities(nuxtApp.vueApp)
    registerDMEntitiesStructural(nuxtApp.vueApp)
    registerDMMedia(nuxtApp.vueApp)
    registerDMPages(nuxtApp.vueApp)
    registerDMScreenLights(nuxtApp.vueApp)
    registerDMScreenLoader(nuxtApp.vueApp)
    registerDMTasks(nuxtApp.vueApp)

    // GoldenBoys modules
    registerGBPages(nuxtApp.vueApp)
    registerGBTemplates(nuxtApp.vueApp)
  },
})
