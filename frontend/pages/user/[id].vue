<template>
  <div>
    <BreadCrumb title="Edit User" />
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
          class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-12"
        >
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Edit User</h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
              <div class="relative z-0 mb-6 w-full group">
                <input
                  type="text"
                  v-model="user.name"
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
                  >Name</label
                >
              </div>
              <div class="relative z-0 mb-6 w-full group">
                <input
                  type="email"
                  v-model="user.email"
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
                  >Email address</label
                >
              </div>
              <div class="relative z-0 mb-6 w-full group">
                <input
                  type="password"
                  v-model="user.password"
                  name="floating_password"
                  id="floating_password"
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
                  for="floating_password"
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
                  >Password</label
                >
              </div>
              <div class="flex items-start mb-6">
                <div class="text-sm">
                  <label class="custom-label dark:text-slate-400">
                    <div
                      class="
                        bg-white
                        dark:bg-slate-700
                        border border-slate-200
                        dark:border-slate-600
                        rounded
                        w-4
                        h-4
                        inline-block
                        leading-4
                        text-center
                        -mb-[3px]
                      "
                    >
                      <input
                        v-model="user.isAdmin"
                        type="checkbox"
                        class="hidden"
                      />
                      <i
                        class="
                          fas
                          fa-check
                          hidden
                          text-xs text-slate-700
                          dark:text-slate-300
                        "
                      ></i>
                    </div>
                    Admin?
                  </label>
                </div>
              </div>
              <button
                @click.prevent="updateUser"
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
import $ from "jquery";
const user = ref({
  isAdmin: false,
});
const resUser = await useNuxtApp().$apiFetch("/graphql", {
  body: JSON.stringify({
    query: `
          query{
              user(id:${useRoute().params.id}){
                name
                email
                isAdmin
              }
          }
          `,
  }),
});

async function updateUser() {
  try {
    const res = await useNuxtApp().$apiFetch("/graphql", {
      body: JSON.stringify({
        query: `
          mutation{
              updateUser(id:${Number(useRoute().params.id)},name:"${
          user.value.name
        }",email:"${user.value.email}",password:"${
          user.value.password
        }",isAdmin:${user.value.isAdmin === true ? 1 : 0}){
                id
                name
                email
                isAdmin
            }
          }
          `,
      }),
    });
    user.value = res.data.updateUser;
    useNuxtApp().$awn.success("Successufully Updated User!!!");
  } catch (err) {
    useNuxtApp().$awn.alert("Something Wrong!!! - " + err);
  }
}
onMounted(() => {
  user.value = resUser.data.user;
});
</script>