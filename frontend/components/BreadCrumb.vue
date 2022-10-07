<template>
  <div class="container mx-auto px-2">
    <div class="flex flex-wrap">
      <div class="flex items-center py-4 w-full">
        <div class="w-full">
          <div class="">
            <div class="flex flex-wrap justify-between">
              <div class="items-center">
                <h1
                  class="font-semibold text-xl mb-0 block dark:text-slate-100"
                >
                  {{ props.title }}
                </h1>
                <ol class="list-reset flex text-sm">
                  <li><a href="#" class="text-gray-500">JinnAdx</a></li>
                  <li><span class="text-gray-500 mx-2">/</span></li>
                  <li class="text-gray-500">{{ props.title }}</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end container-->
</template>
<script setup>
const props = defineProps({
  title: String,
});
</script>