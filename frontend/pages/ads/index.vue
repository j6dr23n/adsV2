<template>
  <div>
    <BreadCrumb title="Ads List" />
    <div
      class="container mx-auto px-2 min-h-[calc(100vh-138px)] relative pb-14"
    >
      <Table title="Ads">
        <thead class="justify-between">
          <tr class="bg-gray-800 dark:bg-slate-700">
            <th scope="col" class="px-5 py-3 text-slate-200">#ID</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Email</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Domain</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Imperssions</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Clicks</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Revenue</th>
            <th scope="col" class="px-5 py-3 text-slate-200">eCPM</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Created At</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Edit</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Delete</th>
          </tr>
        </thead>
        <tbody class="bg-gray-200">
          <tr
            class="bg-white dark:bg-slate-900/95"
            v-for="(item, index) in ads"
            :key="index"
          >
            <td class="px-5 py-3">
              <span>{{ item?.id }}</span>
            </td>

            <td class="px-5 py-3">
              <span>{{ item?.user?.email }}</span>
            </td>

            <td class="px-5 py-3">
              <span>{{ item?.domain?.domain }}</span>
            </td>

            <td class="px-5 py-3">
              <span>{{ item?.imperssions }}</span>
            </td>
            <td class="px-5 py-3">
              <span>{{ item?.clicks }}</span>
            </td>
            <td class="px-5 py-3">
              <span>{{ item?.revenue }}</span>
            </td>
            <td class="px-5 py-3">
              <span>{{ item?.eCPM }}</span>
            </td>
            <td class="px-5 py-3">
              <span>{{ moment(item?.created_at).format("MMM Do YY") }}</span>
            </td>
            <td class="px-6 py-4 text-right">
              <a
                :href="'/ads/' + item?.id"
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
                @click="deleteAds(item?.id)"
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
definePageMeta({
  middleware: "admin",
});
useHead({
  title: "All ads",
});
const ads = ref();

const res = await useNuxtApp().$apiFetch("/graphql", {
  body: JSON.stringify({
    query: `
        query{
            ads{
              id
              domain{
                domain
              }
              user{
                email
              }
              imperssions
              clicks
              revenue
              eCPM
              created_at
            }
        }
    `,
  }),
});
function deleteAds(id) {
  let onOk = () => {
    const resDeleteAds = useNuxtApp().$apiFetch("/graphql", {
      body: JSON.stringify({
        query: `
        mutation{
          deleteAds(id:${id}){
            id
          }
        }
      `,
      }),
    });
    useNuxtApp().$awn.success("This Ads Deleted!!!");
    location.reload(true)
  };
  let onCancel = () => {
    useNuxtApp().$awn.info("You pressed Cancel");
  };
  useNuxtApp().$awn.confirm(
    "Are u sure to delete?",
    onOk,
    onCancel,
    {
      labels: {
        confirm: "Dangerous action",
      },
    }
  );
}
onMounted(() => {
  ads.value = res.data.ads;
});
</script>