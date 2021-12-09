<template>
    <inertia-link :href="href" :class="classes">
        <slot></slot>
    </inertia-link>
</template>

<script>
export default {
    props: ["href", "active"],

    computed: {
        classes() {
            return this.active
                ? "text-2xl md:text-4xl text-customOrange transform transition-transform cursor-pointer"
                : "text-2xl md:text-4xl text-customLightGray transform transition-transform cursor-pointer hover:-translate-y-1 hover:border-2";
        },
    },
};
</script>
