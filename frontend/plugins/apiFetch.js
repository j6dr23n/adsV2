import { defineNuxtPlugin } from "#app"
const { getUser } = useAuth()

export default defineNuxtPlugin(nuxtApp => {
    const config = useRuntimeConfig()
    nuxtApp.provide('apiFetch', $fetch.create({
        baseURL: config.BASE_URL, method: 'POST', headers: {
            'Content-Type': 'application/json',
            Accept: 'application/json',
            'Authorization': `Bearer ${getUser()?.token}`,
        }
    }))
})