<template>
    <app-layout>
        <div
            class="
                flex flex-col
                sm:flex-row
                max-w-4xl
                lg:mx-auto
                justify-center
                sm:justify-between
                mx-2
                gap-4
                mt-16
            "
        >
            <h2
                className="text-xl text-customLightGray mx-auto text-center border border-customLightGray rounded-md p-2 mt-16 mb-4"
                v-if="threads.length == 0"
            >
                Nothing Worn Today
            </h2>
            <div
                v-if="threads.length != 0"
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
                <h1
                    class="font-victor text-4xl font-bold text-customBlack mb-2"
                >
                    Today's Fit
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
                        "
                        v-for="thread in threads"
                        :key="thread.id"
                    >
                        <p class="text-2xl whitespace-nowrap">
                            {{ thread.brand }}
                        </p>
                        <p class="text-lg whitespace-nowrap">
                            {{ thread.style }}
                        </p>
                    </div>
                </div>
                <inertia-link
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
        </div>
        <div
            class="
                flex flex-col
                sm:flex-row
                flex-wrap
                max-w-4xl
                lg:grid lg:grid-cols-4
                lg:mx-auto
                justify-center
                sm:justify-between
                mx-2
                gap-4
                mt-8
                lg:mt-16
                pb-8
            "
        >
            <div
                v-for="one in all_fits"
                :key="one.id"
                class="
                    h-auto
                    w-full
                    bg-customBlack
                    rounded-lg
                    p-12
                    font-bold
                    lg:col-span-2
                "
            >
                <h1
                    class="
                        font-victor
                        text-4xl
                        font-bold
                        text-customOrange
                        mb-2
                    "
                >
                    {{ getHumanDate(one.created_at) }}
                </h1>
                <div
                    class="
                        flex flex-col flex-wrap
                        justify-start
                        lg:flex-row
                        lg:col-span-2
                        mt-6
                        mb-12
                        text-customOrange
                    "
                >
                    <div
                        class="
                            font-victor
                            w-full
                            lg:col-span-2
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
    props: ['threads', 'all_fits', 'errors'],
    methods: {
        getHumanDate: function (date) {
            return moment(date).format('MM/DD/YY')
        },
    },
}
</script>
