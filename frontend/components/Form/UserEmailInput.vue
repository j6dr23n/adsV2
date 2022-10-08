<template>
  <div class="relative z-0 mb-6 w-full group">
    <label
      for="countries"
      class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"
      >User Email</label
    >
    <select
      id="userEmail"
      v-model="user.id"
      class="
        bg-gray-50
        border border-gray-300
        text-gray-900 text-sm
        rounded-lg
        focus:ring-blue-500 focus:border-blue-500
        block
        w-full
        p-2.5
        dark:bg-gray-700
        dark:border-gray-600
        dark:placeholder-gray-400
        dark:text-white
        dark:focus:ring-blue-400
        dark:focus:border-blue-400
        dark:focus-visible:outline-none
      "
    >
      <option value="">Select User Email</option>
      <option :value="item?.id" v-for="(item, index) in users" :key="index">
        {{ item?.email }}
      </option>
    </select>
  </div>
</template>
<script setup>
const emit = defineEmits(["userDomain", "selectedUser"]);
const users = ref({});
const user = ref({
  id: "",
});
const fetchDataHandler = ref(null);
watch(
  user,
  () => {
    clearTimeout(fetchDataHandler.value);
    fetchDataHandler.value = setTimeout(() => {
      fetchData();
    }, 300);
  },
  {
    deep: true,
  }
);

async function fetchData() {
  const resDomain = await useNuxtApp().$apiFetch("/graphql", {
    body: JSON.stringify({
      query: `
        query{
            user(id: ${Number(user.value.id)}){
                id
                domains{
                    id
                    domain
                }
            }
        }
        `,
    }),
  });
  emit("userDomain", resDomain.data.user.domains);
  emit("selectedUser", user.value.id);
}

const resUser = await useNuxtApp().$apiFetch("/graphql", {
  body: JSON.stringify({
    query: `
        query{
            users{
              id
              email
          }
        }
        `,
  }),
});
onMounted(() => {
  users.value = resUser.data.users;
});
</script>