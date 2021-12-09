<template>
    <div>
        <inertia-link :href="href" class="block p-4 text-sm whitespace-nowrap text-right leading-5 text-gray-200 focus:outline-none focus:bg-gray-100 transition">
            <slot></slot>
        </inertia-link>
    </div>
</template>

<script>
export default {
    props: ["href", "as"],
};
</script>
