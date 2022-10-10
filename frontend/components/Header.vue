<template>
  <!-- leftbar-tab-menu -->
  <nav
    class="
      border-gray-200
      bg-gray-900
      px-2.5
      py-2.5
      shadow-sm
      dark:bg-slate-800
      sm:px-4
      block
      print:hidden
    "
  >
    <div
      class="container mx-0 flex max-w-full flex-wrap items-center lg:mx-auto"
    >
      <div class="flex items-center">
        <NuxtLink to="/dashboard" class="flex items-center outline-none">
          <img src="/assets/images/logo-sm.png" alt="" class="h-6" />
          <img
            src="/assets/images/logo.png"
            alt=""
            class="ml-2 hidden xl:block mt-1"
          />
        </NuxtLink>
      </div>

      <div
        class="
          order-2
          hidden
          w-full
          items-center
          justify-between
          md:order-1 md:ml-5 md:flex md:w-auto
        "
        id="mobile-menu-2"
      >
        <ul
          class="
            font-body
            mt-4
            flex flex-col
            font-medium
            md:mt-0 md:flex-row md:text-sm md:font-medium
            space-x-0
            md:space-x-4
            lg:space-x-6
            xl:space-x-8
            navbar
          "
        >
          <li class="dropdown">
            <button
              id="navDashboardLink"
              class="
                dropdown-toggle
                flex
                w-full
                items-center
                border-b border-gray-800
                py-2
                px-3
                font-medium
                md:border-0 md:p-0
              "
            >
              <a href="/dashboard"
                ><i class="ti ti-smart-home mr-1 pb-1 text-lg"></i>
                Dashboards</a
              >
            </button>
          </li>
          <li class="dropdown">
            <button
              id="navReportsLink"
              class="
                dropdown-toggle
                flex
                w-full
                items-center
                border-b border-gray-800
                py-2
                px-3
                font-medium
                md:border-0 md:p-0
              "
            >
              <a href="/reports"
                ><i class="ti ti-chart-line mr-1 pb-1 text-lg"></i> Reports</a
              >
            </button>
          </li>
          <li class="dropdown">
            <button
              id="navFAQLink"
              class="
                dropdown-toggle
                flex
                w-full
                items-center
                border-b border-gray-800
                py-2
                px-3
                font-medium
                md:border-0 md:p-0
              "
            >
              <a href="/faqs"
                ><i class="ti ti-question-mark mr-1 pb-1 text-lg"></i> FAQs</a
              >
            </button>
          </li>
          <ClientOnly>
            <li class="dropdown" v-if="isAdmin">
              <button
                id="navUserLink"
                data-dropdown-toggle="navUser"
                class="
                  dropdown-toggle
                  flex
                  w-full
                  items-center
                  border-b border-gray-800
                  py-2
                  px-3
                  font-medium
                  md:border-0 md:p-0
                "
              >
                <i class="ti ti-user mr-1 pb-1 text-lg"></i> User
                <i class="ti ti-chevron-down ml-auto lg:ml-1"></i>
              </button>
              <!-- Dropdown menu -->
              <div
                id="navUser"
                class="
                  dropdown-menu
                  z-10
                  my-1
                  hidden
                  w-full
                  list-none
                  divide-y divide-gray-100
                  rounded
                  bg-gray-800
                  md:bg-white
                  text-base
                  shadow
                  dark:divide-gray-600
                  border border-slate-700
                  md:border-white
                  dark:border-slate-700/50 dark:bg-gray-900
                  md:w-44
                  dropdown-menu
                "
              >
                <ul class="py-1">
                  <li>
                    <a href="/user" class="nav-link dark:hover:bg-slate-800/70"
                      >View</a
                    >
                  </li>
                  <li>
                    <a
                      href="/user/create"
                      class="nav-link dark:hover:bg-slate-800/70"
                      >Create</a
                    >
                  </li>
                </ul>
              </div>
            </li>
            <li class="dropdown" v-if="isAdmin">
              <button
                id="navAdsLink"
                data-dropdown-toggle="navAds"
                class="
                  dropdown-toggle
                  flex
                  w-full
                  items-center
                  border-b border-gray-800
                  py-2
                  px-3
                  font-medium
                  md:border-0 md:p-0
                "
              >
                <i class="ti ti-fold mr-1 pb-1 text-lg"></i> Ads
                <i class="ti ti-chevron-down ml-auto lg:ml-1"></i>
              </button>
              <!-- Dropdown menu -->
              <div
                id="navAds"
                class="
                  dropdown-menu
                  z-10
                  my-1
                  hidden
                  w-full
                  list-none
                  divide-y divide-gray-100
                  rounded
                  bg-gray-800
                  md:bg-white
                  text-base
                  shadow
                  dark:divide-gray-600
                  border border-slate-700
                  md:border-white
                  dark:border-slate-700/50 dark:bg-gray-900
                  md:w-44
                  dropdown-menu
                "
              >
                <ul class="py-1">
                  <li>
                    <a href="/ads" class="nav-link dark:hover:bg-slate-800/70"
                      >View</a
                    >
                  </li>
                  <li>
                    <a
                      href="/ads/create"
                      class="nav-link dark:hover:bg-slate-800/70"
                      >Create</a
                    >
                  </li>
                </ul>
              </div>
            </li>
            <li class="dropdown" v-if="isAdmin">
              <button
                id="navDomainLink"
                data-dropdown-toggle="navDomain"
                class="
                  dropdown-toggle
                  flex
                  w-full
                  items-center
                  border-b border-gray-800
                  py-2
                  px-3
                  font-medium
                  md:border-0 md:p-0
                "
              >
                <i class="mdi mdi-domain mr-1 pb-1 text-lg"></i> Domain
                <i class="ti ti-chevron-down ml-auto lg:ml-1"></i>
              </button>
              <!-- Dropdown menu -->
              <div
                id="navDomain"
                class="
                  dropdown-menu
                  z-10
                  my-1
                  hidden
                  w-full
                  list-none
                  divide-y divide-gray-100
                  rounded
                  bg-gray-800
                  md:bg-white
                  text-base
                  shadow
                  dark:divide-gray-600
                  border border-slate-700
                  md:border-white
                  dark:border-slate-700/50 dark:bg-gray-900
                  md:w-44
                  dropdown-menu
                "
              >
                <ul class="py-1">
                  <li>
                    <a
                      href="/domain"
                      class="nav-link dark:hover:bg-slate-800/70"
                      >View</a
                    >
                  </li>
                  <li>
                    <a
                      href="/domain/create"
                      class="nav-link dark:hover:bg-slate-800/70"
                      >Create</a
                    >
                  </li>
                </ul>
              </div>
            </li>
            <li class="dropdown lg:hidden md:hidden" v-if="isAdmin">
              <button
                type="button"
                class="
                  dropdown-toggle
                  flex
                  w-full
                  items-center
                  py-2
                  rounded-full
                  px-3
                  font-medium
                  md:border-0 md:p-0
                "
                aria-expanded="false"
                id="navProfileLink"
                data-dropdown-toggle="navProfile"
              >
                <img
                  class="h-8 w-8 rounded-full"
                  src="/assets/images/users/avatar-2.jpg"
                  alt="user photo"
                />
                <span class="ml-2 text-left xl:block">
                  <span class="block font-medium text-gray-400">{{
                    getUser()?.email
                  }}</span>
                  <span class="-mt-1 block text-sm font-medium text-gray-500">{{
                    isAdmin === true ? "Admin" : "Member"
                  }}</span>
                </span>
                <i class="ti ti-chevron-down ml-auto lg:ml-1"></i>
              </button>
              <!-- Dropdown menu -->
              <div
                id="navProfile"
                class="
                dropdown-menu
                  z-10
                  my-1
                  hidden
                  w-full
                  list-none
                  divide-y divide-gray-100
                  rounded
                  bg-gray-800
                  md:bg-white
                  text-base
                  shadow
                  dark:divide-gray-600
                  border border-slate-700
                  md:border-white
                  dark:border-slate-700/50 dark:bg-gray-900
                  md:w-44
                  dropdown-menu
                "
              >
                <ul class="py-1">
                  <li>
                    <a
                      href="/settings"
                      class="nav-link dark:hover:bg-slate-800/70"
                      >Settings</a
                    >
                  </li>
                  <li>
                    <a @click.prevent="logout" class="nav-link dark:hover:bg-slate-800/70"
                      >Sign Out</a
                    >
                  </li>
                </ul>
              </div>
            </li>
          </ClientOnly>
        </ul>
      </div>
      <div class="order-1 ml-auto flex items-center md:order-2">
        <div class="mr-2 lg:mr-0 dropdown relative hidden md:block">
          <button
            type="button"
            class="
              dropdown-toggle
              flex
              items-center
              rounded-full
              text-sm
              focus:bg-none focus:ring-0
              dark:focus:ring-0
              md:mr-0
            "
            id="user-profile"
            aria-expanded="false"
            data-dropdown-toggle="navUserdata"
          >
            <img
              class="h-8 w-8 rounded-full"
              src="/assets/images/users/avatar-2.jpg"
              alt="user photo"
            />
            <span class="ml-2 hidden text-left xl:block">
              <span class="block font-medium text-gray-400">{{
                getUser()?.name
              }}</span>
              <span class="-mt-1 block text-sm font-medium text-gray-500">{{
                isAdmin === true ? "Admin" : "Member"
              }}</span>
            </span>
          </button>

          <div
            class="
              dropdown-menu dropdown-menu-right
              z-50
              my-1
              hidden
              list-none
              divide-y divide-gray-100
              rounded
              border-slate-700
              md:border-white
              text-base
              shadow
              dark:divide-gray-600
              bg-white
              dark:bg-slate-800
            "
            id="navUserdata"
          >
            <div class="py-3 px-4">
              <span
                class="block text-sm font-medium text-gray-900 dark:text-white"
                >{{ isAdmin === true ? "Admin" : "Member" }}</span
              >
              <span
                class="
                  block
                  truncate
                  text-sm
                  font-normal
                  text-gray-500
                  dark:text-gray-400
                "
                >{{ getUser()?.email }}</span
              >
            </div>
            <ul class="py-1" aria-labelledby="navUserdata">
              <li>
                <a
                  href="/settings"
                  class="
                    block
                    py-2
                    px-4
                    text-sm text-gray-700
                    hover:bg-gray-100
                    dark:text-gray-200
                    dark:hover:bg-gray-900/20
                    dark:hover:text-white
                  "
                  >Settings</a
                >
              </li>
              <li>
                <a
                  @click.prevent="logout"
                  class="
                    block
                    py-2
                    px-4
                    text-sm text-gray-700
                    hover:bg-gray-100
                    dark:text-gray-200
                    dark:hover:bg-gray-900/20
                    dark:hover:text-white
                  "
                  >Sign out</a
                >
              </li>
            </ul>
          </div>
        </div>

        <button
          data-collapse-toggle="mobile-menu-2"
          type="button"
          id="toggle-menu"
          class="
            ml-1
            inline-flex
            items-center
            rounded-lg
            text-sm text-gray-500
            hover:bg-gray-100
            focus:outline-none focus:ring-0 focus:ring-gray-200
            dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600
            md:hidden
          "
          aria-controls="mobile-menu-2"
          aria-expanded="false"
        >
          <span class="sr-only">Open main menu</span>
          <i class="ti ti-menu-2 h-6 w-6 text-lg leading-6"></i>
          <i class="ti ti-X hidden h-6 w-6 text-lg leading-6"></i>
        </button>
      </div>
    </div>
  </nav>
</template>
<script setup>
const { removeUser, getUser, isAdmin } = useAuth();
function logout() {
  removeUser();
  useNuxtApp().$awn.success("Successufully Logged Out!!!");
  setTimeout(() => {
    window.location.href = "/";
  }, 1100);
}
</script>