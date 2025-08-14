import type { App } from 'vue'

import { GBNewsletter, GBSidePhoto } from './templates'

export function registerGBTemplates(app: App<Element>): void {
  app
    .component('gb-newsletter', GBNewsletter)
    .component('gb-side-photo', GBSidePhoto)
}
