<template>
    <div>
        <jet-banner />

        <div class="min-h-screen bg-customDark overflow-hidden">
            <nav
                class="
                    bg-customBlack
                    w-full
                    fixed
                    top-0
                    flex
                    items-center
                    flex-row
                    justify-end
                    md:justify-center
                    h-16
                    gap-8
                    z-30
                    px-4
                    md:px-0
                "
            >
                <!-- Navigation Links -->
                <div className="md:flex flex-row gap-8 hidden">
                    <jet-nav-link
                        :href="route('dashboard')"
                        :active="route().current('dashboard')"
                        >Dashboard</jet-nav-link
                    >
                    <jet-nav-link
                        :href="route('threads.index')"
                        :active="route().current('threads.index')"
                        >Threads</jet-nav-link
                    >
                    <jet-nav-link
                        :href="route('social.feed')"
                        :active="route().current('social.feed')"
                        >Feed</jet-nav-link
                    >
                    <jet-nav-link
                        :href="route('fits.index')"
                        :active="route().current('fits.index')"
                        >Fits</jet-nav-link
                    >
                </div>
                <!-- Settings Dropdown -->
                <div class="absolute right-4 hidden md:block">
                    <jet-dropdown align="right" width="48">
                        <template #trigger>
                            <span class="inline-flex rounded-md pt-2">
                                <button
                                    type="button"
                                    class="
                                        inline-flex
                                        items-center
                                        text-gray-500
                                        transition
                                    "
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                                </button>
                            </span>
                        </template>

                        <template #content>
                            <!-- Account Management -->
                            <jet-dropdown-link :href="route('profile.show')">
                                Profile
                            </jet-dropdown-link>
                            <div class="border-t border-gray-100 mx-4"></div>
                            <!-- Authentication -->
                            <form @submit.prevent="logout">
                                <jet-dropdown-link href="/logout">
                                    Log Out
                                </jet-dropdown-link>
                            </form>
                        </template>
                    </jet-dropdown>
                </div>
                <transition>
                    <div
                        v-if="flashData"
                        class="
                            block
                            lg:hidden
                            border border-customGreen
                            bg-customDark
                            rounded-md
                            text-customGreen
                            p-2
                            text-lg
                            flex flex-row
                            gap-2
                            items-center
                            max-w-sm
                            absolute
                            top-1/2
                            left-2
                            transform
                            -translate-y-1/2
                        "
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                        <p>{{ successMessage }}</p>
                    </div>
                </transition>
                <button
                    type="button"
                    @click="showingNavigation = !showingNavigation"
                    class="uppercase text-xl text-customLightGray md:hidden"
                >
                    {{ showingNavigation ? 'Close' : 'Menu' }}
                </button>
            </nav>

            <!-- Page Content -->
            <main class="relative">
                <transition
                    enter-active-class="transition ease-out duration-200"
                    enter-from-class="transform opacity-0 scale-95"
                    enter-to-class="transform opacity-100 scale-100"
                    leave-active-class="transition ease-in duration-75"
                    leave-from-class="transform opacity-100 scale-100"
                    leave-to-class="transform opacity-0 scale-95"
                >
                    <div
                        v-if="showingNavigation"
                        className="overscroll-none overflow-hidden z-20 flex flex-col justify-start gap-16 items-center bg-customBlack overflow-y-hidden fixed h-full inset-0 top-16 w-full max-h-screen text-customLightGray p-4 pt-8"
                    >
                        <jet-nav-link
                            :href="route('dashboard')"
                            :active="route().current('dashboard')"
                            >Dashboard</jet-nav-link
                        >
                        <jet-nav-link
                            :href="route('threads.index')"
                            :active="route().current('threads.index')"
                            >Threads</jet-nav-link
                        >
                        <jet-nav-link
                            :href="route('social.feed')"
                            :active="route().current('social.feed')"
                            >Feed</jet-nav-link
                        >
                        <jet-nav-link
                            :href="route('fits.index')"
                            :active="route().current('fits.index')"
                            >Fits</jet-nav-link
                        >
                        <jet-nav-link
                            :href="route('profile.show')"
                            :active="route().current('profile.show')"
                            >Profile</jet-nav-link
                        >
                        <jet-nav-link
                            :href="route('logout')"
                            :active="route().current('logout')"
                            >Logout</jet-nav-link
                        >
                    </div>
                </transition>
                <transition
                    enter-active-class=" transition ease-out duration-500"
                    enter-from-class=" transform opacity-0 scale-80 "
                    enter-to-class="  transform opacity-100 scale-100"
                    leave-active-class="transition ease-out duration-500"
                    leave-from-class="transform opacity-100 scale-100"
                    leave-to-class="transform opacity-80 scale-80"
                >
                    <div
                        v-if="flashData"
                        class="
                            hidden
                            lg:block
                            border border-customGreen
                            bg-customDark
                            rounded-md
                            text-customGreen
                            p-2
                            text-lg
                            flex flex-row
                            gap-2
                            items-center
                            max-w-sm
                            absolute
                            top-0
                            left-2
                            lg:top-6
                            lg:right-8
                        "
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                        <p>{{ successMessage }}</p>
                    </div>
                </transition>
                <slot
                    v-bind:class="{ 'overflow-y-hidden': showingNavigation }"
                    class="overscroll-none"
                ></slot>
            </main>
        </div>
    </div>
</template>

<script>
import JetApplicationMark from '@/Jetstream/ApplicationMark'
import JetBanner from '@/Jetstream/Banner'
import JetDropdown from '@/Jetstream/Dropdown'
import JetDropdownLink from '@/Jetstream/DropdownLink'
import JetNavLink from '@/Jetstream/NavLink'
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'

export default {
    components: {
        JetApplicationMark,
        JetBanner,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink,
    },

    inject: ['page'],
    props: ['successMessage'],
    data() {
        return {
            showingNavigationDropdown: false,
            flashData: false,
            showingNavigation: false,
        }
    },

    methods: {},
    watch: {
        successMessage: function (newVal, oldVal) {
            this.flashData = true
            setTimeout(() => {
                this.flashData = false
            }, 3000)
        },
    },
}
</script>
