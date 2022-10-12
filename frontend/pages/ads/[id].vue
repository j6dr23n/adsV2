<template>
  <div>
    <BreadCrumb title="Edit Ads" />
    <div
      class="container mx-auto px-2 min-h-[calc(100vh-138px)] relative pb-14"
    >
      <div
        class="
          grid grid-cols-12
          md:grid-cols-12
          lg:grid-cols-12
          xl:grid-cols-12
          gap-4
          mb-4
        "
      >
        <div
          class="
            col-span-12
            sm:col-span-12
            md:col-span-12
            lg:col-span-12
            xl:col-span-12
          "
        >
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Edit Ads</h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
              <div class="relative z-0 mb-6 w-full group">
                <label
                  for="domains"
                  class="
                    block
                    mb-2
                    text-sm
                    font-medium
                    text-gray-900
                    dark:text-gray-400
                  "
                  >User Email</label
                >
                <select
                  id="domains"
                  v-model="ads.user_id"
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
                  :disabled="ads.user?.email"
                >
                  <option :value="ads.user?.id">
                    {{ ads.user?.email }}
                  </option>
                </select>
              </div>
              <div class="relative z-0 mb-6 w-full group">
                <label
                  for="domains"
                  class="
                    block
                    mb-2
                    text-sm
                    font-medium
                    text-gray-900
                    dark:text-gray-400
                  "
                  >Select Domain</label
                >
                <select
                  id="domains"
                  v-model="ads.domain_id"
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
                  :disabled="ads.domain?.domain"
                >
                  <option :value="ads.domain?.id">
                    {{ ads.domain?.domain }}
                  </option>
                </select>
              </div>
              <div class="grid xl:grid-cols-2 xl:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                  <input
                    type="number"
                    v-model="ads.imperssions"
                    name="floating_imperssions"
                    id="floating_imperssions"
                    class="
                      block
                      py-2.5
                      px-0
                      w-full
                      text-sm text-gray-900
                      bg-transparent
                      border-0 border-b border-gray-300
                      appearance-none
                      dark:text-white
                      dark:border-gray-600
                      dark:focus:border-blue-500
                      focus:outline-none focus:ring-0 focus:border-blue-600
                      peer
                    "
                    placeholder=" "
                    required
                  />
                  <label
                    for="floating_imperssions"
                    class="
                      absolute
                      text-sm text-gray-500
                      dark:text-gray-400
                      duration-300
                      transform
                      -translate-y-6
                      scale-75
                      top-3
                      -z-10
                      origin-[0]
                      peer-focus:left-0
                      peer-focus:text-blue-600
                      peer-focus:dark:text-blue-500
                      peer-placeholder-shown:scale-100
                      peer-placeholder-shown:translate-y-0
                      peer-focus:scale-75 peer-focus:-translate-y-6
                    "
                    >Imperssions</label
                  >
                </div>
                <div class="relative z-0 mb-6 w-full group">
                  <input
                    type="number"
                    v-model="ads.clicks"
                    name="floating_clicks"
                    id="floating_clicks"
                    class="
                      block
                      py-2.5
                      px-0
                      w-full
                      text-sm text-gray-900
                      bg-transparent
                      border-0 border-b border-gray-300
                      appearance-none
                      dark:text-white
                      dark:border-gray-600
                      dark:focus:border-blue-500
                      focus:outline-none focus:ring-0 focus:border-blue-600
                      peer
                    "
                    placeholder=" "
                    required
                  />
                  <label
                    for="floating_clicks"
                    class="
                      absolute
                      text-sm text-gray-500
                      dark:text-gray-400
                      duration-300
                      transform
                      -translate-y-6
                      scale-75
                      top-3
                      -z-10
                      origin-[0]
                      peer-focus:left-0
                      peer-focus:text-blue-600
                      peer-focus:dark:text-blue-500
                      peer-placeholder-shown:scale-100
                      peer-placeholder-shown:translate-y-0
                      peer-focus:scale-75 peer-focus:-translate-y-6
                    "
                    >Clicks</label
                  >
                </div>
              </div>
              <div class="grid xl:grid-cols-2 xl:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                  <input
                    type="number"
                    v-model="ads.revenue"
                    name="floating_revenue"
                    id="floating_revenue"
                    class="
                      block
                      py-2.5
                      px-0
                      w-full
                      text-sm text-gray-900
                      bg-transparent
                      border-0 border-b border-gray-300
                      appearance-none
                      dark:text-white
                      dark:border-gray-600
                      dark:focus:border-blue-500
                      focus:outline-none focus:ring-0 focus:border-blue-600
                      peer
                    "
                    placeholder=" "
                    required
                  />
                  <label
                    for="floating_revenue"
                    class="
                      absolute
                      text-sm text-gray-500
                      dark:text-gray-400
                      duration-300
                      transform
                      -translate-y-6
                      scale-75
                      top-3
                      -z-10
                      origin-[0]
                      peer-focus:left-0
                      peer-focus:text-blue-600
                      peer-focus:dark:text-blue-500
                      peer-placeholder-shown:scale-100
                      peer-placeholder-shown:translate-y-0
                      peer-focus:scale-75 peer-focus:-translate-y-6
                    "
                    >Revenue</label
                  >
                </div>
                <div class="relative z-0 mb-6 w-full group">
                  <input
                    type="number"
                    v-model="ads.eCPM"
                    name="floating_eCPM"
                    id="floating_eCPM"
                    class="
                      block
                      py-2.5
                      px-0
                      w-full
                      text-sm text-gray-900
                      bg-transparent
                      border-0 border-b border-gray-300
                      appearance-none
                      dark:text-white
                      dark:border-gray-600
                      dark:focus:border-blue-500
                      focus:outline-none focus:ring-0 focus:border-blue-600
                      peer
                    "
                    placeholder=" "
                    required
                  />
                  <label
                    for="floating_eCPM"
                    class="
                      absolute
                      text-sm text-gray-500
                      dark:text-gray-400
                      duration-300
                      transform
                      -translate-y-6
                      scale-75
                      top-3
                      -z-10
                      origin-[0]
                      peer-focus:left-0
                      peer-focus:text-blue-600
                      peer-focus:dark:text-blue-500
                      peer-placeholder-shown:scale-100
                      peer-placeholder-shown:translate-y-0
                      peer-focus:scale-75 peer-focus:-translate-y-6
                    "
                    >eCPM</label
                  >
                </div>
              </div>
              <div class="relative z-0 mb-6 w-full group">
                <input
                  type="date"
                  v-model="ads.created_at"
                  name="floating_email"
                  class="
                    block
                    py-2.5
                    px-0
                    w-full
                    text-sm text-gray-900
                    bg-transparent
                    border-0 border-b border-gray-300
                    appearance-none
                    dark:text-white
                    dark:border-gray-600
                    dark:focus:border-blue-500
                    focus:outline-none focus:ring-0 focus:border-blue-600
                    peer
                  "
                  placeholder=" "
                  required
                />
                <label
                  for="floating_email"
                  class="
                    absolute
                    text-sm text-gray-500
                    dark:text-gray-400
                    duration-300
                    transform
                    -translate-y-6
                    scale-75
                    top-3
                    -z-10
                    origin-[0]
                    peer-focus:left-0
                    peer-focus:text-blue-600
                    peer-focus:dark:text-blue-500
                    peer-placeholder-shown:scale-100
                    peer-placeholder-shown:translate-y-0
                    peer-focus:scale-75 peer-focus:-translate-y-6
                  "
                  >Select Date</label
                >
              </div>
              <button
                @click.prevent="updateAds"
                class="btn bg-blue-500 text-white hover:bg-blue-600"
              >
                Submit
              </button>
            </div>
            <!--end card-body-->
          </div>
          <!--end card-->
        </div>
        <!--end col-->
      </div>
    </div>
  </div>
