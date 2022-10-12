<template>
  <div>
    <BreadCrumb title="Users List" />
    <div
      class="container mx-auto px-2 min-h-[calc(100vh-138px)] relative pb-14"
    >
      <Table title="Users">
        <thead class="justify-between">
          <tr class="bg-gray-800 dark:bg-slate-700">
            <th scope="col" class="px-5 py-3 text-slate-200">#ID</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Name</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Email</th>
            <th scope="col" class="px-5 py-3 text-slate-200">isAdmin</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Joined At</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Edit</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Delete</th>
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
              <span
                :class="
                  item.isAdmin
                    ? 'text-green-600 bg-gray-300 py-3 px-2 rounded'
                    : ''
                "
                >{{ item?.isAdmin === 1 ? "Admin" : "Member" }}</span
              >
            </td>
            <td class="px-5 py-3">
              <span>{{ moment(item?.created_at).format("MMM Do YY") }}</span>
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
            <td class="px-6 py-4 text-right">
              <a
                @click="deleteUser(item?.id)"
                class="
                  font-medium
                  text-red-600
                  dark:text-red-500
                  hover:underline
                "
                >Delete</a
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
  title: "All user",
});
definePageMeta({
  middleware: "admin",
});
const users = ref({});

const res = await useNuxtApp().$apiFetch("/graphql", {
  body: JSON.stringify({
    query: `
        query{
            users{
              id
              name
              email
              isAdmin
              created_at
            }
        }
    `,
  }),
});
function deleteUser(id) {
  let onOk = () => {
    const resDeleteUser = useNuxtApp().$apiFetch("/graphql", {
      body: JSON.stringify({
        query: `
        mutation{
          deleteUser(id:${id}){
            id
          }
        }
      `,
      }),
    });
    useNuxtApp().$awn.success("This User Deleted!!!");
    location.reload(true);
  };
  let onCancel = () => {
    useNuxtApp().$awn.info("You pressed Cancel");
  };
  useNuxtApp().$awn.confirm("Are u sure to delete?", onOk, onCancel, {
    labels: {
      confirm: "Dangerous action",
    },
  });
}
onMounted(() => {
  users.value = res.data.users;
});
</script>