<template>
    <div class="relative flex items-top justify-center min-h-screen bg-customDark sm:items-center sm:pt-0 overflow-y-none">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <h1 class="font-thread text-6xl text-customOrange">Welcome to ThreadWatch!</h1>
                <h2 class="text-center font-victor text-3xl text-customLightGray mt-4">Quantify your pants</h2>
            </div>
            <div class="flex flex-row items-center mt-8 space-x-4 justify-center">
                <inertia-link
                    :href="route('login')"
                    class="text-sm text-gray-200 border-2 border-customOrange hover:text-white tranform transition-colors hover:bg-customOrange text-customOrange font-victor text-xl rounded-md py-2 px-6"
                >
                    Log in
                </inertia-link>
                <inertia-link
                    :href="route('register')"
                    class="text-sm text-gray-200 border-2 border-customOrange hover:text-white tranform transition-colors hover:bg-customOrange text-customOrange font-victor text-xl rounded-md py-2 px-6"
                >
                    Register
                </inertia-link>
            </div>
        </div>
    </div>
</template>

<style scoped></style>

<script>
export default {
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
}
</script>
