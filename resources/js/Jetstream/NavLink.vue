<template>
    <inertia-link :href="href" :class="classes">
        <slot></slot>
    </inertia-link>
</template>

<script>
export default {
    props: ['href', 'active'],

    computed: {
        classes() {
            return this.active
                ? 'text-customOrange text-4xl md:text-2xl'
                : 'text-gray-400 text-4xl md:text-2xl hover:text-gray-300'
        },
    },
}
</script>
