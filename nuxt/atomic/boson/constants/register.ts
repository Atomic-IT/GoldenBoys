import type { App } from 'vue'

import {
  // DataManager modules
  contributorsImgUrl,
  // GoldenBoys modules
  gbImgUrl,
  imgUrl,
  storysetAboutImgUrl,
  storysetBlogImgUrl,
  storysetImgUrl,
  storysetServicesImgUrl,
  technologiesImgUrl,
} from 'atomic'

export function registerGlobalConstants(app: App): void {
  const prefix = appUrl() + (appEnv() === 'production' ? '/build' : '')

  // DataManager modules
  /**
   *  Images urls
   */
  app.config.globalProperties.imgUrl = prefix + imgUrl
  app.config.globalProperties.contributorsImgUrl = prefix + contributorsImgUrl
  app.config.globalProperties.storysetImgUrl = prefix + storysetImgUrl
  app.config.globalProperties.storysetAboutImgUrl = prefix + storysetAboutImgUrl
  app.config.globalProperties.storysetServicesImgUrl =
    prefix + storysetServicesImgUrl
  app.config.globalProperties.storysetBlogImgUrl = prefix + storysetBlogImgUrl
  app.config.globalProperties.technologiesImgUrl = prefix + technologiesImgUrl

  // GoldenBoys modules
  /**
   *  Images urls
   */
  app.config.globalProperties.gbImgUrl = prefix + gbImgUrl
}
