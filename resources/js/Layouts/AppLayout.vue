<template>
    <div>
        <jet-banner />

        <div class="min-h-screen bg-customDark">
            <nav class="bg-customBlack w-full sticky flex items-center flex-row justify-center h-16 gap-8 z-30">
                <!-- Navigation Links -->

                <jet-nav-link :href="route('dashboard')" :active="route().current('dashboard')">Dashboard</jet-nav-link>
                <jet-nav-link :href="route('threads.index')" :active="route().current('threads.index')">Threads</jet-nav-link>
                <!-- Settings Dropdown -->
                <div class="absolute right-4">
                    <jet-dropdown align="right" width="48">
                        <template #trigger>
                            <span class="inline-flex rounded-md pt-2">
                                <button type="button" class="inline-flex items-center text-gray-500 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                            <jet-dropdown-link :href="route('profile.show')"> Profile </jet-dropdown-link>
                            <div class="border-t border-gray-100 mx-4"></div>
                            <!-- Authentication -->
                            <form @submit.prevent="logout">
                                <jet-dropdown-link href="/logout"> Log Out </jet-dropdown-link>
                            </form>
                        </template>
                    </jet-dropdown>
                </div>
            </nav>

            <!-- Page Content -->
            <main>
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
import JetApplicationMark from "@/Jetstream/ApplicationMark";
import JetBanner from "@/Jetstream/Banner";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetNavLink from "@/Jetstream/NavLink";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink";

export default {
    components: {
        JetApplicationMark,
        JetBanner,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink,
    },

    inject: ["page"],

    data() {
        return {
            showingNavigationDropdown: false,
        };
    },

    methods: {},
};
</script>
