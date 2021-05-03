<template>
    <app-layout>
        <div>
            <form action="/users" method="POST" class="container mx-auto bg-yellow-600 mt-8" @submit.prevent="createThread">
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" id="brand" placeholder="brand" v-model="form.brand" />
                </div>
                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="text" id="size" placeholder="size" v-model="form.size" />
                </div>
                <div class="form-group">
                    <label for="year">Size</label>
                    <input type="text" id="size" placeholder="year" v-model="form.year" />
                </div>
                <button type="submit">Add new thread</button>
            </form>
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
    props: ["threads", "errors"],
    data() {
        return {
            form: {
                brand: "",
                size: "",
                year: "",
            },
        }
    },
    methods: {
        createThread() {
            this.$inertia.post("/threads", this.form)
        },
    },
}
</script>
<style scoped></style>
