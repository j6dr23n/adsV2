<template>
  <div>
    <BreadCrumb title="Dashboard" />
    <div
      class="container mx-auto px-2 min-h-[calc(100vh-138px)] relative pb-14"
    >
      <Alert />
      <DomainDateRange @search-data="searchData" @date-range="dateRange" />
      <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4 mt-2">
        <div class="sm:col-span-3 md:col-span-4 lg:col-span-4 xl:col-span-4">
          <div class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-2">
            <div class="md:col-span-2 lg:col-span-2 xl:col-span-1">
              <div
                class="
                  bg-white
                  dark:bg-slate-800
                  shadow
                  rounded-md
                  w-full
                  p-4
                  relative
                  overflow-hidden
                  bg-[url('https://mannatthemes.com/T-Wind/images/widgets/p-1.png')]
                  bg-no-repeat bg-contain
                "
              >
                <div class="flex justify-between xl:gap-x-2 items-cente">
                  <div
                    class="
                      absolute
                      -left-6
                      -top-4
                      text-blue-500
                      p-3
                      text-center
                      inline-flex
                      items-center
                      justify-center
                      w-32
                      h-32
                    "
                  >
                    <i class="fas fa-coins text-3xl"></i>
                  </div>
                  <div class="self-center ml-auto">
                    <h3 class="my-1 font-semibold text-2xl dark:text-slate-200">
                      {{ nFormatter(results.eCPM, 1) }}
                    </h3>
                    <p class="text-gray-400 mb-0 font-medium">eCPM</p>
                  </div>
                </div>
              </div>
              <!--end inner-grid-->
            </div>
            <div class="md:col-span-2 lg:col-span-2 xl:col-span-1">
              <div
                class="
                  bg-white
                  dark:bg-slate-800
                  shadow
                  rounded-md
                  w-full
                  p-4
                  relative
                  overflow-hidden
                  bg-[url('https://mannatthemes.com/T-Wind/images/widgets/p-1.png')]
                  bg-no-repeat bg-contain
                "
              >
                <div class="flex justify-between xl:gap-x-2 items-cente">
                  <div
                    class="
                      absolute
                      -left-6
                      -top-4
                      text-blue-500
                      p-3
                      text-center
                      inline-flex
                      items-center
                      justify-center
                      w-32
                      h-32
                    "
                  >
                    <i class="ti ti-chart-line text-3xl"></i>
                  </div>
                  <div class="self-center ml-auto">
                    <h3 class="my-1 font-semibold text-2xl dark:text-slate-200">
                      <h3
                        class="my-1 font-semibold text-2xl dark:text-slate-200"
                      >
                        {{ nFormatter(results.imperssions, 1) }}
                      </h3>
                    </h3>
                    <p class="text-gray-400 mb-0 font-medium">Imperssions</p>
                  </div>
                </div>
              </div>
              <!--end inner-grid-->
            </div>
            <div class="md:col-span-2 lg:col-span-2 xl:col-span-1">
              <div
                class="
                  bg-white
                  dark:bg-slate-800
                  shadow
                  rounded-md
                  w-full
                  p-4
                  relative
                  overflow-hidden
                  bg-[url('https://mannatthemes.com/T-Wind/images/widgets/p-1.png')]
                  bg-no-repeat bg-contain
                "
              >
                <div class="flex justify-between xl:gap-x-2 items-cente">
                  <div
                    class="
                      absolute
                      -left-6
                      -top-4
                      text-blue-500
                      p-3
                      text-center
                      inline-flex
                      items-center
                      justify-center
                      w-32
                      h-32
                    "
                  >
                    <i class="ti ti-currency-dollar text-3xl"></i>
                  </div>
                  <div class="self-center ml-auto">
                    <h3 class="my-1 font-semibold text-2xl dark:text-slate-200">
                      ${{ nFormatter(results.revenue, 1) }}
                    </h3>
                    <p class="text-gray-400 mb-0 font-medium">Revenue</p>
                  </div>
                </div>
              </div>
              <!--end inner-grid-->
            </div>
            <div class="md:col-span-2 lg:col-span-2 xl:col-span-1">
              <div
                class="
                  bg-white
                  dark:bg-slate-800
                  shadow
                  rounded-md
                  w-full
                  p-4
                  relative
                  overflow-hidden
                  bg-[url('https://mannatthemes.com/T-Wind/images/widgets/p-1.png')]
                  bg-no-repeat bg-contain
                "
              >
                <div class="flex justify-between xl:gap-x-2 items-cente">
                  <div
                    class="
                      absolute
                      -left-6
                      -top-4
                      text-blue-500
                      p-3
                      text-center
                      inline-flex
                      items-center
                      justify-center
                      w-32
                      h-32
                    "
                  >
                    <i class="ti ti-link text-3xl"></i>
                  </div>
                  <div class="self-center ml-auto">
                    <h3 class="my-1 font-semibold text-2xl dark:text-slate-200">
                      {{ nFormatter(results.clicks, 1) }}
                    </h3>
                    <p class="text-gray-400 mb-0 font-medium">Clicks</p>
                  </div>
                </div>
              </div>
              <!--end inner-grid-->
            </div>
          </div>
        </div>
        <div class="sm:col-span-3 md:col-span-4 lg:col-span-4 xl:col-span-4">
          <div
            class="
              bg-white
              dark:bg-slate-800
              shadow
              rounded-md
              h-full
              w-full
              p-4
              relative
              overflow-hidden
            "
          >
            <div class="chart-demo">
              <h3 class="text-center text-black-500 text-md outline card-title">
                Chart last 7 days
              </h3>
              <div id="apex_area1" class="apex-charts"></div>
            </div>
          </div>
          <!--end inner-grid-->
        </div>
      </div>
      <Footer />
    </div>
    <!--end container-->
  </div>
