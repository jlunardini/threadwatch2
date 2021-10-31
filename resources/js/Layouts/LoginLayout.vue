<template>
    <div class="relative flex items-center justify-center min-h-screen bg-customDark sm:items-center sm:pt-0 overflow-y-none">
        <div class="max-w-6xl mx-auto lg:px-8">
            <!-- Page Content -->
            <main>
                <slot></slot>
            </main>
        </div>
        <p class="bg-customBlack w-auto flex-flex-grow-0 self-center font-victor text-md text-customLightGray rounded-full py-2 px-4 absolute bottom-16 left-1/2 transform -translate-x-1/2">Beta</p>
    </div>
</template>

<script>
export default {
    inject: ["page"],

    data() {
        return {};
    },

    methods: {},
};
</script>
