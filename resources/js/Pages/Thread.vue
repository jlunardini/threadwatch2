<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                One Thread
            </h2>
        </template>
        <div
            className="flex flex-row text-white justify-between bg-yellow-600 container mx-auto m-4 p-8"
            :key="thread.id"
        >
            <p>{{ thread.brand }}</p>
            <p>{{ thread.size }}</p>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "./../Layouts/AppLayout";
import Welcome from "./../Jetstream/Welcome";
export default {
    components: {
        AppLayout,
        Welcome,
    },
    props: ["data", "errors", "thread"],
    data() {
        return {
            editMode: false,
            isOpen: false,
            form: {
                title: null,
                body: null,
            },
        };
    },
    methods: {},
};
</script>
