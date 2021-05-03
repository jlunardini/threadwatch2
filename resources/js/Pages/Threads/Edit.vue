<template>
    <app-layout>
        <div>
            <form action="#" method="PATCH" class="container mx-auto bg-yellow-600 mt-8" @submit.prevent="updateThread">
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" id="brand" placeholder="brand" v-model="form.brand" />
                </div>
                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="text" id="size" v-model="form.size" />
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="text" id="year" v-model="form.year" />
                </div>
                <button type="submit">Update info</button>
            </form>
        </div>
        <div className="flex flex-row text-white justify-between bg-yellow-600 container mx-auto m-4 p-8">
            <button class="btn btn-danger" @click="deleteThread">Delete Thread</button>
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
                brand: this.threads.brand,
                size: this.threads.size,
                year: this.threads.year,
            },
        }
    },
    methods: {
        updateThread() {
            this.loading = true
            this.$inertia.patch(`/threads/${this.threads.id}`, this.form).then(() => {
                this.loading = false
            })
        },
        deleteThread() {
            if (confirm("Are you sure you want to delete this contact?")) {
                this.$inertia.delete(`/threads/${this.threads.id}`).then(() => {})
            }
        },
    },
}
</script>
<style scoped></style>
