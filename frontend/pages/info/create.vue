<template>
  <div>
    <BreadCrumb title="Create Info" />
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
              <h4 class="card-title">Create Info</h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
              <div class="relative z-0 mb-6 w-full group">
                <input
                  type="text"
                  v-model="alert.text"
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
                  >Text</label
                >
              </div>
              <button
                @click.prevent="createInfo"
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
useHead({
  title: "Create alert",
});
definePageMeta({
  middleware: "admin",
});
const alert = ref({});
async function createInfo() {
  try {
    const res = await useNuxtApp().$apiFetch("/graphql", {
      body: JSON.stringify({
        query: `
          mutation{
              createInfo(text:"${alert.value.text}"){
                id
              }
          }
        `,
      }),
    });
    alert.value = ref({});
    useNuxtApp().$awn.success("Successufully Created Alert!!!");
  } catch (err) {
    useNuxtApp().$awn.alert("Something Wrong!!! - " + err);
  }
}
</script>