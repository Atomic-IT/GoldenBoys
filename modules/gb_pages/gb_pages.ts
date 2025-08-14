import type { App } from 'vue'

import { GBHomePage } from './pages'

export function registerGBPages(app: App<Element>): void {
  app.component('gb-home-page', GBHomePage)
}
