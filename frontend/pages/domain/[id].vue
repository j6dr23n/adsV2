<template>
  <div>
    <BreadCrumb title="Edit Domain" />
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
              <h4 class="card-title">Edit Domain</h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
              <div class="relative z-0 mb-6 w-full group">
                <input
                  type="url"
                  v-model="email"
                  name="floating_email"
                  id="floating_email"
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
                    cursor-not-allowed
                  "
                  placeholder=" "
                  disabled
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
                  >Email</label
                >
              </div>
              <div class="relative z-0 mb-6 w-full group">
                <input
                  type="url"
                  v-model="domain.domain"
                  name="floating_domain"
                  id="floating_domain"
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
                />
                <label
                  for="floating_domain"
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
                  >Domain</label
                >
              </div>
              <button
                @click.prevent="updateDomain"
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
definePageMeta({
  middleware: "admin",
});
useHead({
  title: "Edit domain"
})
const domain = ref({});
const email = ref(null);
const resDomain = await useNuxtApp().$apiFetch("/graphql", {
  body: JSON.stringify({
    query: `
    query{
        domain(id:${useRoute().params.id}){
            id
            user{
                email
            }
            domain
        }
    }
    `,
  }),
});

async function updateDomain() {
  try {
    const res = await useNuxtApp().$apiFetch("/graphql", {
      body: JSON.stringify({
        query: `
          mutation{
              updateDomain(id:${domain.value.id},domain:"${domain.value.domain}"){
                id
              }
          }
          `,
      }),
    });
    domain.value = ref();
    useNuxtApp().$awn.success("Successufully Updated Domain!!!");
  } catch (err) {
    useNuxtApp().$awn.alert("Something Wrong!!! - " + err);
  }
}
onMounted(async () => {
  domain.value = resDomain.data.domain[0];
  email.value = resDomain.data.domain[0].user.email;
});
</script>