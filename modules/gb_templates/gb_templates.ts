import type { App } from 'vue'

import { GBAboutUs, GBNewsletter, GBSidePhoto } from './templates'

export function registerGBTemplates(app: App<Element>): void {
  app
    .component('gb-about-us', GBAboutUs)
    .component('gb-newsletter', GBNewsletter)
    .component('gb-side-photo', GBSidePhoto)
}
