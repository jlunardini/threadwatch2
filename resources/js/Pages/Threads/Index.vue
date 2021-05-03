<template>
    <app-layout>
        <div v-if="successMessage" class="bg-red-100">
            {{ successMessage }}
        </div>
        <div class="flex flex-col max-w-5xl mx-auto justify-center">
            <h1 class="font-victor text-4xl text-customLightGray mt-16 underline">Your Tracked Threads</h1>
        </div>
        <div class="flex flex-row space-x-4 mt-4 justify-center ml-24 overflow-x-auto">
            <div className="flex flex-col text-white justify-between bg-customBlack rounded-md border-customOrange border py-4 pl-4 w-auto relative" v-for="thread in threads" :key="thread.id">
                <span class="h-16 w-16 rounded-full bg-gray-800"></span>
                <p class="text-2xl text-customLightGray mt-4">{{ thread.brand }}</p>
                <p class="text-lg text-customLightGray">{{ thread.style }}</p>
                <p class="text-lg text-customLightGray">
                    Purchased In: <span class="font-bold">{{ thread.purchased }}</span>
                </p>
                <div class="flex flex-row absolute top-2 right-2 space-x-2">
                    <inertia-link class="border border-customOrange rounded-full p-2" :href="`/threads/${thread.id}/edit`"
                        ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                            />
                        </svg>
                    </inertia-link>
                    <p class="font-victor border border-customOrange rounded-full py-2 px-4 text-customOrange hover:text-white tranform transition-colors hover:bg-customOrange">Wore Today</p>
                </div>
                <div class="flex flex-row space-x-4 pr-4 mt-4">
                    <div class="bg-customOrange rounded-full py-2 px-4 text-black">
                        <p class="font-victor">Worn for: {{ thread.worn }} Days</p>
                    </div>
                    <div class="bg-customOrange rounded-full p-2 text-black">
                        <p class="font-victor">Washed: {{ thread.washed }} Times</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-row mt-8 justify-start max-w-5xl mx-auto">
            <a
                class="text-sm text-gray-200 border-2 border-customOrange hover:text-white tranform transition-colors hover:bg-customOrange text-customOrange font-victor text-xl rounded-md py-2 px-6"
                href="/threads/create"
            >
                Add new thread
            </a>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout"
import Welcome from "./../../Jetstream/Welcome"
export default {
    components: {
        AppLayout,
    },
    props: ["threads", "successMessage"],
    data() {
        return {}
    },
    methods: {},
}
</script>
