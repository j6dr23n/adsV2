export default defineNuxtRouteMiddleware((to, from) => {
    const { isAdmin, removeUser } = useAuth()
    if (process.client) {
        if (!isAdmin.value) {
            removeUser()
            window.location.pathname = '/'
        }
    }
})