export function useAuth() {
    function setUser({ id, name, email, token, isAdmin }) {
        if (process.client) {
            localStorage.setItem('user', JSON.stringify({ id, name, email, token, isAdmin }))
        }
    }

    function getUser() {
        if (process.client) {
            return JSON.parse(localStorage.getItem('user'))
        }
    }

    function removeUser() {
        if (process.client) {
            localStorage.removeItem('user')
        }
    }

    const isAdmin = computed(() => {
        if (process.client) {
            const user = JSON.parse(localStorage.getItem('user'))
            return Boolean(user.isAdmin)
        }
    })

    const isLoggedIn = computed(() => {
        if (process.client) {
            return Boolean(localStorage.getItem('user'))
        }
    })

    return { setUser, getUser, isAdmin, removeUser, isLoggedIn }
}