<template>
    <login-layout>
        <div class="flex flex-col">
            <h1
                class="
                    font-thread
                    text-center text-4xl
                    md:text-5xl
                    lg:text-6xl
                    text-customOrange
                    mb-12
                "
            >
                Log In
            </h1>
        </div>
        <jet-validation-errors class="mb-4" />
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <form @submit.prevent="submit">
            <div>
                <jet-label
                    class="font-victor text-customLightGray text-xl font-medium"
                    for="email"
                    value="Email"
                />
                <jet-input
                    id="email"
                    type="email"
                    class="
                        mt-1
                        block
                        w-full
                        bg-customBlack
                        border-none
                        text-customLightGray
                        font-victor
                        outline-none
                        focus:outline-customOrange
                        focus:ring-customOrange
                    "
                    v-model="form.email"
                    required
                    autofocus
                />
            </div>

            <div class="mt-4">
                <jet-label
                    class="font-victor text-customLightGray text-xl font-medium"
                    for="password"
                    value="Password"
                />
                <jet-input
                    id="password"
                    type="password"
                    class="
                        mt-1
                        block
                        w-full
                        bg-customBlack
                        border-none
                        text-customLightGray
                        font-victor
                        outline-none
                        focus:outline-customOrange
                        focus:ring-customOrange
                    "
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <jet-checkbox
                        name="remember"
                        v-model:checked="form.remember"
                    />
                    <span
                        class="
                            font-victor
                            text-customLightGray text-sm
                            font-medium
                            ml-2
                        "
                        >Remember me</span
                    >
                </label>
            </div>

            <div class="flex items-center justify-end mt-8 space-x-4">
                <inertia-link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm text-customLightGray font-victor"
                >
                    Forgot your password?
                </inertia-link>

                <jet-button
                    class="
                        bg-customBlack
                        border-2 border-customOrange
                        hover:text-white
                        tranform
                        transition-colors
                        hover:bg-customOrange
                        text-customOrange
                        font-victor
                        text-md
                        rounded-md
                        py-2
                        px-6
                    "
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log in
                </jet-button>
            </div>
        </form>
    </login-layout>
</template>

<script>
import JetButton from '@/Jetstream/Button'
import JetInput from '@/Jetstream/Input'
import JetCheckbox from '@/Jetstream/Checkbox'
import JetLabel from '@/Jetstream/Label'
import JetValidationErrors from '@/Jetstream/ValidationErrors'
import LoginLayout from '../../Layouts/LoginLayout'

export default {
    components: {
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors,
        LoginLayout,
    },

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
                remember: false,
            }),
        }
    },

    methods: {
        submit() {
            this.form
                .transform((data) => ({
                    ...data,
                    remember: this.form.remember ? 'on' : '',
                }))
                .post(this.route('login'), {
                    onFinish: () => this.form.reset('password'),
                })
        },
    },
}
</script>
