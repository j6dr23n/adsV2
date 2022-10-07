<template>
  <div>
    <BreadCrumb title="Users List" />
    <div
      class="container mx-auto px-2 min-h-[calc(100vh-138px)] relative pb-14"
    >
      <div
        class="
          grid
          md:grid-cols-12
          lg:grid-cols-12
          xl:grid-cols-12
          gap-4
          mb-4
          mt-2
        "
      >
        <div
          class="sm:col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-12"
        >
          <Table>
            <thead class="justify-between">
              <tr class="bg-gray-800 dark:bg-slate-700">
                <th scope="col" class="px-5 py-3 text-slate-200">#ID</th>
                <th scope="col" class="px-5 py-3 text-slate-200">Name</th>
                <th scope="col" class="px-5 py-3 text-slate-200">Email</th>
                <th scope="col" class="px-5 py-3 text-slate-200">isAdmin</th>
                <th scope="col" class="px-5 py-3 text-slate-200">Joined At</th>
                <th scope="col" class="px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-gray-200">
              <tr
                class="bg-white dark:bg-slate-900/95"
                v-for="(item, index) in users"
                :key="index"
              >
                <td class="px-5 py-3">
                  <span>{{ item?.id }}</span>
                </td>

                <td class="px-5 py-3">
                  <span>{{ item?.name }}</span>
                </td>
                <td class="px-5 py-3">
                  <span>{{ item?.email }}</span>
                </td>
                <td class="px-5 py-3">
                  <span :class="item.isAdmin ? 'text-green-600 bg-gray-300 py-3 px-2 rounded' : ''">{{ item?.isAdmin === 1 ? "Admin" : "Member" }}</span>
                </td>
                <td class="px-5 py-3">
                  <span>{{
                    moment(item?.created_at).format("MMM Do YY")
                  }}</span>
                </td>
                <td class="px-6 py-4 text-right">
                  <a
                    :href="'/user/' + item?.id"
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
        </div>
        <!--end col-->
        <Footer />
      </div>
    </div>
  </div>
</template>
<script setup>
import moment from "moment";
const users = ref({});

const res = await useNuxtApp().$apiFetch("/graphql", {
  body: JSON.stringify({
    query: `
        query{
            users{
                data{
                    id
                    name
                    email
                    isAdmin
                    created_at
                }
            }
        }
    `,
  }),
});
onMounted(() => {
  users.value = res.data.users.data;
});
</script>