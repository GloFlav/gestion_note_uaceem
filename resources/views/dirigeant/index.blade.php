@extends('layouts.dashboard')

@section('head')
@vite('node_modules/apexcharts/dist/apexcharts.css')
@endsection

@section('script')
@vite(['node_modules/lodash/lodash.min.js', 'node_modules/apexcharts/dist/apexcharts.min.js'])


@endsection

@section('content')
<style>
    .apexcharts-tooltip.apexcharts-theme-light {
      background-color: transparent !important;
      border: none !important;
      box-shadow: none !important;
    }
  </style>
    <!-- Main Section -->
    <div class=" px-1 py-1 sm:px-6 lg:px-1 lg:py-1 mx-auto">
        <!-- Delete alert -->
        @session('success')
            <div id="dismiss-alert"
                class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
                role="alert" tabindex="-1" aria-labelledby="hs-dismiss-button-label">
                <div class="flex">
                    <div class="shrink-0">
                        <svg class="shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </div>
                    <div class="ms-2">
                        <h3 id="hs-dismiss-button-label" class="text-sm font-medium">
                            {{ session('success') }}
                        </h3>
                    </div>
                    <div class="ps-3 ms-auto">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button"
                                class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:bg-teal-100 dark:bg-transparent dark:text-teal-600 dark:hover:bg-teal-800/50 dark:focus:bg-teal-800/50"
                                data-hs-remove-element="#dismiss-alert">
                                <span class="sr-only">Dismiss</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endsession

        @session('error.delete')
            <div id="dismiss-alert"
                class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-red-50 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
                role="alert" tabindex="-1" aria-labelledby="hs-dismiss-button-label">
                <div class="flex">
                    <div class="shrink-0">
                        <svg class="shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </div>
                    <div class="ms-2">
                        <h3 id="hs-dismiss-button-label" class="text-sm font-medium">
                            {{ session('error.delete') }}
                        </h3>
                    </div>
                    <div class="ps-3 ms-auto">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button"
                                class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:bg-red-100 dark:bg-transparent dark:text-red-600 dark:hover:bg-red-800/50 dark:focus:bg-red-800/50"
                                data-hs-remove-element="#dismiss-alert">
                                <span class="sr-only">Dismiss</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endsession

        <!-- End Delete alert-->
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 w-full inline-block align-middle">
                    <div class= "border-gray-200 dark:bg-neutral-800 dark:border-neutral-700">
                        <!-- Header -->
                        <div class="py-4 grid gap-3 md:flex flex-col  border-b border-gray-200 dark:border-neutral-700">
                            <div>
                                <h2 class="text-2xl font-semibold text-gray-800 dark:text-neutral-200 mb-4">
                                   Suivi Satistique du Concours
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    Gérez les Candidats en ajoutant de nouveaux membres, <br> en modifiant les
                                    informations
                                    existantes et bien plus encore.
                                </p>
                            </div>
                            </div>
                        </div>
                        <!-- End Header -->
<!-- Card Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
      <!-- Card -->
      <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
        <div class="p-4 md:p-5 flex gap-x-4">
          <div class="shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-neutral-800">
            <svg class="shrink-0 size-5 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>

          <div class="grow">
            <div class="flex items-center gap-x-2">
              <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
                Total Candidats
              </p>
              <div class="hs-tooltip">
                <div class="hs-tooltip-toggle">
                  <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                    The number of daily users
                  </span>
                </div>
              </div>
            </div>
            <div class="mt-1 flex items-center gap-x-2">
              <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
                {{$totalcand}}
              </h3>
              <span class="inline-flex items-center gap-x-1 py-0.5 px-2 rounded-full bg-green-100 text-green-900 dark:bg-green-800 dark:text-green-100">
                <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                <span class="inline-block text-xs font-medium">
                {{number_format(($totalcand*100)/450,2)}} %
                </span>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- End Card -->

      <!-- Card -->
      <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
        <div class="p-4 md:p-5 flex gap-x-4">
          <div class="shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-neutral-800">
            <svg class="shrink-0 size-5 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 22h14"/><path d="M5 2h14"/><path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22"/><path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2"/></svg>
          </div>

          <div class="grow">
            <div class="flex items-center gap-x-2">
              <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
                Total en ligne
              </p>
            </div>
            <div class="mt-1 flex items-center gap-x-2">
              <h3 class="text-xl font-medium text-gray-800 dark:text-neutral-200">
                {{$totalcandel}}
              </h3>
              <span class="inline-flex items-center gap-x-1 py-0.5 px-2 rounded-full bg-red-100 text-red-900 dark:bg-red-800 dark:text-red-100">
                <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 17 13.5 8.5 8.5 13.5 2 7"/><polyline points="16 17 22 17 22 11"/></svg>
                <span class="inline-block text-xs font-medium">
                    {{number_format(($totalcandel*100)/450,2)}}%
                </span>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- End Card -->

      <!-- Card -->
      <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
        <div class="p-4 md:p-5 flex gap-x-4">
          <div class="shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-neutral-800">
            <svg class="shrink-0 size-5 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6"/><path d="m12 12 4 10 1.7-4.3L22 16Z"/></svg>
          </div>

          <div class="grow">
            <div class="flex items-center gap-x-2">
              <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
                Total Local
              </p>
            </div>
            <div class="mt-1 flex items-center gap-x-2">
              <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
                {{$totalcandlo}}
              </h3>
              <span class="inline-flex items-center gap-x-1 py-0.5 px-2 rounded-full bg-red-100 text-red-900 dark:bg-red-800 dark:text-red-100">
                <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 17 13.5 8.5 8.5 13.5 2 7"/><polyline points="16 17 22 17 22 11"/></svg>
                <span class="inline-block text-xs font-medium">
                  {{number_format(($totalcandlo*100)/450,2)}} %
                </span>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- End Card -->

      <!-- Card -->
      <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
        <div class="p-4 md:p-5 flex gap-x-4">
          <div class="shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-neutral-800">
            <svg class="shrink-0 size-5 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5z"/><path d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/><path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2"/><path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"/></svg>
          </div>

          <div class="grow">
            <div class="flex items-center gap-x-2">
              <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
                Total Candidat ACEEM
              </p>
              <div class="hs-tooltip">
                <div class="hs-tooltip-toggle">
                  <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                    The average pageviews
                  </span>
                </div>
              </div>
            </div>
            <div class="mt-1 flex items-center gap-x-2">
              <h3 class="text-xl font-medium text-gray-800 dark:text-neutral-200">
                {{$totalCA}}
              </h3>
            </div>
          </div>
        </div>
      </div>
      <!-- End Card -->
    </div>
    <!-- End Grid -->
  </div>
  <!-- End Card Section -->

  <!-- Card -->
