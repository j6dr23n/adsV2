<template>
  <div>
    <div
      class="
        flex
        p-4
        mb-4
        bg-blue-100
        border-t-4 border-gray-500
        dark:bg-gray-300
      "
      id="alert-box"
      role="alert"
    >
      <i class="fas fa-triangle-exclamation flex-shrink-0 text-blue-700"></i>
      <div class="ml-3 text-sm font-medium text-blue-700">
        {{ info?.text }}
      </div>

      <button
        type="button"
        class="
          justify-center
          items-center
          ml-auto
          -mx-1.5
          -my-1.5
          bg-gray-100
          dark:bg-gray-100
          text-blue-500
          rounded-lg
          focus:ring-2 focus:ring-gray-200
          p-1.5
          hover:bg-gray-500
          dark:hover:bg-gray-300
          inline-flex
          h-8
          w-8
          alert-hidden
        "
      >
        <i class="fas fa-xmark"></i>
      </button>
    </div>
  </div>
</template>
<script setup>
import moment from "moment";
const info = ref({});
useHead({
  link: [{ rel: "stylesheet", href: "/assets/libs/magic.css/magic.min.css" }],
});
const resInfo = await useNuxtApp().$apiFetch("/graphql", {
  body: JSON.stringify({
    query: `
      query{
        infos(limit: 1){
          id
          text
        }
      }
    `,
  }),
});
onMounted(() => {
  info.value = resInfo.data.infos[0];
  var alert_del = document.querySelectorAll(".alert-hidden");
  alert_del.forEach((x) =>
    x.addEventListener("click", function () {
      x.parentElement.classList.add("magictime", "swashOut");
      setTimeout(() => {
        x.parentElement.classList.add("hidden");
      }, 1000);
    })
  );
});
</script>