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
                mx-2
                gap-4
                mt-16
            "
        >
            <inertia-link
                :href="'/user/' + user.username"
                :key="user.id"
                v-for="user in users"
                class="
                    flex
                    justify-between
                    max-w-md
                    mx-auto
                    text-2xl text-customLightGray
                    rounded-md
                    bg-customBlack
                    p-4
                    w-full
                    mt-8
                    sm:mt-16
                    mb-8
                    items-center
                "
            >
                <div>
                    <span class="text-customOrange mr-1">@</span
                    >{{ user.username }}
                </div>
                <div class="flex flex-row gap-2 items-center">
                    <p class="text-customLightGray text-lg">Thread Count:</p>
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
