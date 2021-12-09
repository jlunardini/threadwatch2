<template>
    <app-layout>
        <div
            class="
                flex flex-col
                sm:flex-row
                max-w-5xl
                lg:mx-auto
                justify-center
                sm:justify-between
                mx-8
                gap-0
                md:gap-4
                pt-24
            "
        >
            <inertia-link
                :href="'/user/' + user.username"
                :key="user.id"
                v-for="user in users"
                class="
                    flex flex-grow flex-shrink
                    justify-between
                    max-w-md
                    mx-auto
                    text-2xl text-customLightGray
                    rounded-md
                    bg-customBlack
                    p-4
                    w-full
                    md:mt-8
                    mt-0
                    sm:mt-16
                    mb-8
                    items-center
                    gap-8
                "
            >
                <div>
                    <span class="text-customOrange mr-1">@</span
                    >{{ user.username }}
                </div>
                <div class="flex flex-row gap-2 items-center">
                    <p class="text-customLightGray text-lg whitespace-nowrap">
                        Thread Count:
                    </p>
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
                            self-center
                        "
                    >
                        <p
                            class="
                                font-bold font-victor
                                text-customDark text-lg
                                rounded-full
                            "
                        >
                            {{ user.threads.length }}
                        </p>
                    </div>
                </div>
            </inertia-link>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Welcome from '@/Jetstream/Welcome'

export default {
    components: {
        AppLayout,
        Welcome,
    },
    props: ['users'],
}
</script>
