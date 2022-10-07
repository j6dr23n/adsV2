import { defineNuxtConfig } from 'nuxt'

// https://v3.nuxtjs.org/api/configuration/nuxt.config
export default defineNuxtConfig({
    publicRuntimeConfig: {
        BASE_URL: process.env.BASE_URL,
    },
    css: ['awesome-notifications/dist/style.css'],
    app: {
        head: {
            bodyAttrs: {
                class: `bg-gray-100 dark:bg-gray-900 bg-[url('~assets/images/bg-body.jpg'))] dark:bg-[url('~assets/images/bg-body-2.png')]`
            },
            meta: [
                { name: 'viewport', content: 'width=device-width, initial-scale=1' }
            ],
            script: [
            ],
            link: [
                { rel: 'stylesheet', href: '/assets/css/icons.css' },
                { rel: 'stylesheet', href: '/assets/css/tailwind.css' },
            ],
            noscript: [
                { children: 'Javascript is required' }
            ]
        }

    }
})
