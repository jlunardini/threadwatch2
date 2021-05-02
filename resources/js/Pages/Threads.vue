<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                All Threads
            </h2>
        </template>
        <div
            className="flex flex-row text-white justify-between bg-yellow-600 container mx-auto m-4 p-8"
            v-for="thread in threads"
            :key="thread.id"
        >
            <p>{{ thread.brand }}</p>
            <p>{{ thread.size }}</p>
        </div>
        <div
            className="flex flex-col bg-yellow-600 text-white container mx-auto"
        >
            <h1>Create new thread</h1>
            <form action="/threads/" method="POST">
                <div className="flex flex-col w-1/2">
                    <label for="brand">Thread Brand</label>
                    <input type="text" name="brand" />
                </div>
                <div className="flex flex-col w-1/2">
                    <label for="size">Thread Brand</label>
                    <input type="text" name="size" />
                </div>
                <button class="border border-white">Submit</button>
            </form>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "./../Layouts/AppLayout";
import Welcome from "./../Jetstream/Welcome";
export default {
    components: {
        AppLayout,
    },
    props: ["threads"],
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