</template>
<script setup>
import moment from "moment";
const results = ref({
  imperssions: 0,
  clicks: 0,
  revenue: 0,
  eCPM: 0,
});
const resChart = ref();
const { getUser, isAdmin } = useAuth();
function nFormatter(num, digits) {
  const lookup = [
    { value: 1, symbol: "" },
    { value: 1e3, symbol: "k" },
    { value: 1e6, symbol: "M" },
    { value: 1e9, symbol: "G" },
    { value: 1e12, symbol: "T" },
    { value: 1e15, symbol: "P" },
    { value: 1e18, symbol: "E" },
  ];
  const rx = /\.0+$|(\.[0-9]*[1-9])0+$/;
  var item = lookup
    .slice()
    .reverse()
    .find(function (item) {
      return num >= item.value;
    });
  return item
    ? (num / item.value).toFixed(digits).replace(rx, "$1") + item.symbol
    : "0";
}
definePageMeta({
  middleware: "auth",
});
useHead({
  title: "Dashboard",
  script: [
    { src: "/assets/libs/chart.js/chart.min.js", body: true },
    { src: "/assets/libs/apexcharts/apexcharts.min.js", body: true },
    { src: "/assets/libs/echarts/echarts.min.js", body: true },
    { src: "/assets/libs/simplebar/simplebar.min.js", body: true },
    {
      src: "/assets/libs/vanillajs-datepicker/js/datepicker-full.min.js",
      body: true,
    },
    {
      src: "/assets/libs/mobius1-selectr/selectr.min.js",
      body: true,
    },
  ],
  link: [
    {
      rel: "stylesheet",
      href: "/assets/libs/vanillajs-datepicker/css/datepicker.min.css",
    },
    {
      rel: "stylesheet",
      href: "/assets/libs/mobius1-selectr/selectr.min.css",
    },
  ],
});

async function searchData(val) {
  results.value = val[0];
}

async function dateRange(val) {
  results.value = val[0];
}
onMounted(async () => {
  try {
    if (isAdmin.value) {
      const res = await useNuxtApp().$apiFetch("/graphql", {
        body: JSON.stringify({
          query: `
          query{
            allAdsResolver{
              imperssions
              clicks
              revenue
              eCPM
            }
          }
          `,
        }),
      });
      const chartRes = await useNuxtApp().$apiFetch("/graphql", {
        body: JSON.stringify({
          query: `
          query{
            ads(limit:7){
              imperssions
              clicks
              eCPM
              revenue
              created_at
            }
          }
          `,
        }),
      });
      results.value = res.data.allAdsResolver[0];
      resChart.value = chartRes.data.ads;
    }
    if (!isAdmin.value) {
      const res = await useNuxtApp().$apiFetch("/graphql", {
        body: JSON.stringify({
          query: `
          query{
            ads(user_id:${getUser()?.id},limit:7){
              imperssions
              clicks
              eCPM
              revenue
              created_at
            }
          }
          `,
        }),
      });
      results.value = res.data.ads[0];
      resChart.value = res.data.ads;
    }
  } catch (err) {
    useNuxtApp().$awn.alert("Data token expired,try to login again!!!");
  }

  var date = new Array();
  var imperssions = new Array();
  var clicks = new Array();
  var revenue = new Array();
  var eCPM = new Array();
  resChart.value.forEach(function (data) {
    imperssions.push(data.imperssions);
    clicks.push(data.clicks);
    revenue.push(data.revenue);
    eCPM.push(data.eCPM);
    date.push(moment(data.created_at).format("MMM Do YY"));
  });
  var options = {
    chart: {
      height: 360,
      type: "area",
      stacked: true,
      toolbar: {
        show: false,
        autoSelected: "zoom",
      },
    },
    colors: ["#2a77f4", "#a5c2f1", "#AE4028", "#411A11"],
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: "smooth",
      width: [3, 3],
      dashArray: [0, 4],
      lineCap: "round",
    },
    grid: {
      borderColor: "#45404a2e",
      padding: {
        left: 0,
        right: 0,
      },
      strokeDashArray: 4,
    },
    markers: {
      size: 0,
      hover: {
        size: 0,
      },
    },
    series: [
      {
        name: "Imperssions",
        data: imperssions,
      },
      {
        name: "Revenue",
        data: revenue,
      },
      {
        name: "Clicks",
        data: clicks,
      },
      {
        name: "eCPM",
        data: eCPM,
      },
    ],

    xaxis: {
      type: "month",
      categories: date,
      axisBorder: {
        show: true,
        color: "#45404a2e",
      },
      axisTicks: {
        show: true,
        color: "#45404a2e",
      },
    },
    fill: {
      type: "gradient",
      gradient: {
        shadeIntensity: 1,
        opacityFrom: 0.4,
        opacityTo: 0.3,
        stops: [0, 90, 100],
      },
    },

    tooltip: {
      x: {
        format: "dd/MM/yy HH:mm",
      },
    },
    legend: {
      position: "top",
      horizontalAlign: "right",
    },
  };

  var chart = new ApexCharts(document.querySelector("#apex_area1"), options);

  chart.render();
});
</script>