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
                        <Link class="font-bold" :href="route('listing.index')"
                            >Real Estate</Link
                        >
                    </div>
                    <div>
                        <Link
                            class="btn-primary"
                            :href="route('listing.create')"
                            >+ New Listing</Link
                        >
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

    <main class="container px-4 py-8 mx-auto">
        <slot></slot>
    </main>
</template>

<script setup>
import { ref, watch } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

const page = usePage();
const showSuccessMessage = ref(false);
const showErrorMessage = ref(false);

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
