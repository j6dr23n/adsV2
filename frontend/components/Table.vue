<template>
  <div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-x-auto">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">{{ props.title }}</h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
              <!-- component -->
              <table
                class="
                  w-full
                  text-sm text-left text-gray-500
                  dark:text-gray-400
                "
              >
                <slot />
              </table>
            </div>
            <!--end card-body-->
          </div>
          <!--end card-->
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  title: String,
});
</script>