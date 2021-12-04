<template>
    <app-layout>
        <div
            class="
                grid grid-cols-12
                auto-rows-auto
                grid-flow-row grid-rows-6
                max-w-5xl
                lg:mx-auto
                justify-start
                sm:justify-start
                mx-2
                gap-4
            "
        >
            <div
                class="
                    col-span-12
                    sm:col-span-6
                    sm:row-span-1
                    bg-customDark
                    p-2
                    w-full
                    self-start
                    mt-8
                    sm:mt-16
                "
            >
                <h1 class="text-customLightGray text-4xl mb-4">Thread Count</h1>
                <div class="flex flex-col flex-grow h-auto sm:h-full">
                    <div
                        class="
                            flex flex-row
                            text-white
                            justify-start
                            items-center
                            bg-customBlack
                            rounded-md
                            py-2
                            pl-4
                            w-auto
                            relative
                            gap-6
                        "
                    >
                        <div
                            class="
                                flex flex-col
                                w-5/12
                                sm:w-auto
                                gap-2
                                p-4
                                justify-center
                            "
                        >
                            <div
                                class="
                                    bg-customOrange
                                    h-16
                                    w-16
                                    rounded-full
                                    flex
                                    items-center
                                    justify-center
                                    leading-none
                                    self-center
                                "
                            >
                                <p
                                    class="
                                        font-bold font-victor
                                        text-customDark text-4xl
                                        rounded-full
                                    "
                                >
                                    {{ thread_count_total }}
                                </p>
                            </div>
                            <p
                                class="
                                    text-customLightGray text-2xl text-center
                                "
                            >
                                Total
                            </p>
                        </div>
                        <div class="flex flex-col md:flex-row gap-1 sm:gap-4">
                            <div>
                                <div
                                    class="
                                        text-customLightGray text-2xl
                                        flex flex-row
                                        justify-between
                                        gap-2
                                        items-center
                                    "
                                >
                                    <p>Jeans:</p>
                                    <span
                                        class="
                                            text-customOrange text-2xl
                                            font-semibold
                                        "
                                        >{{ jeans }}</span
                                    >
                                </div>
                            </div>
                            <div>
                                <div
                                    class="
                                        text-customLightGray text-2xl
                                        flex flex-row
                                        justify-between
                                        gap-2
                                        items-center
                                    "
                                >
                                    <p>Tops:</p>
                                    <span
                                        class="
                                            text-customOrange text-2xl
                                            font-semibold
                                        "
                                        >{{ tops }}</span
                                    >
                                </div>
                            </div>
                            <div>
                                <div
                                    class="
                                        text-customLightGray text-2xl
                                        flex flex-row
                                        justify-between
                                        gap-2
                                        items-center
                                    "
                                >
                                    <p>Kicks:</p>
                                    <span
                                        class="
                                            text-customOrange text-2xl
                                            font-semibold
                                        "
                                        >{{ kicks }}</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="
                    col-span-12
                    sm:col-span-6
                    bg-customDark
                    sm:row-span-4
                    p-2
                    w-full
                    mt-8
                    sm:mt-16
                    mb-8
                "
            >
                <h1 class="text-customLightGray text-4xl mb-4">Most Worn</h1>
                <div className="flex flex-col gap-4">
                    <div
                        className="flex flex-row text-white justify-between items-center bg-customBlack rounded-md py-2 pl-4 w-auto relative"
                        v-for="thread in threads"
                        :key="thread.id"
                    >
                        <div>
                            <p class="text-2xl text-customLightGray">
                                {{ thread.brand }}
                            </p>
                            <p class="text-2xl text-customLightGray">
                                {{ thread.style }}
                            </p>
                        </div>
                        <div
                            class="
                                flex flex-row
                                items-center
                                justify-center
                                mr-6
                                gap-2
                            "
                        >
                            <div
                                class="
                                    bg-customOrange
                                    h-8
                                    w-8
                                    rounded-full
                                    flex
                                    items-center
                                    justify-center
                                    leading-none
                                "
                            >
                                <p
                                    class="
                                        font-bold
                                        text-customDark text-xl
                                        rounded-full
                                    "
                                >
                                    {{ thread.worn }}
                                </p>
                            </div>
                            <p class="text-customOrange font-semibold text-sm">
                                Days
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="
                    col-span-12
                    sm:col-span-6
                    bg-customDark
                    p-2
                    sm:row-span-2
                    w-full
                    pb-8
                    sm:pb-0
                "
            >
                <h1 class="text-customLightGray text-4xl mb-4">Recent Fits</h1>
                <div className="flex flex-col gap-4">
                    <div
                        v-for="single in all_fits"
                        :key="single.id"
                        class="
                            border border-transparent
                            transition-colors
                            hover:border-customOrange
                            flex flex-row flex-wrap
                            text-white
                            justify-between
                            items-center
                            bg-customBlack
                            rounded-md
                            p-8
                            w-auto
                            relative
                            cursor-pointer
                            gap-4
                            sm:gap-0
                        "
                    >
                        <div class="w-full text-customOrange text-xl mb-2">
                            {{ getHumanDate(single.created_at) }}
                        </div>
                        <div
                            class="w-full sm:w-auto"
                            v-for="fit in single.fit"
                            :key="fit.id"
                        >
                            <p class="text-xl text-customLightGray">
                                {{ fit.brand }}
                            </p>
                            <p class="text-xl text-customLightGray">
                                {{ fit.style }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Welcome from '@/Jetstream/Welcome'
import moment from 'moment'

export default {
    components: {
        AppLayout,
        Welcome,
    },
    props: [
        'threads',
        'thread_count_total',
        'jeans',
        'tops',
        'kicks',
        'successMessage',
        'all_fits',
    ],
    methods: {
        getHumanDate: function (date) {
            return moment(date).format('MM/DD/YY')
        },
    },
}
</script>
