<template>
    <div class="relative flex items-top justify-center min-h-screen bg-customDark sm:items-center sm:pt-0 overflow-y-none">
        <div class="flex flex-col max-w-2xl mx-auto">
            <h1 class="font-thread text-5xl text-customOrange w-full mb-8">Register for ThreadWatch</h1>
            <jet-validation-errors class="my-4 w-full" />
            <form @submit.prevent="submit">
                <div>
                    <jet-label class="font-victor text-customLightGray text-xl font-medium" for="name" value="Name" />
                    <jet-input
                        id="name"
                        type="text"
                        class="mt-1 block w-full bg-customBlack border border-customOrange text-customLightGray font-victor outline-none focus:outline-none focus:ring-transparent"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />
                </div>

                <div class="mt-4">
                    <jet-label class="font-victor text-customLightGray text-xl font-medium" for="email" value="Email" />
                    <jet-input id="email" type="email" class="mt-1 block w-full bg-customBlack border border-customOrange text-customLightGray font-victor" v-model="form.email" required />
                </div>

                <div class="mt-4">
                    <jet-label class="font-victor text-customLightGray text-xl font-medium" for="password" value="Password" />
                    <jet-input
                        id="password"
                        type="password"
                        class="mt-1 block w-full bg-customBlack border border-customOrange font-victor text-customLightGray"
                        v-model="form.password"
                        required
                        autocomplete="new-password"
                    />
                </div>

                <div class="mt-4">
                    <jet-label class="font-victor text-customLightGray text-xl font-medium" for="password_confirmation" value="Confirm Password" />
                    <jet-input
                        id="password_confirmation"
                        type="password"
                        class="mt-1 block w-full bg-customBlack border border-customOrange font-victor text-customLightGray"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                    />
                </div>

                <div class="flex items-center justify-end mt-4 space-x-4">
                    <inertia-link :href="route('login')" class="underline text-sm text-customLightGray font-victor"> Already registered? </inertia-link>

                    <jet-button
                        class="border-2 border-customOrange hover:text-white tranform transition-colors hover:bg-customOrange text-customOrange font-victor text-md rounded-md py-2 px-6"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Register
                    </jet-button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import JetButton from "@/Jetstream/Button"
import JetInput from "@/Jetstream/Input"
import JetCheckbox from "@/Jetstream/Checkbox"
import JetLabel from "@/Jetstream/Label"
import JetValidationErrors from "@/Jetstream/ValidationErrors"

export default {
    components: {
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors,
    },

    data() {
        return {
            form: this.$inertia.form({
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
                terms: false,
            }),
        }
    },

    methods: {
        submit() {
            this.form.post(this.route("register"), {
                onFinish: () => this.form.reset("password", "password_confirmation"),
            })
        },
    },
}
</script>
