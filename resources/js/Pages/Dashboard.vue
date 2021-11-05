<template>
    <app-layout>
        <div class="flex flex-col md:flex-row max-w-5xl lg:mx-auto justify-center md:justify-between mx-2 gap-4">
            <div class="bg-customDark p-2 w-full md:w-1/2 mt-8 md:mt-16">
                <h1 class="text-customLightGray text-4xl mb-4">Thread Count</h1>
                <div class="flex flex-col flex-grow h-full">
                    <div class="flex flex-row text-white justify-start items-center bg-customBlack rounded-md py-2 pl-4 w-auto relative gap-6">
                        <div class="flex flex-col gap-2 p-4 justify-center">
                            <div class="bg-customOrange h-16 w-16 rounded-full flex items-center justify-center leading-none">
                                <p class="font-bold font-victor text-customDark text-4xl rounded-full">{{ thread_count_total }}</p>
                            </div>
                            <p class="text-customLightGray text-2xl text-center">Total</p>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div>
                                <p class="text-customLightGray text-2xl">
                                    Jeans: <span class="ml-1 text-customOrange text-2xl font-semibold">{{ jeans }}</span>
                                </p>
                            </div>
                            <div>
                                <p class="text-customLightGray text-2xl">
                                    Tops: <span class="ml-1 text-customOrange text-2xl font-semibold">{{ tops }}</span>
                                </p>
                            </div>
                            <div>
                                <p class="text-customLightGray text-2xl">
                                    Kicks: <span class="ml-1 text-customOrange text-2xl font-semibold">{{ kicks }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-customDark p-2 w-full md:w-1/2 mt-8 md:mt-16">
                <h1 class="text-customLightGray text-4xl mb-4">Most Worn</h1>
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
    props: ["threads", "thread_count_total", "jeans", "tops", "kicks", "successMessage"],
};
</script>
