<template>
    <app-layout>
        <div class="flex flex-col max-w-5xl lg:mx-auto justify-center mx-2">
            <div class="bg-customDark p-2 max-w-md mt-8 md:mt-16">
                <h1 class="text-customLightGray text-4xl mb-8">Most Worn</h1>
                <div className="flex flex-col gap-4">
                    <div className="flex flex-row text-white justify-between items-center bg-customBlack rounded-md py-2 pl-4 w-auto relative" v-for="thread in threads" :key="thread.id">
                        <div>
                            <p class="text-2xl text-customLightGray">{{ thread.brand }}</p>
                            <p class="text-2xl text-customLightGray">{{ thread.style }}</p>
                        </div>
                        <div class="flex flex-row items-center justify-center mr-6 gap-2">
                            <div class="bg-customOrange h-8 w-8 rounded-full flex items-center justify-center leading-none">
                                <p class="font-bold text-customDark text-xl rounded-full">{{ thread.worn }}</p>
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

export default {
    components: {
        AppLayout,
        Welcome,
    },
    props: ["threads", "successMessage"],
};
</script>
