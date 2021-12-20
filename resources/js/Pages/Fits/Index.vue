<template>
  <app-layout>
    <div
      class="flex flex-col-reverse max-w-4xl lg:mx-auto justify-center sm:justify-between mx-4 gap-4 mt-16"
    >
      <div
        v-if="currentFit.length > 0"
        class="h-auto w-full bg-gradient-to-r from-heroOrangeStart to-heroOrangeEnd rounded-lg p-8 font-bold mt-16"
      >
        <h1 class="font-victor text-4xl font-bold text-customBlack mb-2">
          This {{ timeOfDayText }} Fit
        </h1>
        <div
          class="inline-flex flex-col flex-wrap justify-start lg:flex-row gap-6 flex-grow-0 mt-6 mb-8 text-customBlack"
        >
          <div
            class="font-victor w-full lg:w-auto flex-grow border-customBlack border-2 rounded-md p-4 pr-16 relative"
            v-for="(fit, index) in currentFit"
            :key="fit.id"
          >
            <div
              class="absolute top-5 right-4 rounded-full"
              @click="deleteFromCurrentFit(index)"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 text-customBlack transition-colors hover:text-customOrange cursor-pointer"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
            </div>
            <p class="text-2xl whitespace-nowrap">
              {{ fit.brand }}
            </p>
            <p class="text-lg whitespace-nowrap">
              {{ fit.style }}
            </p>
          </div>
        </div>
        <div
          class="w-full flex flex-row rounded-md text-customOrange mb-4 items-center"
        >
          <button
            class="h-8 w-8 text-customDark flex items-center justify-center cursor-pointer hover:border hover:border-customDark"
            id="add_new"
            @click="selectTag($event)"
          >
            <svg
              id="add_new"
              @click="selectTag($event)"
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
                d="M12 4v16m8-8H4"
              />
            </svg>
          </button>
          <div class="h-8 w-8 text-customDark flex items-center justify-center">
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
                d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"
              />
            </svg>
          </div>

          <div
            class="text-customDark text-xl font-bold p-1"
            v-bind:class="{
              'bg-customDark rounded-md text-customOrange':
                selectedTag == tag.name,
            }"
            v-for="tag in tags"
            :key="tag.id"
            v-bind:id="tag.name"
            @click="selectTag($event)"
          >
            {{ tag.name }}
          </div>
        </div>
        <div v-if="errors.length > 0">{{ errors.tag.newTag }}</div>
        <div
          v-if="tag.selectedTag == 'add_new'"
          class="form-group flex flex-col mb-4"
        >
          <label
            class="font-victor text-customDark text-sm w-full"
            for="new_tag_name"
            >New Tag Name</label
          >
          <input
            class="appearance-none bg-transparent border-2 border-customDark rounded-md"
            type="text"
            id="new_tag_name"
            name="new_tag_name"
            v-model="this.tag.newTag"
          />
        </div>
        <div class="w-full">
          <button
            @click="addToFit"
            method="POST"
            class="text-sm text-gray-200 inline-block border-2 border-customDark hover:text-customOrange tranform transition-colors hover:bg-customDark text-customDark font-victor text-md font-bold rounded-md py-2 px-6 w-full sm:mx-0 text-center sm:w-auto"
          >
            Save
          </button>
        </div>
      </div>
      <div class="mt-8 lg:mt-16 mx-auto text-gray-400 text-2xl" v-else>
        Nothing here yet,
        <inertia-link
          class="hover:text-customOrange hover:underline"
          href="/threads"
          >add some threads</inertia-link
        >
        and come back
      </div>
    </div>
    <div
      class="flex flex-col-reverse flex-wrap max-w-4xl lg:mx-auto justify-center sm:justify-between mx-4 gap-4 mt-8 lg:mt-16 pb-8"
    >
      <h2 class="text-gray-400 text-2xl">Past Fits</h2>
      <div
        v-for="(one, key) in all_fits"
        :key="one.id"
        class="h-auto w-full bg-customBlack rounded-lg p-8 font-bold"
      >
        <h1 class="font-victor text-4xl font-bold text-customOrange mb-2">
          {{ key }}
        </h1>
        <div
          class="flex flex-row-reverse flex-wrap justify-start sm:flex-row mt-6 text-customOrange gap-8"
        >
          <div
            class="font-victor rounded-md w-full flex-grow flex flex-row flex-wrap"
            v-for="two in one"
            :key="two.id"
          >
            <div className="text-customLightGray block text-sm mb-2 mr-4">
              {{ getHumanTime(two.created_at) }}
            </div>
            <div class="flex flex-row gap-2">
              <p class="text-md" v-for="tag in two.tags" :key="tag.id">
                #{{ tag.name }}
              </p>
            </div>
            <div class="w-full flex flex-row flex-wrap gap-6 mt-2">
              <div class="w-auto" v-for="three in two.fit" :key="three.id">
                <p class="text-2xl whitespace-nowrap">
                  {{ three.brand }}
                </p>
                <p class="text-lg whitespace-nowrap">{{ three.style }}</p>
              </div>
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
  data() {
    return {
      timeOfDay: moment().format("dddd,h,A").split(","),
      timeOfDayText: "",
      currentFit: this.in_fit,
      tag: {
        selectedTag: null,
        addNewTag: false,
        newTag: "",
      },
    };
  },
  props: ["in_fit", "all_fits", "tags", "errors"],
  methods: {
    getHumanDate: function (date) {
      return moment(date).format("MM/DD/YY");
    },
    getHumanTime: function (date) {
      return moment(date).format("hh:mm a");
    },
    deleteFromCurrentFit: function (index) {
      this.currentFit.splice(index, 1);
      this.mappedFits2 = Object.assign({
        ...this.currentFit,
      });
    },
    addToFit() {
      this.$inertia.post("/fits/save", {
        current_fit: this.currentFit,
        tag: this.tag,
      });
    },
    selectTag(event) {
      this.tag.selectedTag = event.target.id;
    },
  },
  mounted() {
    if (this.timeOfDay[2] == "AM") {
      this.timeOfDayText = "Morning's";
    } else if (this.timeOfDay[1] === 12 || this.timeOfDay[1] < 6) {
      this.timeOfDayText = "Afternoon's";
    } else {
      this.timeOfDayText = "Evening's";
    }
    this.mappedFits2 = Object.assign({
      ...this.currentFit,
    });
  },
  watch: {
    in_fit: function () {
      // watch it
      this.currentFit = this.in_fit;
    },
  },
};
</script>
