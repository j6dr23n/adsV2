<template>
  <div class="card h-full">
    <div class="card-header">
      <h4 class="card-title">Reports</h4>
    </div>
    <!--end card-header-->
    <div class="card-body">
      <div class="relative overflow-x-auto sm:rounded">
        <table
          class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
          id="datatable_1"
        >
          <thead
            class="
              text-xs text-gray-700
              uppercase
              bg-gray-50
              dark:bg-slate-700 dark:text-gray-400
            "
          >
            <tr>
              <th scope="col" class="p-4">
                <label class="custom-label">
                  <div
                    class="
                      bg-white
                      border border-slate-200
                      rounded
                      w-4
                      h-4
                      inline-block
                      leading-4
                      text-center
                      -mb-[3px]
                    "
                  >
                    <input type="checkbox" class="hidden" />
                    <i class="fas fa-check hidden text-xs text-slate-700"></i>
                  </div>
                </label>
              </th>
              <th scope="col" class="px-6 py-3">Product name</th>
              <th scope="col" class="px-6 py-3">Color</th>
              <th scope="col" class="px-6 py-3">Category</th>
              <th scope="col" class="px-6 py-3">Price</th>
              <th scope="col" class="px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="item in items"
              :key="item.id"
              class="
                bg-white
                border-b
                dark:bg-gray-800 dark:border-gray-700
                hover:bg-gray-50
                dark:hover:bg-slate-700/50
              "
            >
              <td class="w-4 p-4">
                <label class="custom-label">
                  <div
                    class="
                      bg-white
                      border border-slate-200
                      rounded
                      w-4
                      h-4
                      inline-block
                      leading-4
                      text-center
                      -mb-[3px]
                    "
                  >
                    <input type="checkbox" class="hidden" checked />
                    <i class="fas fa-check hidden text-xs text-slate-700"></i>
                  </div>
                </label>
              </td>
              <th
                scope="row"
                class="
                  px-6
                  py-4
                  font-medium
                  text-gray-900
                  dark:text-white
                  whitespace-nowrap
                "
              >
                {{ item.id }}
              </th>
              <td class="px-6 py-4">Sliver</td>
              <td class="px-6 py-4">Laptop</td>
              <td class="px-6 py-4">$2999</td>
              <td class="px-6 py-4 text-right">
                <a
                  href="#"
                  class="
                    font-medium
                    text-blue-600
                    dark:text-blue-500
                    hover:underline
                  "
                  >Edit</a
                >
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!--end card-body-->
  </div>
  <!--end card-->
</template>
<script setup>
const props = defineProps({
  items: Object,
});
onMounted(() => {});
</script>