<template>
    <app-layout>
        <div class="flex flex-col sm:flex-row max-w-5xl lg:mx-auto justify-center sm:justify-between mx-2 gap-4">
            <inertia-link :href=
            "'/user/' + user.username"  :key="user.id" v-for="user in users" class=" max-w-md mx-auto text-2xl text-customLightGray rounded-md bg-customBlack p-4 w-full mt-8 sm:mt-16 mb-8">
                <span class="text-customOrange mr-1">@</span>{{user.username}}
            </inertia-link>
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
    props: ["users"],
};
</script>
