<template>
    <button
        :type="type"
        class="
            text-sm text-gray-200
            border border-customOrange
            hover:text-white
            tranform
            transition-colors
            hover:bg-customOrange
            text-customOrange
            font-victor
            text-md
            rounded-md
            py-2
            px-6
            w-full
            sm:mx-0
            text-center
            sm:w-auto
        "
    >
        <slot></slot>
    </button>
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: "submit",
        },
    },
};
</script>
