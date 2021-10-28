<template>
    <login-layout>
        <div class="flex flex-col">
            <h1 class="font-thread text-center text-4xl md:text-5xl lg:text-6xl text-customOrange">Welcome to ThreadWatch!</h1>
            <h2 class="text-center font-victor text-lg lg:text-3xl md:text-2xl text-customLightGray mt-4">Quantify your threads</h2>
        </div>
        <div class="flex flex-row flex-wrap md:flex-nowrap items-center mt-12 gap-4 justify-center">
            <inertia-link
                :href="route('login')"
                class="
                    text-sm text-gray-200
                    border-2 border-customOrange
                    hover:text-white
                    tranform
                    transition-colors
                    hover:bg-customOrange
                    text-customOrange
                    font-victor
                    text-xl
                    rounded-md
                    py-2
                    px-6
                    w-full
                    mx-16
                    sm:mx-0
                    text-center
                    sm:w-auto
                "
            >
                Log in
            </inertia-link>
            <inertia-link
                :href="route('register')"
                class="
                    text-sm text-gray-200
                    border-2 border-customOrange
                    hover:text-white
                    tranform
                    transition-colors
                    hover:bg-customOrange
                    text-customOrange
                    font-victor
                    text-xl
                    rounded-md
                    py-2
                    px-6
                    w-full
                    mx-16
                    sm:mx-0
                    text-center
                    sm:w-auto
                "
            >
                Register
            </inertia-link>
        </div>
    </login-layout>
</template>

<style scoped></style>

<script>
import LoginLayout from "../Layouts/LoginLayout";
export default {
    components: {
        LoginLayout,
    },
    props: {},
};
</script>
