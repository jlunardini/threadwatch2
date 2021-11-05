<template>
    <app-layout>
        <div class="flex flex-col max-w-5xl justify-center px-2 lg:mx-auto">
            <h1 class="text-4xl text-customLightGray mt-16 text-center lg:text-left">Add New Threads</h1>
            <form method="POST" class="mt-8 w-full" @submit.prevent="createThread">
                <div class="flex flex-row flex-wrap gap-4">
                    <div className="flex flex-row flex-wrap lg:flex-nowrap gap-2 w-full">
                        <div class="form-group flex flex-col w-full md:w-5/12">
                            <label class="font-victor text-customLightGray text-xl font-medium w-full" for="brand">Brand</label>
                            <input
                                class="mt-1 block w-full border-none bg-customBlack text-customLightGray font-victor outline-none focus:outline-customOrange focus:ring-customOrange"
                                type="text"
                                id="brand"
                                v-model="form.brand"
                                name="brand"
                            />
                        </div>
                        <div class="form-group flex flex-col w-full md:w-5/12">
                            <label class="font-victor text-customLightGray text-xl font-medium w-full" for="style">Style</label>
                            <input
                                class="mt-1 block w-full border-none bg-customBlack text-customLightGray font-victor outline-none focus:outline-customOrange focus:ring-customOrange"
                                type="text"
                                id="style"
                                v-model="form.style"
                                name="style"
                            />
                        </div>
                        <div class="form-group flex flex-col w-full md:w-2/12">
                            <label class="font-victor text-customLightGray text-xl font-medium w-full" for="size">Size</label>
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
                        <label class="font-victor text-customLightGray text-xl font-medium w-full" for="purchased">Purchased (year)</label>
                        <input
                            class="mt-1 block w-full border-none bg-customBlack text-customLightGray font-victor outline-none focus:outline-customOrange focus:ring-customOrange"
                            type="text"
                            id="purchased"
                            v-model="form.purchased"
                            name="purchased"
                        />
                    </div>
                    <div class="form-group flex flex-col w-full md:w-4/12">
                        <label class="font-victor text-customLightGray text-xl font-medium w-full" for="category">Category</label>
                        <select
                            class="mt-1 block w-full border-none bg-customBlack text-customLightGray font-victor outline-none focus:outline-customOrange focus:ring-customOrange"
                            type="text"
                            id="category"
                            v-model="form.category"
                            name="category"
                        >
                            <option value="jeans">Jeans</option>
                            <option value="tops">Top</option>
                            <option value="kicks">Kicks</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-row flex-wrap my-4">
                    <div class="w-full lg:w-10/12 bg-customDark p-4 pl-0 rounded-md text-left">
                        <p class="text-customOrange font-thread text-lg">Don’t worry if you don’t know these next two, we can start counting from here on out</p>
                    </div>
                </div>
                <div class="flex flex-row flex-wrap mt-2 gap-4 w-full">
                    <div class="form-group flex flex-col w-full md:w-5/12">
                        <label class="font-victor text-customLightGray text-xl font-medium w-full" for="worn">Days Worn So Far</label>
                        <input
                            class="mt-1 block w-full border-none bg-customBlack text-customLightGray font-victor outline-none focus:outline-customOrange focus:ring-customOrange"
                            type="text"
                            id="worn"
                            v-model="form.worn"
                            name="worn"
                        />
                    </div>
                    <div class="form-group flex flex-col w-full md:w-5/12">
                        <label class="font-victor text-customLightGray text-xl font-medium w-full" for="washed">Times Washed So Far</label>
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
                <div class="flex flex-row mt-8 justify-start mb-8">
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
                category: "",
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
