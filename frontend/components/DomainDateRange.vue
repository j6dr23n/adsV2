<template>
  <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4 mt-2">
    <div class="md:col-span-2 lg:col-span-2 xl:col-span-2">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Select Domain</h4>
        </div>
        <!--end card-header-->
        <div class="card-body">
          <select
            v-model="search.domain"
            id="multiSelect"
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
              dark:focus:ring-blue-500
              dark:focus:border-blue-500
            "
          >
            <option value="">Select Domain</option>
            <option
              :value="item.id"
              v-for="(item, index) in domains"
              :key="index"
            >
              {{ item.domain }}
            </option>
          </select>
        </div>
        <!--end card-body-->
      </div>
      <!--end card-->
    </div>
    <div class="md:col-span-2 lg:col-span-2 xl:col-span-2">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Select Date</h4>
        </div>
        <div class="card-body">
          <div class="flex">
            <input
              type="date"
              v-model="search.startDate"
              class="
                rounded-none rounded-l
                bg-gray-50
                border border-gray-300
                text-gray-900
                focus:ring-blue-500 focus:border-blue-500
                block
                flex-1
                min-w-0
                w-full
                text-sm
                p-2.5
                dark:bg-slate-700
                dark:border-slate-600
                dark:placeholder-slate-400
                dark:text-white
              "
              placeholder="Start Date"
              aria-label="StartDate"
            />
            <span
              class="
                inline-flex
                items-center
                px-3
                text-sm text-slate-900
                bg-slate-200
                border border-r-0 border-l-0 border-slate-300
                dark:bg-slate-600 dark:text-slate-400 dark:border-slate-600
              "
            >
              to
            </span>
            <input
              type="date"
              v-model="search.endDate"
              class="
                rounded-none rounded-r
                bg-gray-50
                border border-gray-300
                text-gray-900
                focus:ring-blue-500 focus:border-blue-500
                block
                flex-1
                min-w-0
                w-full
                text-sm
                p-2.5
                dark:bg-slate-700
                dark:border-slate-600
                dark:placeholder-slate-400
                dark:text-white
              "
              placeholder="End Date"
              aria-label="EndDate"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
const emit = defineEmits(["searchData", "dateRange"]);
const domains = ref();
useHead({
  script: [
    {
      src: "/assets/libs/vanillajs-datepicker/js/datepicker-full.min.js",
      body: true,
    },
    {
      src: "/assets/libs/mobius1-selectr/selectr.min.js",
      body: true,
    },
  ],
  link: [
    {
      rel: "stylesheet",
      href: "/assets/libs/vanillajs-datepicker/css/datepicker.min.css",
    },
    {
      rel: "stylesheet",
      href: "/assets/libs/mobius1-selectr/selectr.min.css",
    },
  ],
});
const { getUser } = useAuth();
const yesterday = new Date();
yesterday.setDate(yesterday.getDate() - 1);
const search = ref({
  domain: "",
  startDate: yesterday.toISOString().slice(0, 10),
  endDate: new Date().toISOString().slice(0, 10),
});
const fetchDataHandler = ref(null);
async function fetchData() {
  if (search.value.domain !== null) {
    const searchData = await useNuxtApp().$apiFetch("/graphql", {
      body: JSON.stringify({
        query: `
            query{
              ads(user_id:${getUser()?.id},domain_id:${search.value.domain}){
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
    if (Object.values(searchData.data.ads[0]).includes(null)) {
      useNuxtApp().$awn.alert("This Domain has no data!!!");
    }else{
      emit("searchData", searchData.data.ads);
    }
  }
  if (search.value.startDate !== null && search.value.endDate !== null) {
    const dateRange = await useNuxtApp().$apiFetch("/graphql", {
      body: JSON.stringify({
        query: `
          query{
              dateRangeResolver(user_id:${getUser()?.id},startDate:"${
          search.value.startDate
        }",endDate:"${search.value.endDate}") {
                imperssions
                clicks
                revenue
                eCPM
              }
            }
          `,
      }),
    });
    if (Object.values(dateRange.data.dateRangeResolver[0]).includes(null)) {
      useNuxtApp().$awn.alert("This Date Range has no data!!!");
    }else{
      emit("dateRange", dateRange.data.dateRangeResolver);
    }
  }
  if (
    search.value.startDate !== null &&
    search.value.endDate !== null &&
    search.value.domain !== null
  ) {
    const domainDateRange = await useNuxtApp().$apiFetch("/graphql", {
      body: JSON.stringify({
        query: `
          query{
              dateRangeResolver(user_id:${getUser()?.id},domain_id:${
          search.value.domain
        },startDate:"${search.value.startDate}",endDate:"${
          search.value.endDate
        }") {
                imperssions
                clicks
                revenue
                eCPM
              }
            }
          `,
      }),
    });
    if (
      Object.values(domainDateRange.data.dateRangeResolver[0]).includes(null)
    ) {
      useNuxtApp().$awn.alert("This Domain & Date Range has no data!!!");
    }else{
      emit("dateRange", domainDateRange.data.dateRangeResolver);
    }
  }
}

watch(
  search,
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

onMounted(async () => {
  const user = await useNuxtApp().$apiFetch("/graphql", {
    body: JSON.stringify({
      query: `
      query{
        user(id:${getUser()?.id}){
          domains{
            id
            domain
          }
        }
      }
      `,
    }),
  });
  domains.value = user.data.user.domains;
});
</script>