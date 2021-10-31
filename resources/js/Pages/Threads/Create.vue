<template>
    <app-layout>
        <div class="flex flex-col max-w-5xl mx-auto justify-center">
            <h1 class="text-4xl text-customLightGray mt-16">Add New Threads</h1>
            <form method="POST" class="mt-8" @submit.prevent="createThread">
                <div class="flex flex-row flex-wrap">
                    <div class="form-group flex flex-col w-5/12 mr-2">
                        <label class="font-victor text-customLightGray text-xl font-medium w-full" for="brand">Brand</label>
                        <input
                            class="mt-1 block w-full bg-customBlack border border-customOrange text-customLightGray font-victor outline-none focus:outline-none focus:ring-transparent"
                            type="text"
                            id="brand"
                            v-model="form.brand"
                            name="brand"
                        />
                    </div>
                    <div class="form-group flex flex-col w-5/12">
                        <label class="font-victor text-customLightGray text-xl font-medium w-full" for="style">Style</label>
                        <input
                            class="mt-1 block w-full bg-customBlack border border-customOrange text-customLightGray font-victor outline-none focus:outline-none focus:ring-transparent"
                            type="text"
                            id="style"
                            v-model="form.style"
                            name="style"
                        />
                    </div>
                </div>
                <div class="flex flex-row flex-wrap mt-2">
                    <div class="form-group flex flex-col w-5/12 mr-2">
                        <label class="font-victor text-customLightGray text-xl font-medium w-full" for="size">Size</label>
                        <input
                            class="mt-1 block w-full bg-customBlack border border-customOrange text-customLightGray font-victor outline-none focus:outline-none focus:ring-transparent"
                            type="text"
                            id="size"
                            v-model="form.size"
                            name="size"
                        />
                    </div>
                    <div class="form-group flex flex-col w-5/12">
                        <label class="font-victor text-customLightGray text-xl font-medium w-full" for="purchased">Purchased (year)</label>
                        <input
                            class="mt-1 block w-full bg-customBlack border border-customOrange text-customLightGray font-victor outline-none focus:outline-none focus:ring-transparent"
                            type="text"
                            id="purchased"
                            v-model="form.purchased"
                            name="purchased"
                        />
                    </div>
                </div>
                <div class="flex flex-row flex-wrap my-4">
                    <div class="w-10/12 bg-customDark p-4 pl-0 rounded-md text-left">
                        <p class="text-customOrange font-thread text-lg">Don’t worry if you don’t know these next two, we can start counting from here on out</p>
                    </div>
                </div>
                <div class="flex flex-row flex-wrap mt-2">
                    <div class="form-group flex flex-col w-5/12 mr-2">
                        <label class="font-victor text-customLightGray text-xl font-medium w-full" for="worn">Days Worn So Far</label>
                        <input
                            class="mt-1 block w-full bg-customBlack border border-customOrange text-customLightGray font-victor outline-none focus:outline-none focus:ring-transparent"
                            type="text"
                            id="worn"
                            v-model="form.worn"
                            name="worn"
                        />
                    </div>
                    <div class="form-group flex flex-col w-5/12">
                        <label class="font-victor text-customLightGray text-xl font-medium w-full" for="washed">Times Washed So Far</label>
                        <input
                            class="mt-1 block w-full bg-customBlack border border-customOrange text-customLightGray font-victor outline-none focus:outline-none focus:ring-transparent"
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
                <div class="flex flex-row mt-8 justify-start">
                    <button
                        class="
                            text-sm text-gray-200
                            border-2 border-customOrange
                            hover:text-white
                            tranform
                            transition-colors
                            hover:bg-customOrange
                            text-customOrange
                            font-victor
                            text-xl
                            rounded-md
                            py-2
                            px-6
                        "
                        type="submit"
                    >
                        Add new thread
                    </button>
                </div>
            </form>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
import Welcome from "./../../Jetstream/Welcome";
import FileInput from "../Components/FileInput";
export default {
    components: {
        AppLayout,
        FileInput,
    },
    props: ["threads", "errors"],
    data() {
        return {
            form: {
                brand: "",
                size: "",
                purchased: "",
                style: "",
                worn: "",
                washed: "",
                photo: "",
            },
        };
    },
    methods: {
        createThread() {
            this.$inertia.post("/threads", this.form);
        },
    },
};
</script>
<style scoped></style>
