<template>
    <div class="relative flex items-center justify-center min-h-screen bg-customDark sm:items-center sm:pt-0 overflow-y-none">
        <div class="max-w-6xl mx-auto lg:px-8">
            <!-- Page Content -->
            <main>
                <slot></slot>
            </main>
        </div>
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
