<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Reports</h4>
    </div>
    <!--end card-header-->
    <div class="card-body">
      <!-- component -->
      <div class="relative overflow-x-auto sm:rounded">
        <table
          class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
        >
          <slot />
        </table>
      </div>
    </div>
    <!--end card-body-->
  </div>
  <!--end card-->
</template>

<script setup>
</script>