<template>
    <div class="flex gap-1">
        <Link
            v-for="link in Links"
            :key="link.url"
            :href="link.url || '#'"
            class="p-1 px-4 py-2 text-blue-500 rounded-md hover:text-blue-200"
            :class="[
                { 'bg-indigo-500 text-gray-300': link.active },
                { 'cursor-not-allowed opacity-50': !link.url },
            ]"
            :aria-disabled="!link.url"
            v-html="link.label"
        >
        </Link>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    Links: {
        type: Array,
        required: true,
    },
});
</script>

<style scoped>
.cursor-not-allowed {
    cursor: not-allowed;
}
.opacity-50 {
    opacity: 0.5;
}
</style>
