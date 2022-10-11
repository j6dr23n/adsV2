<template>
  <div>
    <BreadCrumb title="Reports" />
    <div
      class="container mx-auto px-2 min-h-[calc(100vh-138px)] relative pb-14"
    >
      <Alert />
      <DomainDateRange @search-data="searchData" @date-range="dateRange" />

      <Table title="Reports">
        <thead class="justify-between">
          <tr class="bg-gray-800 dark:bg-slate-700">
            <th scope="col" class="px-5 py-3 text-slate-200">#ID</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Date</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Domain</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Imperssions</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Clicks</th>
            <th scope="col" class="px-5 py-3 text-slate-200">Revenue</th>
            <th scope="col" class="px-5 py-3 text-slate-200">eCPM</th>
          </tr>
        </thead>
        <tbody class="bg-gray-200">
          <tr
            class="bg-white dark:bg-slate-900/95"
            v-for="(item, index) in reports"
            :key="index"
          >
            <td>
              <span class="text-center ml-2 font-medium">{{
                item.hasOwnProperty("id") ? item?.id : 0
              }}</span>
            </td>
            <td class="px-5 py-3">
              <span>{{ moment(item?.created_at).format("MMM Do YY") }}</span>
            </td>
            <td class="px-5 py-3">
              <a
                :href="item?.domain?.domain"
                class="
                  text-black
                  px-3
                  py-2
                  text-sm
                  hover:bg-white hover:border-primary-500-500 hover:text-black
                "
              >
                {{
                  item.hasOwnProperty("domain")
                    ? item?.domain?.domain?.substring(0, 30)
                    : "Totals"
                }}
              </a>
            </td>
            <td class="px-5 py-3">
              <span>{{
                item?.imperssions !== null
                  ? nFormatter(item?.imperssions, 1)
                  : 0
              }}</span>
            </td>

            <td class="px-5 py-3">
              <span>{{
                item?.clicks !== null ? nFormatter(item?.clicks, 1) : 0
              }}</span>
            </td>
            <td class="px-5 py-3">
              <span
                >${{
                  item?.revenue !== null ? nFormatter(item?.revenue, 1) : 0
                }}</span
              >
            </td>
            <td class="px-5 py-3">
              <span
                >${{
                  item?.eCPM !== null ? nFormatter(item?.eCPM, 1) : 0
                }}</span
              >
            </td>
          </tr>
        </tbody>
      </Table>
      <Footer />
    </div>
  </div>
</template>
<script setup>
import moment from "moment";
useHead({
  title: "Reports",
});
definePageMeta({
  middleware: "auth",
});
function nFormatter(num, digits) {
  const lookup = [
    { value: 1, symbol: "" },
    { value: 1e3, symbol: "k" },
    { value: 1e6, symbol: "M" },
    { value: 1e9, symbol: "G" },
    { value: 1e12, symbol: "T" },
    { value: 1e15, symbol: "P" },
    { value: 1e18, symbol: "E" },
  ];
  const rx = /\.0+$|(\.[0-9]*[1-9])0+$/;
  var item = lookup
    .slice()
    .reverse()
    .find(function (item) {
      return num >= item.value;
    });
  return item
    ? (num / item.value).toFixed(digits).replace(rx, "$1") + item.symbol
    : "0";
}
const reports = ref([]);
const { getUser, isAdmin } = useAuth();

async function searchData(val) {
  reports.value = val;
}

async function dateRange(val) {
  reports.value = val;
}

onMounted(async () => {
  if (!isAdmin) {
    const res = await useNuxtApp().$apiFetch("/graphql", {
      body: JSON.stringify({
        query: `
      query{
        ads(user_id:${getUser()?.id}){
          id
          imperssions
          clicks
          domain{
            domain
          }
          eCPM
          revenue
          created_at
        }
      }
      `,
      }),
    });
    reports.value = res.data.ads;
  }
  if (isAdmin) {
    const res = await useNuxtApp().$apiFetch("/graphql", {
      body: JSON.stringify({
        query: `
      query{
        ads{
          id
          imperssions
          clicks
          domain{
            domain
          }
          eCPM
          revenue
          created_at
        }
      }
      `,
      }),
    });
    reports.value = res.data.ads;
  }
});
</script>