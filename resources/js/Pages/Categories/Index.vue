<template>
  <app-layout>
    <div
      class="flex flex-col sm:flex-row flex-wrap max-w-3xl lg:mx-auto justify-center sm:justify-between mx-8 gap-0 md:gap-4 pt-24"
    >
      <div class="flex flex-row flex-wrap w-full gap-4">
        <h1 class="w-full text-customLightGray text-4xl my-4">Categories</h1>

        <div
          class="text-2xl text-customLightGray px-4 py-2 flex flex-row gap-2 items-center border-2 border-customLightGray rounded-md relative"
          v-for="category in categories"
          :key="category.id"
        >
          {{ category.name }}

          <svg
            @click="deleteCategory($event)"
            v-bind:id="category.id"
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 text-customLightGray transition-colors hover:text-customOrange cursor-pointer"
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
        <button
          @click="showNewCategoryInput = !showNewCategoryInput"
          class="border border-customOrange text-customOrange text-2xl rounded-md px-4 py-2"
        >
          <span v-if="showNewCategoryInput">Done</span>
          <span v-else>Add New +</span>
        </button>
      </div>
      <form
        v-show="showNewCategoryInput"
        method="POST"
        class="w-full mt-8"
        @submit.prevent="addNewCategory"
      >
        <div class="form-group flex flex-col w-full md:w-full relative">
          <div v-if="errors.name">{{ errors.name }}</div>
          <label
            class="font-victor text-customLightGray text-xl font-medium w-full"
            for="brand"
            >New Category Name</label
          >
          <input
            class="mt-1 block w-full border-none bg-customBlack text-customLightGray font-victor outline-none focus:outline-customOrange focus:ring-customOrange relative"
            type="text"
            id="name"
            v-model="form.name"
            name="name"
          />
          <button type="submit" class="w-8 h-8 text-customGreen mt-2">
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
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg>
          </button>
        </div>
      </form>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";

export default {
  components: {
    AppLayout,
    Welcome,
  },
  props: ["categories", "errors"],
  data() {
    return {
      showNewCategoryInput: false,
      form: {
        name: "",
      },
      clickedCategory: {
        id: null,
      },
    };
  },
  methods: {
    addNewCategory() {
      this.$inertia.post("/categories/add", this.form);
      this.form.name = "";
    },
    deleteCategory(event) {
      this.clickedCategory.id = event.target.id;
      this.$inertia.post("/categories/delete", this.clickedCategory);
    },
  },
};
</script>
