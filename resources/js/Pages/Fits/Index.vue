<template>
    <app-layout>
        <div
            class="
                flex flex-col-reverse
                max-w-4xl
                lg:mx-auto
                justify-center
                sm:justify-between
                mx-8
                gap-4
                mt-8
                lg:mt-16
            "
        >
            <div
                v-if="currentFit.length > 0"
                class="
                    h-auto
                    w-full
                    bg-gradient-to-r
                    from-heroOrangeStart
                    to-heroOrangeEnd
                    rounded-lg
                    p-12
                    font-bold
                    mt-16
                "
            >
                <h1 class="font-victor text-4xl font-bold text-customBlack mb-2">
                    This {{ timeOfDayText }} Fit
                </h1>
                <div
                    class="
                        flex flex-col flex-wrap
                        justify-start
                        lg:flex-row
                        gap-6
                        mt-6
                        mb-12
                        text-customBlack
                    "
                >
                    <div
                        class="
                            font-victor
                            w-full
                            lg:w-auto
                            flex-grow
                            border-customBlack border-2
                            rounded-md
                            p-4
                            relative
                        "
                        v-for="(fit, index) in currentFit"
                        :key="fit.id"
                    >
                        <div
                            class="
                                absolute
                                top-4
                                right-4
                                hover:bg-customBlack
                                rounded-full
                                hover:text-customOrange
                            "
                            @click="deleteFromCurrentFit(index)"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="
                                    h-6
                                    w-6
                                    text-customBlack
                                    transition-colors
                                    hover:text-customOrange
                                    cursor-pointer
                                "
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
                        <p class="text-2xl whitespace-nowrap">
                            {{ fit.brand }}
                        </p>
                        <p class="text-lg whitespace-nowrap">
                            {{ fit.style }}
                        </p>
                    </div>
                </div>
                <inertia-link
                    :data="{ mappedFits }"
                    :href="`/fits/save`"
                    class="
                        text-sm text-gray-200
                        border-2 border-customDark
                        hover:text-customOrange
                        tranform
                        transition-colors
                        hover:bg-customDark
                        text-customDark
                        font-victor
                        text-md
                        font-bold
                        rounded-md
                        py-2
                        px-6
                        w-full
                        sm:mx-0
                        text-center
                        sm:w-auto
                    "
                    >Save</inertia-link
                >
            </div>
            <div class="mt-8 lg:mt-16 mx-auto text-gray-400 text-2xl" v-else>
                Nothing here yet, add some threads and come back
            </div>
        </div>
        <div
            class="
                flex flex-col-reverse flex-wrap
                max-w-4xl
                lg:mx-auto
                justify-center
                sm:justify-between
                mx-8
                gap-4
                mt-8
                lg:mt-16
                pb-8
            "
        >
            <div
                v-for="one in all_fits"
                :key="one.id"
                class="h-auto w-full bg-customBlack rounded-lg p-12 font-bold"
            >
                <h1 class="font-victor text-4xl font-bold text-customOrange mb-2">
                    {{ getHumanDate(one.created_at) }}
                </h1>
                <div
                    class="
                        flex flex-col flex-wrap
                        justify-start
                        sm:flex-row
                        mt-6
                        text-customOrange
                    "
                >
                    <div
                        class="
                            font-victor
                            w-1/3
                            flex-grow
                            border-customBlack border-2
                            rounded-md
                            p-4
                            pl-0
                        "
                        v-for="fit in one.fit"
                        :key="fit.id"
                    >
                        <p class="text-2xl whitespace-nowrap">
                            {{ fit.brand }}
                        </p>
                        <p class="text-lg whitespace-nowrap">{{ fit.style }}</p>
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
    data() {
        return {
            timeOfDay: moment().format('dddd,h,A').split(','),
            timeOfDayText: '',
            currentFit: this.in_fit,
            mappedFits: null,
        }
    },
    props: ['in_fit', 'all_fits', 'errors'],
    methods: {
        getHumanDate: function (date) {
            return moment(date).format('MM/DD/YY')
        },
        deleteFromCurrentFit: function (index) {
            this.currentFit.splice(index, 1)
            this.mappedFits = Object.assign({ ...this.currentFit })
        },
    },
    mounted() {
        if (this.timeOfDay[2] == 'AM') {
            this.timeOfDayText = "Morning's"
        } else if (this.timeOfDay[1] === 12 || this.timeOfDay[1] < 6) {
            this.timeOfDayText = "Afternoon's"
        } else {
            this.timeOfDayText = "Evening's"
        }
        this.mappedFits = Object.assign({ ...this.currentFit })
    },
}
</script>
