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
                            class="form-control cursor-not-allowed"
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
                            class="form-control cursor-not-allowed"
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
              <div
                class="col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-12"
              >
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Your Tokens</h4>
                  </div>
                  <!--end card-header-->
                  <div class="card-body">
                    <form>
                      <label for="email-adress-icon" class="label"
                        >Your Email</label
                      >
                      <div class="relative" bis_skin_checked="1">
                        <div
                          class="
                            flex
                            absolute
                            inset-y-0
                            left-0
                            items-center
                            pl-3
                            pointer-events-none
                          "
                          bis_skin_checked="1"
                        >
                          <i class="ti ti-mail z-[1] dark:text-slate-500"></i>
                        </div>
                        <input
                          type="text"
                          v-model="user.email"
                          id="email-adress-icon"
                          class="form-control pl-10 p-2.5 cursor-not-allowed"
                          placeholder="name@t-wind.com"
                          disabled
                        />
                      </div>
                    </form>
                    <form class="mt-4">
                      <label for="email-adress-icon" class="label"
                        >Your Tokens</label
                      >
                      <div
                        class="relative mt-2"
                        bis_skin_checked="1"
                        v-for="(item, index) in tokens"
                        :key="index"
                      >
                        <div
                          class="
                            flex
                            absolute
                            inset-y-0
                            left-0
                            items-center
                            pl-3
                            pointer-events-none
                          "
                          bis_skin_checked="1"
                        >
                          <i class="ti ti-key z-[1] dark:text-slate-500"></i>
                        </div>
                        <input
                          type="text"
                          v-if="showPassword"
                          v-model="item.token"
                          id="email-adress-icon"
                          class="form-control pl-10 p-2.5 cursor-not-allowed"
                          placeholder="name@t-wind.com"
                          disabled
                        />
                        <input
                          v-else
                          type="password"
                          v-model="item.token"
                          id="email-adress-icon"
                          class="form-control pl-10 p-2.5 cursor-not-allowed"
                          placeholder="name@t-wind.com"
                          disabled
                        />
                        <div
                          class="
                            flex
                            absolute
                            inset-y-0
                            right-0
                            items-center
                            pr-4
                          "
                          @click="toggleShow"
                          bis_skin_checked="1"
                        >
                          <i class="ti ti-eye z-[1] dark:text-slate-500"></i>
                        </div>
                      </div>
                      <button
                        @click.prevent="revokeUserTokens"
                        class="btn bg-red-500 mt-2 text-white"
                      >
                        Delete All Tokens
                      </button>
                    </form>
                  </div>
                  <!--end card-body-->
                </div>
                <!--end card-->
              </div>
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
useHead({
  title: "Settings"
})
definePageMeta({
  middleware: "auth",
});
const { getUser, removeUser } = useAuth();
const input = ref({
  old_password: "",
  new_password: "",
});
const user = ref({});
const tokens = ref({});
const showPassword = ref(false);

function toggleShow() {
  showPassword.value = !showPassword.value;
}
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

function revokeUserTokens() {
  let onOk = () => {
    const resRevokeTokens = useNuxtApp().$apiFetch("/graphql", {
      body: JSON.stringify({
        query: `
        mutation{
          revokeUserTokens(email:"${user.value.email}"){
            status
          }
        }
      `,
      }),
    });
    useNuxtApp().$awn.success("All of your token has been deleted!!!");
    setTimeout(() => {
      removeUser();
      window.location.href = "/";
    }, 2000);
  };
  let onCancel = () => {
    useNuxtApp().$awn.info("You pressed Cancel");
  };
  useNuxtApp().$awn.confirm(
    "This will log you out of JinnAdx from every device you're currently logged in on.",
    onOk,
    onCancel,
    {
      labels: {
        confirm: "Dangerous action",
      },
    }
  );
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
  const resTokens = await useNuxtApp().$apiFetch("/graphql", {
    body: JSON.stringify({
      query: `
      query{
        userTokens(email:"${getUser()?.email}"){
          id
          token
          name
          last_used_at
        }
      }
    `,
    }),
  });
  tokens.value = resTokens.data.userTokens;
  user.value = resUser.data.user;
});
</script>