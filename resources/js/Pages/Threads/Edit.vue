<template>
  <app-layout>
    <div class="flex flex-col max-w-6xl mx-auto justify-center px-2 mt-16">
      <h1
        class="text-3xl md:text-4xl text-center md:text-left text-customLightGray mt-16"
      >
        Update Your {{ form.brand }} {{ form.category }}
      </h1>
      <form
        action="#"
        method="POST"
        class="mt-4"
        @submit.prevent="updateThread"
      >
        <div class="flex flex-row flex-wrap gap-4">
          <div className="flex flex-row flex-wrap lg:flex-nowrap gap-2 w-full">
            <div class="form-group flex flex-col w-full md:w-5/12">
              <label
                class="font-victor text-customLightGray text-xl font-medium w-full"
                for="brand"
                >Brand</label
              >
              <input
                class="mt-1 block w-full border-none bg-customBlack text-customLightGray font-victor outline-none focus:outline-customOrange focus:ring-customOrange"
                type="text"
                id="brand"
                v-model="form.brand"
                name="brand"
              />
            </div>
            <div class="form-group flex flex-col w-full md:w-5/12">
              <label
                class="font-victor text-customLightGray text-xl font-medium w-full"
                for="style"
                >Style</label
              >
              <input
                class="mt-1 block w-full border-none bg-customBlack text-customLightGray font-victor outline-none focus:outline-customOrange focus:ring-customOrange"
                type="text"
                id="style"
                v-model="form.style"
                name="style"
              />
            </div>
            <div class="form-group flex flex-col w-full md:w-2/12">
              <label
                class="font-victor text-customLightGray text-xl font-medium w-full"
                for="size"
                >Size</label
              >
              <input
                class="mt-1 block w-full border-none bg-customBlack text-customLightGray font-victor outline-none focus:outline-customOrange focus:ring-customOrange"
                type="text"
                id="size"
                v-model="form.size"
                name="size"
              />
            </div>
          </div>

          <div class="form-group flex flex-col w-full md:w-4/12">
            <label
              class="font-victor text-customLightGray text-xl font-medium w-full"
              for="purchased"
              >Purchased (year)</label
            >
            <input
              class="mt-1 block w-full border-none bg-customBlack text-customLightGray font-victor outline-none focus:outline-customOrange focus:ring-customOrange"
              type="text"
              id="purchased"
              v-model="form.purchased"
              name="purchased"
            />
          </div>
          <div class="form-group flex flex-col w-full md:w-4/12">
            <label
              class="font-victor text-customLightGray text-xl font-medium w-full"
              for="category"
              >Category</label
            >
            <select
              class="mt-1 block w-full border-none bg-customBlack text-customLightGray font-victor outline-none focus:outline-customOrange focus:ring-customOrange"
              type="text"
              id="category"
              v-model="form.category"
              name="category"
            >
              <option v-for="category in categories" :key="category.id">
                {{ category.name }}
              </option>
              <option value="add_new">+ Add New</option>
            </select>
          </div>
          <div
            class="form-group flex flex-col w-full"
            v-if="form.category == 'Jeans' || form.category == 'jeans'"
          >
            <label
              class="font-victor text-customLightGray text-xl font-medium w-auto"
              for="denim_weight"
              >Denim Weight (number in Oz)</label
            >
            <input
              class="mt-1 block w-full border-none bg-customBlack text-customLightGray font-victor outline-none focus:outline-customOrange focus:ring-customOrange"
              type="text"
              id="denim_weight"
              v-model="form.denim_weight"
              name="denim_weight"
            />
          </div>
          <div
            class="form-group flex flex-col w-full"
            v-if="form.category == 'add_new'"
          >
            <label
              class="font-victor text-customLightGray text-xl font-medium w-full"
              for="worn"
              >New Category Name</label
            >
            <input
              class="mt-1 block w-full border-none bg-customBlack text-customLightGray font-victor outline-none focus:outline-customOrange focus:ring-customOrange"
              type="text"
              id="new_category"
              v-model="form.new_category"
              name="new_category"
            />
          </div>
          <div class="form-group flex flex-col w-full">
            <label
              class="font-victor text-customLightGray text-xl font-medium w-full"
              for="web_link"
              >Web Link</label
            >
            <input
              class="mt-1 block w-full border-none bg-customBlack text-customLightGray font-victor outline-none focus:outline-customOrange focus:ring-customOrange"
              type="text"
              id="web_link"
              v-model="form.web_link"
              name="web_link"
            />
          </div>
        </div>
        <div class="flex flex-row flex-wrap my-4">
          <div
            class="w-full lg:w-10/12 bg-customDark p-4 pl-0 rounded-md text-left"
          >
            <p class="text-customOrange font-thread text-lg">
              Don’t worry if you don’t know these next two, we can start
              counting from here on out
            </p>
          </div>
        </div>
        <div class="flex flex-row flex-wrap mt-2 gap-4 w-full">
          <div class="form-group flex flex-col w-full md:w-5/12">
            <label
              class="font-victor text-customLightGray text-xl font-medium w-full"
              for="worn"
              >Days Worn So Far</label
            >
            <input
              class="mt-1 block w-full border-none bg-customBlack text-customLightGray font-victor outline-none focus:outline-customOrange focus:ring-customOrange"
              type="text"
              id="worn"
              v-model="form.worn"
              name="worn"
            />
          </div>
          <div class="form-group flex flex-col w-full md:w-5/12">
            <label
              class="font-victor text-customLightGray text-xl font-medium w-full"
              for="washed"
              >Times Washed So Far</label
            >
            <input
              class="mt-1 block w-full border-none bg-customBlack text-customLightGray font-victor outline-none focus:outline-customOrange focus:ring-customOrange"
              type="text"
              id="washed"
              v-model="form.washed"
              name="washed"
            />
          </div>
          <!-- <file-input
                       v-model="form.photo"
                       class="pr-6 pb-8 w-full lg:w-1/2"
                       type="file"
                       accept="image/*"
                       label="Photo"
                   /> -->
        </div>
        <div class="flex flex-row mt-8 justify-start gap-4 items-end mb-16">
          <button
            class="text-sm text-gray-200 border-2 border-customOrange hover:text-white tranform transition-colors hover:bg-customOrange text-customOrange font-victor text-xl rounded-md py-2 px-6"
            @click="updateThread"
          >
            Update Thread
          </button>
          <inertia-link @click="deleteThread" class="block text-red-400"
            >Delete</inertia-link
          >
        </div>
      </form>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
import Welcome from "./../../Jetstream/Welcome";
export default {
  components: {
    AppLayout,
  },
  props: ["threads", "categories", "errors"],
  data() {
    return {
      form: {
        brand: this.threads.brand,
        size: this.threads.size,
        purchased: this.threads.purchased,
        style: this.threads.style,
        worn: this.threads.worn,
        washed: this.threads.washed,
        category: this.threads.category,
        new_category: "",
        denim_weight: this.threads.denim_weight,
        web_link: this.threads_web_link,
      },
    };
  },
  methods: {
    updateThread() {
      this.$inertia.patch(`/threads/${this.threads.id}`, this.form).then(() => {
        this.loading = false;
      });
    },
    deleteThread() {
      if (confirm("Are you sure you want to delete this thread?")) {
        this.$inertia
          .delete(`/threads/${this.threads.id}/delete`)
          .then(() => {});
      }
    },

    capitalize() {
      str.charAt(0).toUpperCase() + str.slice(1);
    },
  },
};
</script>
<style scoped></style>