</template>
<script setup>
import moment from "moment";
definePageMeta({
  middleware: "admin",
});
useHead({
  title: "Edit ads",
});
const errors = ref();
const ads = ref({
  user_id: "",
  domain_id: "",
  imperssions: 0,
  clicks: 0,
  revenue: 0,
  eCPM: 0,
  created_at: new Date().toISOString().slice(0, 10),
});
const res = await useNuxtApp().$apiFetch("/graphql", {
  body: JSON.stringify({
    query: `
        query{
          ads(id:${useRoute().params.id}){
            user{
              id
              email
            }
            domain{
              id
              domain
            }
            user_id
            domain_id
            id
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
async function updateAds() {
  try {
    const res = await useNuxtApp().$apiFetch("/graphql", {
      body: JSON.stringify({
        query: `
        mutation{
          updateAds(id:${useRoute().params.id},user_id:${
          ads.value.user_id
        },domain_id:${ads.value.domain_id},imperssions:${
          ads.value.imperssions
        },clicks:${ads.value.clicks},revenue:${ads.value.revenue},eCPM:${
          ads.value.eCPM
        },created_at:"${ads.value.created_at}"){
            user{
              id
              email
            }
            domain{
              id
              domain
            }
            user_id
            domain_id
            id
            imperssions
            clicks
            revenue
            eCPM
          }
        }
        `,
      }),
    });
    if (res.errors) {
      errors.value = res.errors[0].message;
      useNuxtApp().$awn.alert(errors.value);
    }
    if (res.data) {
      ads.value = res.data.updateAds;
      useNuxtApp().$awn.success("Successufully Updated Ads!!!");
    }
  } catch (err) {
    useNuxtApp().$awn.alert("Something Wrong!!!");
  }
}
onMounted(() => {
  ads.value = res.data.ads[0];
  ads.value.created_at = moment(res.data.ads[0].created_at).format("YYYY-MM-DD");
});
</script>