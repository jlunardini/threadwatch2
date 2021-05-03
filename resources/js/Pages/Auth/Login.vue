<template>
    <div class="relative flex items-top justify-center min-h-screen bg-customDark sm:items-center sm:pt-0 overflow-y-none">
        <div class="flex flex-col max-w-2xl mx-auto">
            <h1 class="font-thread text-5xl text-customOrange w-full mb-8">Log In to ThreadWatch</h1>
            <jet-validation-errors class="mb-4" />
            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>
            <form @submit.prevent="submit">
                <div>
                    <jet-label class="font-victor text-customLightGray text-xl font-medium" for="email" value="Email" />
                    <jet-input
                        id="email"
                        type="email"
                        class="mt-1 block w-full bg-customBlack border border-customOrange text-customLightGray font-victor outline-none focus:outline-none focus:ring-transparent"
                        v-model="form.email"
                        required
                        autofocus
                    />
                </div>

                <div class="mt-4">
                    <jet-label class="font-victor text-customLightGray text-xl font-medium" for="password" value="Password" />
                    <jet-input
                        id="password"
                        type="password"
                        class="mt-1 block w-full bg-customBlack border border-customOrange text-customLightGray font-victor outline-none focus:outline-none focus:ring-transparent"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <jet-checkbox name="remember" v-model:checked="form.remember" />
                        <span class="font-victor text-customLightGray text-sm font-medium ml-2">Remember me</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4 space-x-4">
                    <inertia-link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-customLightGray font-victor"> Forgot your password? </inertia-link>

                    <jet-button
                        class="border-2 border-customOrange hover:text-white tranform transition-colors hover:bg-customOrange text-customOrange font-victor text-md rounded-md py-2 px-6"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Log in
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

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: "",
                password: "",
                remember: false,
            }),
        }
    },

    methods: {
        submit() {
            this.form
                .transform(data => ({
                    ...data,
                    remember: this.form.remember ? "on" : "",
                }))
                .post(this.route("login"), {
                    onFinish: () => this.form.reset("password"),
                })
        },
    },
}
</script>
