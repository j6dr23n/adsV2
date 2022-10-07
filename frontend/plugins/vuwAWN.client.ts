import AWN from 'awesome-notifications'
import { defineNuxtPlugin } from '#app'

export default defineNuxtPlugin(nuxtApp => {
    const vuwAWNOptions = {
        position: 'top-right',
        duration: { alert: 1000 },
    }

    return {
        provide:{
            awn : new AWN(vuwAWNOptions)
        }
    }
})