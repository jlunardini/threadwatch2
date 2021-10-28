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
            return this.active ? "font-thread text-customOrange text-2xl" : "font-thread text-gray-400 text-2xl hover:text-gray-300";
        },
    },
};
</script>
