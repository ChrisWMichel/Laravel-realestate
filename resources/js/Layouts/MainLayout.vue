<template>
    <div class="min-h-full">
        <nav class="bg-gray-300">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center space-x-4">
                        <Link :href="route('listing.index')">Listings</Link>
                        <!-- <Link :href="route('listing.show')">Show</Link> -->
                        <!-- <div>The page with time: {{ timer }}</div> -->
                    </div>
                </div>
            </div>
        </nav>
        <div v-if="showSuccessMessage" class="alert alert-success">
            {{ page.props.flash.success }}
        </div>
        <div v-if="showErrorMessage" class="alert alert-danger">
            {{ page.props.flash.error }}
        </div>
    </div>
    <slot />
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
                    console.log("Success message hidden");
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

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}
</style>