<div class="p-4 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
    <!-- Header -->
    <div class="flex justify-between items-center">
      <div>
        <h2 class="text-sm text-gray-500 dark:text-neutral-500">
          Income
        </h2>
        <p class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
          $126,238.49
        </p>
      </div>

      <div>
        <span class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-teal-100 text-teal-800 dark:bg-teal-500/10 dark:text-teal-500">
          <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="m19 12-7 7-7-7"/></svg>
          25%
        </span>
      </div>
    </div>
    <!-- End Header -->

    <div id="hs-multiple-bar-charts"></div>
  </div>
  <!-- End Card -->

@endsection

@section('script')
  <script>
    window.addEventListener("load", () => {
      (function () {
        buildChart(
          "#hs-multiple-bar-charts",
          (mode) => ({
            chart: {
              type: "bar",
              height: 300,
              toolbar: {
                show: false,
              },
              zoom: {
                enabled: false,
              },
            },
            series: [
              {
                name: "Chosen Period",
                data: [
                  23000, 44000, 55000, 57000, 56000, 61000, 58000, 63000, 60000,
                  66000, 34000, 78000,
                ],
              },
              {
                name: "Last Period",
                data: [
                  17000, 76000, 85000, 101000, 98000, 87000, 105000, 91000, 114000,
                  94000, 67000, 66000,
                ],
              },
            ],
            plotOptions: {
              bar: {
                horizontal: false,
                columnWidth: "16px",
                borderRadius: 0,
              },
            },
            legend: {
              show: false,
            },
            dataLabels: {
              enabled: false,
            },
            stroke: {
              show: true,
              width: 8,
              colors: ["transparent"],
            },
            xaxis: {
              categories: [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December",
              ],
              axisBorder: {
                show: false,
              },
              axisTicks: {
                show: false,
              },
              crosshairs: {
                show: false,
              },
              labels: {
                style: {
                  colors: "#9ca3af",
                  fontSize: "13px",
                  fontFamily: "Inter, ui-sans-serif",
                  fontWeight: 400,
                },
                offsetX: -2,
                formatter: (title) => title.slice(0, 3),
              },
            },
            yaxis: {
              labels: {
                align: "left",
                minWidth: 0,
                maxWidth: 140,
                style: {
                  colors: "#9ca3af",
                  fontSize: "13px",
                  fontFamily: "Inter, ui-sans-serif",
                  fontWeight: 400,
                },
                formatter: (value) => (value >= 1000 ? `${value / 1000}k` : value),
              },
            },
            states: {
              hover: {
                filter: {
                  type: "darken",
                  value: 0.9,
                },
              },
            },
            tooltip: {
              y: {
                formatter: (value) =>
                  `$${value >= 1000 ? `${value / 1000}k` : value}`,
              },
              custom: function (props) {
                const { categories } = props.ctx.opts.xaxis;
                const { dataPointIndex } = props;
                const title = categories[dataPointIndex];
                const newTitle = `${title}`;

                return buildTooltip(props, {
                  title: newTitle,
                  mode,
                  hasTextLabel: true,
                  wrapperExtClasses: "min-w-28",
                  labelDivider: ":",
                  labelExtClasses: "ms-2",
                });
              },
            },
            responsive: [
              {
                breakpoint: 568,
                options: {
                  chart: {
                    height: 300,
                  },
                  plotOptions: {
                    bar: {
                      columnWidth: "14px",
                    },
                  },
                  stroke: {
                    width: 8,
                  },
                  labels: {
                    style: {
                      colors: "#9ca3af",
                      fontSize: "11px",
                      fontFamily: "Inter, ui-sans-serif",
                      fontWeight: 400,
                    },
                    offsetX: -2,
                    formatter: (title) => title.slice(0, 3),
                  },
                  yaxis: {
                    labels: {
                      align: "left",
                      minWidth: 0,
                      maxWidth: 140,
                      style: {
                        colors: "#9ca3af",
                        fontSize: "11px",
                        fontFamily: "Inter, ui-sans-serif",
                        fontWeight: 400,
                      },
                      formatter: (value) =>
                        value >= 1000 ? `${value / 1000}k` : value,
                    },
                  },
                },
              },
            ],
          }),
          {
            colors: ["#2563eb", "#d1d5db"],
            grid: {
              borderColor: "#e5e7eb",
            },
          },
          {
            colors: ["#6b7280", "#2563eb"],
            grid: {
              borderColor: "#404040",
            },
          }
        );
      })();
    });
  </script>
@endsection
