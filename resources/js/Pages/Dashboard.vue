<template>
  <app-layout>
    <div
      class="flex flex-col max-w-3xl lg:mx-auto justify-start sm:justify-start mx-2 gap-4 mt-16"
    >
      <div class="w-full w-full self-start mt-16">
        <h1 class="text-customLightGray text-4xl mb-4">Thread Count</h1>
        <div class="flex flex-wrap flex-col flex-grow gap-4">
          <div
            class="flex flex-col md:flex-row text-white justify-start bg-transparent rounded-md py-2 pl-2 w-auto relative gap-6"
          >
            <div
              class="flex flex-row-reverse items-center justify-between md:justify-center md:flex-col sm:w-auto gap-2 p-4 rounded-md bg-customBlack"
            >
              <div
                class="bg-customOrange h-16 w-16 rounded-full flex items-center justify-center leading-none self-center"
              >
                <p
                  class="font-bold font-victor text-customDark text-4xl rounded-full"
                >
                  {{ thread_count_total }}
                </p>
              </div>
              <p class="text-customLightGray text-2xl text-center">Total</p>
            </div>
            <div
              class="flex flex-wrap flex-grow flex-col md:flex-row gap-2 sm:gap-x-8 gap-y-2 bg-customBlack p-4 rounded-md"
            >
              <div
                v-for="category in thread_categories"
                class="w-full lg:w-auto text-customLightGray text-2xl flex flex-row justify-between gap-2 items-center"
                :key="category.id"
              >
                <p>{{ category.name }}:</p>
                <span class="text-customOrange text-2xl font-semibold">{{
                  category.threads.length
                }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full bg-customDark sm:row-span-4 p-2 w-full">
        <div class="flex flex-row gap-2 items-center mb-4">
          <h1 class="text-customLightGray text-4xl">Most Worn</h1>
          <div
            @click="showFilterDropdown"
            class="text-customLightGray text-4xl flex flex-row items-center gap-2 relative"
            ref="button"
          >
            <p>Overall</p>
            <div>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 9l-7 7-7-7"
                />
              </svg>
            </div>
            <transition
              enter-active-class="transition ease-out duration-200"
              enter-from-class="transform opacity-0 scale-95"
              enter-to-class="transform opacity-100 scale-100"
              leave-active-class="transition ease-in duration-75"
              leave-from-class="transform opacity-100 scale-100"
              leave-to-class="transform opacity-0 scale-95"
            >
              <ul
                v-show="filterDropdownVisible"
                class="absolute text-customLightGray bg-customBlack p-3 top-12 rounded-md left-0 right-0 text-2xl z-10 w-full flex flex-col gap-2"
              >
                <li class="hover:text-gray-400 cursor-pointer">This Week</li>
                <li class="hover:text-gray-400 cursor-pointer">This Month</li>
              </ul>
            </transition>
          </div>
        </div>
        <div className="flex flex-col gap-4">
          <div
            className="flex flex-row text-white justify-between items-center bg-customBlack rounded-md py-2 pl-4 w-auto relative"
            v-for="thread in threads"
            :key="thread.id"
          >
            <div>
              <p class="text-2xl text-customLightGray">
                {{ thread.brand }}
              </p>
              <p class="text-2xl text-customLightGray">
                {{ thread.style }}
              </p>
            </div>
            <div class="flex flex-row items-center justify-center mr-6 gap-2">
              <div
                class="bg-customOrange h-8 w-8 rounded-full flex items-center justify-center leading-none"
              >
                <p class="font-bold text-customDark text-xl rounded-full">
                  {{ thread.worn }}
                </p>
              </div>
              <p class="text-customOrange font-semibold text-sm">Days</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";
import moment from "moment";

export default {
  components: {
    AppLayout,
    Welcome,
  },
  props: ["threads", "thread_count_total", "thread_categories", "recent_fits"],
  data() {
    return {
      filterDropdownVisible: false,
    };
  },

  methods: {
    getHumanDate: function (date) {
      return moment(date).format("MMM Do YY");
    },
    getHumanTime: function (date) {
      return moment(date).format("hh:mm a");
    },
    showFilterDropdown: function () {
      this.filterDropdownVisible = !this.filterDropdownVisible;
    },
    hideFilterDropdown: function () {
      this.filterDropdownVisible = false;
    },
  },
};
</script>
