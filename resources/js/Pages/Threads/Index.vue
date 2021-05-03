<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">All Threads</h2>
        </template>
        <div v-if="successMessage" class="bg-red-100">
            {{ successMessage }}
        </div>

        <div className="flex flex-row text-white justify-between bg-yellow-600 container mx-auto m-4 p-8" v-for="thread in threads" :key="thread.id">
            <p>{{ thread.brand }}</p>
            <p>{{ thread.size }}</p>
            <p>{{ thread.year }}</p>
            <inertia-link :href="`/threads/${thread.id}/edit`">Edit</inertia-link>
        </div>
        <div class="container mt-4">
            <a class="rounded-full bg-white p-4 w-64 text-yellow-600 flex justify-center ml-12" href="/threads/create">Add new Thread</a>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout"
import Welcome from "./../../Jetstream/Welcome"
export default {
    components: {
        AppLayout,
    },
    props: ["threads", "successMessage"],
    data() {
        return {}
    },
    methods: {},
}
</script>
