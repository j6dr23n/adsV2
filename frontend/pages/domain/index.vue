<template>
  <div>
    <BreadCrumb title="Domain List" />
    <div
      class="container mx-auto px-2 min-h-[calc(100vh-138px)] relative pb-14"
    >
      <Table title="Domains">
        <thead class="justify-between">
          <tr class="bg-gray-800 dark:bg-slate-700">
            <th scope="col" class="px-5 py-3 text-slate-200">#ID</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Email</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Domain</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Created At</th>
            <th scope="col" class="px-6 py-3">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody class="bg-gray-200">
          <tr
            class="bg-white dark:bg-slate-900/95"
            v-for="(item, index) in domains"
            :key="index"
          >
            <td class="px-5 py-3">
              <span>{{ item?.id }}</span>
            </td>

            <td class="px-5 py-3">
              <span>{{ item?.user.email }}</span>
            </td>
            <td class="px-5 py-3">
              <a
                class="
                  bg-primary-500
                  text-white
                  px-3
                  py-2
                  border
                  rounded
                  text-sm
                  hover:bg-white hover:border-primary-500-500 hover:text-black
                "
                :href="item?.domain"
                >{{ item?.domain }}</a
              >
            </td>
            <td class="px-5 py-3">
              <span>{{ moment(item?.created_at).format("MMM Do YY") }}</span>
            </td>
            <td class="px-6 py-4 text-right">
              <a
                :href="'/domain/' + item?.id"
                class="
                  font-medium
                  text-blue-600
                  dark:text-blue-500
                  hover:underline
                "
                >Edit</a
              >
            </td>
          </tr>
        </tbody>
      </Table>
      <Footer />
    </div>
    <!--end col-->
  </div>
</template>
  <script setup>
import moment from "moment";
useHead({
  title: "All domain"
})
definePageMeta({
  middleware: "admin",
});
const domains = ref({});

const res = await useNuxtApp().$apiFetch("/graphql", {
  body: JSON.stringify({
    query: `
          query{
              domains{
                id
                user{
                  email
                }
                domain
                created_at
              }
          }
      `,
  }),
});
onMounted(() => {
  domains.value = res.data.domains;
});
</script>