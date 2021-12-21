<template>
  <app-layout>
    <div
      class="flex flex-row flex-wrap max-w-6xl lg:mx-auto mx-4 lg:mx-0 pt-28"
    >
      <div
        class="lg:w-auto flex flex-row items-center gap-4 lg:items-start lg:justify-start overflow-x-auto overflow-y-hidden"
      >
        <div
          className="flex flex-row mb-8 lg:mb-0 lg:flex-col gap-6 lg:gap-4 w-full text-customLightGray"
        >
          <inertia-link
            v-bind:class="{
              'text-customOrange': route().current('threads.index'),
            }"
            class="text-2xl md:text-2xl transform transition-transform cursor-pointer hover:-translate-y-1 hover:border-2"
            href="/threads"
          >
            All
          </inertia-link>
          <inertia-link
            v-for="category in categories"
            :key="category.id"
            class="text-2xl md:text-2xl transform transition-transform transform cursor-pointer hover:-translate-y-1 hover:border-2"
            :href="`/threads/categories/${category.name}`"
            v-bind:class="{
              'text-customOrange': route().current(
                'threads.category',
                category.name
              ),
            }"
          >
            {{ category.name }}
          </inertia-link>
          <inertia-link
            class="text-2xl md:text-2xl text-customLightGray transform transition-transform cursor-pointer hover:-translate-y-1 hover:border-2"
            href="/categories/edit"
          >
            Edit
          </inertia-link>
        </div>
      </div>
      <div
        class="grid grid-cols-12 lg:w-10/12 w-full lg:mx-0 gap-4 justify-center lg:mx-auto overflow-x-auto"
      >
        <div
          className="flex flex-col col-span-12 md:col-span-6 lg:col-span-4 text-white justify-between bg-customBlack rounded-md py-4 pl-4 w-auto relative"
          v-for="thread in threads"
          :key="thread.id"
        >
          <!-- <span class="h-16 w-16 rounded-full bg-gray-800"></span> -->
          <div class="flex flex-col justify-start gap-4">
            <div class="w-full">
              <p class="text-2xl text-customLightGray mt-4">
                {{ thread.brand }}
              </p>
              <p class="text-xl text-customLightGray">{{ thread.style }}</p>
              <p class="text-md text-customLightGray">
                Last Worn:
                <span v-if="thread.worn_today == null" class="font-bold"
                  >Never</span
                >
                <span
                  class="text-customOrange"
                  v-else-if="getHumanDate(thread.worn_today) == today"
                  >Today</span
                >
                <span v-else class="font-bold">{{
                  getHumanDate(thread.worn_today)
                }}</span>
              </p>
            </div>
            <div class="w-full flex flex-col">
              <div class="text-customLightGray">
                <p class="font-victor text-md">
                  Worn for:
                  <span
                    class="font-bold text-customOrange text-xl font-thread"
                    >{{ thread.worn }}</span
                  >
                  Days
                </p>
              </div>
              <div class="text-customLightGray">
                <p class="font-victor text-md">
                  Washed:
                  <span
                    class="font-bold text-customOrange text-xl font-thread"
                    >{{ thread.washed }}</span
                  >
                  Times
                </p>
              </div>
            </div>
          </div>
          <div class="flex flex-row gap-2 mb-4 mt-4">
            <inertia-link
              v-if="thread.in_fit == false && laundryMode == false"
              :href="`/threads/${thread.id}/addToFit`"
              method="PATCH"
              class="p-2"
              preserve-scroll
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 text-gray-700 hover:text-customOrange"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 4v16m8-8H4"
                /></svg
            ></inertia-link>

            <inertia-link
              v-if="thread.in_fit == true && laundryMode == false"
              :href="`/threads/${thread.id}/removeFromFit`"
              method="PATCH"
              preserve-scroll
              class="font-victor border border-customOrange cursor-pointer rounded-full text-sm py-2 px-4 whitespace-nowrap text-white tranform transition-colors bg-customOrange flex flex-row flex-nowrap gap-2 items-center"
              >{{ this.buttonText
              }}<svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 text-white cursor-pointer"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                /></svg
            ></inertia-link>
            <inertia-link
              v-if="laundryMode == true"
              :href="`/threads/${thread.id}/washedToday`"
              method="PATCH"
              preserve-scroll
              class="font-victor border border-customOrange rounded-full text-sm py-2 px-4 text-customOrange hover:text-white tranform transition-colors hover:bg-customOrange"
            >
              Wash</inertia-link
            >
            <inertia-link
              v-if="laundryMode == false"
              class="p-2"
              :href="`/threads/${thread.id}/edit`"
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 text-gray-700 hover:text-customOrange"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                />
              </svg>
            </inertia-link>
            <div
              v-if="laundryMode == false || thread.category.name != null"
              class="w-full flex flex-row rounded-md text-customOrange items-center flex-grow-0"
            >
              <div class="h-6 w-6 flex items-center justify-center">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-4 w-4"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"
                  />
                </svg>
              </div>
              <div
                v-if="thread.category != null"
                class="text-customOrange text-md font-bold"
              >
                {{ thread.category.name }}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div
        class="flex flex-row flex-wrap mt-12 justify-center w-full mx-auto pb-16 gap-4 px-8 lg:px-0"
      >
        <inertia-link
          class="text-sm text-gray-200 border-2 border-customOrange hover:text-white tranform transition-colors hover:bg-customOrange text-customOrange font-victor text-xl rounded-md py-2 px-6 w-auto w-full md:w-auto text-center"
          href="/threads/create"
        >
          Add new thread
        </inertia-link>
        <div
          class="text-sm text-gray-200 border-2 border-customOrange hover:text-white tranform transition-colors hover:bg-customOrange text-customOrange font-victor text-xl rounded-md py-2 px-6 w-full md:w-auto flex flex-row flex-nowrap items-center justify-center"
          @click="laundryMode = !laundryMode"
        >
          <svg
            class="h-8 w-8 mr-2"
            viewBox="0 0 301 340"
            version="1.1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
          >
            <g
              id="Page-1"
              stroke="none"
              stroke-width="1"
              fill="none"
              fill-rule="evenodd"
            >
              <g
                id="Washed_Icon-V2"
                transform="translate(-51.000000, -30.000000)"
                stroke="currentColor"
              >
                <g id="Group" transform="translate(51.000000, 30.000000)">
                  <g id="Body" stroke-width="9">
                    <rect
                      id="Rectangle"
                      x="4.5"
                      y="4.5"
                      width="291"
                      height="331"
                      rx="12"
                    ></rect>
                    <line x1="3" y1="68" x2="300" y2="68" id="Path"></line>
                    <line
                      x1="69"
                      y1="68"
                      x2="69"
                      y2="2.24425717"
                      id="Path-2"
                    ></line>
                  </g>
                  <circle
                    id="Oval"
                    stroke-width="9"
                    cx="150.5"
                    cy="189.5"
                    r="91"
                  ></circle>
                  <circle
                    id="Oval-Copy"
                    stroke-width="7.5"
                    cx="149.5"
                    cy="189.5"
                    r="74.75"
                  ></circle>
                  <circle
                    id="Oval"
                    stroke-width="9"
                    cx="37"
                    cy="36"
                    r="13.5"
                  ></circle>
                  <rect
                    id="Rectangle"
                    fill="currentColor"
                    x="244.5"
                    y="172.5"
                    width="6"
                    height="34"
                  ></rect>
                  <line
                    x1="99.4971656"
                    y1="169.714051"
                    x2="125.724114"
                    y2="144"
                    id="Path-3"
                    stroke-width="4"
                    stroke-linecap="round"
                  ></line>
                  <line
                    x1="99.4971656"
                    y1="188.320672"
                    x2="148.342627"
                    y2="144"
                    id="Path-4"
                    stroke-width="4"
                    stroke-linecap="round"
                  ></line>
                </g>
              </g>
            </g>
          </svg>
          <span v-if="laundryMode == false">Laundry Mode</span>
          <span v-else>Cancel Laundry Mode</span>
        </div>
      </div>
    </div>
    <dropdown></dropdown>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
import Welcome from "./../../Jetstream/Welcome";
import ThreadNav from "../Components/ThreadNav";
import moment from "moment";

export default {
  components: {
    AppLayout,
    ThreadNav,
  },
  props: ["threads", "categories"],
  data() {
    return {
      today: moment().utc().format("MM/DD"),
      showingNavigationDropdown: false,
      laundryMode: false,
      laundryItems: [],
      hover: false,
      buttonText: "In Fit",
      getRoute: route().current(),
    };
  },
  methods: {
    woreToday() {
      this.$inertia.patch(`/threads/${this.threads.id}`).then(() => {
        this.loading = false;
      });
    },
    getHumanDate: function (date) {
      return moment(date).format("MM/DD");
    },
    getRoute: function () {
      return console.log(route().current());
    },
  },
};
</script>
