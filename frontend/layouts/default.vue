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
    script: [{ src: "/assets/js/app.js" }],
    titleTemplate: (titleChunk) => {
      return titleChunk ? `${titleChunk} - JinnAdx` : "JinnAdx";
    },
    meta: [
      {
        name: "description",
        content: "Best Adx Network in Myanmar.",
      },
      {
        property: "og:type",
        content: "website",
      },
      {
        property: "og:title",
        content: "JinnAdx",
      },
      {
        property: "og:description",
        contnet: "Best Adx Network in Myanmar.",
      },
      {
        property: "og:image",
        content: "~/assets/logo/agadult.png",
      },
      {
        property: "og:url",
        content: `${window.location.origin + useRoute().fullPath}`,
      },
      {
        property: "twitter:card",
        content: "summary_large_image",
      },
      {
        property: "twitter:url",
        content: `${window.location.origin + useRoute().fullPath}`,
      },
      {
        property: "twitter:title",
        content: "JinnAdx",
      },
      {
        property: "twitter:description",
        content: "Best Adx Network in Myanmar.",
      },
      {
        property: "twitter:image",
        content: "~/assets/logo/agadult.png",
      },
    ],
  });
});
</script>