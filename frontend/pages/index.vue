<template>
  <div
    class="relative flex flex-col justify-center min-h-screen overflow-hidden"
  >
    <div
      class="
        w-full
        m-auto
        bg-white
        dark:bg-slate-800/60
        rounded
        shadow-lg
        ring-2 ring-slate-300/50
        dark:ring-slate-700/50
        lg:max-w-md
      "
    >
      <div class="text-center p-6 bg-slate-900 rounded-t">
        <a href="index.html"
          ><img
            src="assets/images/logo-sm.png"
            alt=""
            class="w-14 h-14 mx-auto mb-2"
        /></a>
        <h3 class="font-semibold text-white text-xl mb-1">
          Let's Get Started JinnAdx
        </h3>
        <p class="text-xs text-slate-400">Sign in to continue to JinnAdx.</p>
      </div>

      <form class="p-6">
        <div>
          <label for="email" class="label">Email</label>
          <input
            type="email"
            id="email"
            v-model="email"
            class="form-control dark:bg-slate-800/60 dark:border-slate-700/50"
            placeholder="Your Email"
            required
          />
        </div>
        <div class="mt-4">
          <label for="password" class="label">Your password</label>
          <input
            type="password"
            id="password"
            v-model="password"
            class="form-control dark:bg-slate-800/60 dark:border-slate-700/50"
            placeholder="Password"
            required
          />
        </div>
        <div class="mt-6">
          <button
            class="
              w-full
              px-4
              py-2
              tracking-wide
              text-white
              transition-colors
              duration-200
              transform
              bg-blue-500
              rounded
              hover:bg-blue-600
              focus:outline-none focus:bg-blue-600
            "
            @click.prevent="loginUser"
          >
            Login
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
<script setup>
const email = ref("");
const password = ref("");
const errors = ref();
useHead({
  script: [{ src: "/assets/libs/simplebar/simplebar.min.js", body: true }],
});
definePageMeta({
  layout: "auth",
  middleware: "guest",
});

async function loginUser() {
  try {
    const res = await useNuxtApp().$apiFetch("/graphql", {
      body: JSON.stringify({
        query: `
        mutation{
          loginUser(email: "${email.value}",password: "${password.value}",device_name:"web"){
            token
            id
            name
            email
            isAdmin
          }
        }
        `,
      }),
    });
    if (res.errors) {
      errors.value = res.errors[0].message;
    }
    const { setUser } = useAuth();
    setUser({
      id: res.data.loginUser.id,
      name: res.data.loginUser.name,
      email: res.data.loginUser.email,
      token: res.data.loginUser.token,
      isAdmin: res.data.loginUser.isAdmin,
    });
    useNuxtApp().$awn.success("Successufully Logged In!!!");
    setTimeout(() => {
      window.location.href = "/";
    }, 2000);
  } catch (err) {
    useNuxtApp().$awn.alert(errors.value);
  }
}
</script>