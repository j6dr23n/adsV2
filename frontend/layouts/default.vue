<template>
  <div>
    <NuxtLoadingIndicator />
    <Header />
    <slot />
  </div>
</template>
<script setup>
onMounted(() => {
  useHead({
    script: [{ src: "/assets/js/app.js" }]
  });
});
</script>