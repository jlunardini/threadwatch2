<template>
    <inertia-link class="text-2xl md:text-4xl text-customLightGray transform transition-transform cursor-pointer hover:-translate-y-1 hover:border-2" href="{{href}}">
        {{ title }}
    </inertia-link>
</template>

<script>
module.exports = {
    data: function () {
        return {};
    },
    props: {
        title: String,
        href: String,
    },
};
</script>
