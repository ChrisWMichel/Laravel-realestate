<template>
    <div class="min-h-full">
        <nav class="bg-gray-300 shadow dark:bg-gray-500 dark:text-white">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="link-style">
                        <Link class="font-bold" :href="route('listing.index')"
                            >Listings</Link
                        >
                    </div>
                    <div class="link-style">
                        <Link class="font-bold" :href="route('home')"
                            >Real Estate</Link
                        >
                    </div>
                    <div v-if="user" class="flex items-center gap-4">
                        <Link
                            :href="route('notification.index')"
                            class="relative py-2 pr-2 text-lg text-gray-900"
                        >
                            🔔
                            <div
                                v-if="notificationCount > 0"
                                class="absolute top-0 right-0 flex items-center justify-center w-5 h-5 text-xs font-medium text-white bg-red-500 border border-white rounded-full"
                            >
                                {{ notificationCount }}
                            </div>
                        </Link>

                        <Link
                            :href="route('realtor.listing.index')"
                            class="text-white hover:text-yellow-500"
                        >
                            {{ user.firstname }} {{ user.lastname }}
                        </Link>

                        <Link
                            class="btn-primary"
                            :href="route('realtor.listing.create')"
                            >+ New Listing</Link
                        >

                        <!-- <Link
                            class="p-1 ml-6 text-sm bg-gray-800 rounded-md hover:bg-gray-600"
                            :href="route('logout')"
                            method="DELETE"
                            as="button"
                        >
                            Log Out
                        </Link> -->
                        <form @submit.prevent="logout" class="inline">
                            <input
                                type="hidden"
                                name="_token"
                                :value="csrfToken"
                            />
                            <input
                                type="hidden"
                                name="_method"
                                value="DELETE"
                            />
                            <button
                                type="submit"
                                class="p-1 ml-6 text-sm bg-gray-800 rounded-md hover:bg-gray-600"
                            >
                                Log Out
                            </button>
                        </form>
                    </div>
                    <div v-else class="flex items-center gap-2">
                        <Link
                            class="p-1 ml-6 text-sm bg-gray-800 rounded-md hover:bg-gray-600"
                            :href="route('login')"
                            >Sign In</Link
                        >
                        <Link
                            class="p-1 ml-6 text-sm bg-gray-800 rounded-md hover:bg-gray-600"
                            :href="route('user-account.create')"
                            >Register</Link
                        >
                    </div>
                    <div>
                        <div>
                            <!-- v-if="page.props.auth.user.name" -->
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div
            v-if="showSuccessMessage"
            class="p-4 mb-4 text-xl font-bold text-center text-green-800 bg-green-100 border border-green-400 dark:border-green-800"
        >
            {{ page.props.flash.success }}
        </div>
        <div v-if="showErrorMessage" class="alert alert-danger">
            {{ page.props.flash.error }}
        </div>
    </div>

    <main class="container w-full px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <slot></slot>
    </main>
</template>

<script setup>
import { ref, watch, computed } from "vue";
import { Link, usePage, router } from "@inertiajs/vue3";

const showSuccessMessage = ref(false);
const showErrorMessage = ref(false);

const page = usePage();

const user = computed(() => page.props?.auth?.user || null);
// const csrfToken = computed(() =>
//     document.querySelector('meta[name="csrf-token"]').getAttribute("content")
// ); //page.props.csrf;
const csrfToken = computed(() => page.props.csrf);

const logout = () => {
    router.delete(route("logout"));
};

const notificationCount = computed(() => {
    return Math.min(page.props.auth.user.notificationCount, 9);
});

watch(
    () => page.props?.flash,
    (newFlash) => {
        if (newFlash) {
            if (newFlash.success) {
                showSuccessMessage.value = true;
                setTimeout(() => {
                    showSuccessMessage.value = false;
                }, 5000);
            }
            if (newFlash.error) {
                showErrorMessage.value = true;
                setTimeout(() => {
                    showErrorMessage.value = false;
                }, 5000);
            }
        }
    },
    { immediate: true }
);
</script>

<style scoped>
.alert {
    padding: 1em;
    margin-bottom: 1em;
    border: 1px solid transparent;
    border-radius: 0.25em;
    transition: opacity 0.5s ease-out;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

.link-style {
    @apply flex items-center space-x-4 text-xl text-indigo-600 dark:text-indigo-300 hover:text-yellow-500;
}
</style>
