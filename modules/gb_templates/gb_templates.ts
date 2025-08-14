import type { App } from 'vue'

import { GBNewsletter } from './templates'

export function registerGBTemplates(app: App<Element>): void {
  app.component('gb-newsletter', GBNewsletter)
}
