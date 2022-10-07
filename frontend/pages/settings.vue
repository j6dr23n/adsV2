<template>
  <div>
    <BreadCrumb title="Settings" />
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
        <div class="col-span-12 md:col-span-12 lg:col-span-12">
          <div id="Settings" aria-labelledby="Settings-tab">
            <div
              class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4"
            >
              <div
                class="col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-12"
              >
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Personal Information</h4>
                  </div>
                  <!--end card-header-->
                  <div class="card-body">
                    <form>
                      <div class="grid md:grid-cols-12 lg:grid-cols-12">
                        <div
                          class="
                            col-span-12
                            md:col-span-12
                            lg:col-span-3
                            self-center
                            text-right
                            mr-2
                          "
                        >
                          <label for="First_Name" class="label">Name</label>
                        </div>
                        <!--end col-->
                        <div
                          class="col-span-12 md:col-span-12 lg:col-span-9 mb-2"
                        >
                          <input
                            type="text"
                            id="First_Name"
                            class="form-control"
                            :value="user?.name"
                            placeholder="name"
                            required
                            disabled
                            readonly
                          />
                        </div>
                        <!--end col-->
                        <div
                          class="
                            col-span-12
                            md:col-span-12
                            lg:col-span-3
                            self-center
                            text-right
                            mr-2
                          "
                        >
                          <label for="Your_Email" class="label"
                            >Your email</label
                          >
                        </div>
                        <!--end col-->
                        <div
                          class="col-span-12 md:col-span-12 lg:col-span-9 mb-2"
                        >
                          <input
                            type="email"
                            id="Your_Email"
                            class="form-control"
                            :value="user.email"
                            placeholder="Last name"
                            required
                            disabled
                            readonly
                          />
                        </div>
                        <!--end col-->
                      </div>
                      <!--end grid-->
                    </form>
                  </div>
                  <!--end card-body-->
                </div>
                <!--end card-->
              </div>
              <!--end col-->
              <div
                class="col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-12"
              >
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Change Password</h4>
                  </div>
                  <!--end card-header-->
                  <div class="card-body">
                    <form>
                      <div class="grid md:grid-cols-12 lg:grid-cols-12">
                        <div
                          class="
                            col-span-12
                            md:col-span-12
                            lg:col-span-3
                            self-center
                            text-right
                            mr-2
                          "
                        >
                          <label for="Current_Password" class="label"
                            >Current Password</label
                          >
                        </div>
                        <!--end col-->
                        <div
                          class="col-span-12 md:col-span-12 lg:col-span-9 mb-2"
                        >
                          <input
                            type="password"
                            v-model="input.old_password"
                            id="Current_Password"
                            class="form-control"
                            placeholder="Current Password"
                            required
                          />
                        </div>
                        <!--end col-->
                        <div
                          class="
                            col-span-12
                            md:col-span-12
                            lg:col-span-3
                            self-center
                            text-right
                            mr-2
                          "
                        >
                          <label for="New_Password" class="label"
                            >New Password</label
                          >
                        </div>
                        <!--end col-->
                        <div
                          class="col-span-12 md:col-span-12 lg:col-span-9 mb-2"
                        >
                          <input
                            type="password"
                            id="New_Password"
                            v-model="input.new_password"
                            class="form-control"
                            placeholder="New Password"
                            required
                          />
                        </div>
                        <!--end col-->
                        <div class="col-start-4 col-end-13 mb-2">
                          <button
                            type="submit"
                            @click.prevent="updatePassword"
                            class="
                              btn
                              bg-blue-500
                              text-white
                              hover:bg-blue-600
                              mr-2
                            "
                          >
                            Change Password
                          </button>
                          <button
                            type="submit"
                            class="btn bg-red-500 text-white hover:bg-red-600"
                          >
                            Cancel
                          </button>
                        </div>
                        <!--end col-->
                      </div>
                      <!--end grid-->
                    </form>
                  </div>
                  <!--end card-body-->
                </div>
                <!--end card-->
              </div>
              <!--end col-->
            </div>
            <!--end grid-->
          </div>
        </div>

        <!--end col-->
        <Footer />
      </div>
    </div>
  </div>
</template> 
<script setup>
definePageMeta({
  middleware: "auth",
});
const { getUser } = useAuth();
const input = ref({
  old_password: "",
  new_password: "",
});
const user = ref({});
function updatePassword() {
  const res = useNuxtApp().$apiFetch("/graphql", {
    body: JSON.stringify({
      query: `
      mutation{
        changeUserPassword(user_id:${getUser()?.id},old_password:"${
        input.value.old_password
      }",new_password:"${input.value.new_password}") {
          status
        }
      }
    `,
    }),
  });
  useNuxtApp().$awn.success("Password Successufully Changed!!!");
}
onMounted(async () => {
  const resUser = await useNuxtApp().$apiFetch("/graphql", {
    body: JSON.stringify({
      query: `
      query{
        user(id:${getUser()?.id}){
          name
          email
        }
      }
    `,
    }),
  });
  user.value = resUser.data.user;
});
</script>