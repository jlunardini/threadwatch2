<template>
    <app-layout>
        <div v-if="successMessage" class="bg-red-100">
            {{ successMessage }}
        </div>
        <div
            class="
                grid grid-cols-12
                mx-2
                max-w-6xl
                gap-4
                mt-8
                justify-center
                lg:mx-auto
                overflow-x-auto
            "
        >
            <div
                class="
                    col-span-12
                    row-span-full
                    md:col-span-4
                    text-customLightGray text-3xl
                    flex flex-col
                "
            >
                <div class="mb-2">
                    <span class="text-customOrange mr-1 text-3xl">@</span>{{ user }}
                </div>
                <div class="flex flex-row gap-2 items-center">
                    <p class="text-customLightGray text-lg">Thread Count:</p>
                    <p
                        class="
                            font-bold font-victor
                            text-customOrange text-lg
                            rounded-full
                        "
                    >
                        {{ threads.length }}
                    </p>
                </div>
                <!-- <div class="flex flex-row gap-2 items-center">
           <p class="text-customLightGray text-lg">Member Since:</p>
           <p class="font-bold font-victor text-customOrange text-lg rounded-full">{{user.created_at }}</p>
       </div> -->
            </div>
            <div
                className="flex flex-col col-span-12 md:col-span-4 text-white justify-between bg-customBlack rounded-md py-4 pl-4 w-auto relative"
                v-for="thread in threads"
                :key="thread.id"
            >
                <!-- <span class="h-16 w-16 rounded-full bg-gray-800"></span> -->
                <p class="text-2xl text-customLightGray">{{ thread.brand }}</p>
                <p class="text-lg text-customLightGray">{{ thread.style }}</p>
                <p class="text-lg text-customLightGray">
                    Purchased In: <span class="font-bold">{{ thread.purchased }}</span>
                </p>
                <div class="flex flex-col mt-2">
                    <div class="text-customLightGray">
                        <p class="font-victor text-sm">
                            Worn for:
                            <span
                                class="font-bold text-customOrange text-xl font-thread"
                                >{{ thread.worn }}</span
                            >
                            Days
                        </p>
                    </div>
                    <div class="text-customLightGray">
                        <p class="font-victor text-sm">
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
        </div>
        <dropdown></dropdown>
    </app-layout>
</template>

<script>
import AppLayout from './../../Layouts/AppLayout'
import Welcome from './../../Jetstream/Welcome'
import ThreadNav from '../Components/ThreadNav'

export default {
    components: {
        AppLayout,
        ThreadNav,
    },
    props: ['threads', 'user', 'successMessage'],
    data() {
        return {
            showingNavigationDropdown: false,
        }
    },
    methods: {
        woreToday() {
            this.$inertia.patch(`/threads/${this.threads.id}`).then(() => {
                this.loading = false
            })
        },
    },
}
</script>
