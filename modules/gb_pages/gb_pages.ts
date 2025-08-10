import type { App } from 'vue'

import { HomePage } from './pages'

export function registerGBPages(app: App<Element>): void {
  app.component('gb-home-page', HomePage)
}
