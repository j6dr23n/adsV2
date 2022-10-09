export default defineNuxtRouteMiddleware((to, from) => {
    const { isLoggedIn,isAdmin, removeUser } = useAuth()
    if (process.client) {
        if (!isLoggedIn.value || !isAdmin.value ) {
            removeUser()
            window.location.pathname = '/'
        }
    }
})