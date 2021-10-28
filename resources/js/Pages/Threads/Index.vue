<template>
    <app-layout>
        <div v-if="successMessage" class="bg-red-100">
            {{ successMessage }}
        </div>
        <div class="flex flex-col max-w-5xl lg:mx-auto justify-center mx-8">
            <h1 class="font-victor text-4xl text-customLightGray mt-16 underline">Your Tracked Threads</h1>
        </div>
        <div class="grid grid-cols-12 mx-8 max-w-5xl gap-4 mt-4 justify-center lg:mx-auto overflow-x-auto">
            <div
                className="flex flex-col col-span-12 md:col-span-6 lg:col-span-4 text-white justify-between bg-customBlack rounded-md border-customOrange border py-4 pl-4 w-auto relative"
                v-for="thread in threads"
                :key="thread.id"
            >
                <div class="flex flex-row gap-2 mb-4">
                    <inertia-link
                        :href="`/threads/${thread.id}/woreToday`"
                        method="PATCH"
                        class="font-victor border border-customOrange rounded-full text-sm py-2 px-4 text-customOrange hover:text-white tranform transition-colors hover:bg-customOrange"
                        >Wore Today</inertia-link
                    >
                    <inertia-link
                        :href="`/threads/${thread.id}/washedToday`"
                        method="PATCH"
                        class="font-victor border border-customOrange rounded-full text-sm py-2 px-4 text-customOrange hover:text-white tranform transition-colors hover:bg-customOrange"
                        >Washed Today</inertia-link
                    >
                    <inertia-link class="p-2" :href="`/threads/${thread.id}/edit`"
                        ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700 hover:text-customOrange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                            />
                        </svg>
                    </inertia-link>
                </div>
                <span class="h-16 w-16 rounded-full bg-gray-800"></span>
                <p class="text-2xl text-customLightGray mt-4">{{ thread.brand }}</p>
                <p class="text-lg text-customLightGray">{{ thread.style }}</p>
                <p class="text-lg text-customLightGray">
                    Purchased In: <span class="font-bold">{{ thread.purchased }}</span>
                </p>
                <div class="flex flex-col mt-4">
                    <div class="text-customLightGray">
                        <p class="font-victor text-sm">
                            Worn for: <span class="font-bold text-customOrange text-xl font-thread">{{ thread.worn }}</span> Days
                        </p>
                    </div>
                    <div class="text-customLightGray">
                        <p class="font-victor text-sm">
                            Washed: <span class="font-bold text-customOrange text-xl font-thread">{{ thread.washed }}</span> Times
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-row mt-8 justify-center max-w-5xl mx-auto">
            <inertia-link
                class="text-sm text-gray-200 border-2 border-customOrange hover:text-white tranform transition-colors hover:bg-customOrange text-customOrange font-victor text-xl rounded-md py-2 px-6"
                href="/threads/create"
            >
                Add new thread
            </inertia-link>
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
    props: ["threads", "successMessage"],
    data() {
        return {};
    },
    methods: {
        woreToday() {
            this.$inertia.patch(`/threads/${this.threads.id}`).then(() => {
                this.loading = false;
            });
        },
    },
};
</script>
