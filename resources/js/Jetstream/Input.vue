<template>
    <input
        class="mt-1 block w-full bg-customBlack border border-customOrange text-customLightGray font-victor outline-none focus:outline-none focus:ring-transparent"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>

<script>
export default {
    props: ["modelValue"],

    emits: ["update:modelValue"],

    methods: {
        focus() {
            this.$refs.input.focus();
        },
    },
};
</script>
