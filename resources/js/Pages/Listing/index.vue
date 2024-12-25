<template>
    <div>
        <Head title="Listings" />

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <listing
                v-for="listing in listings"
                :key="listing.id"
                :listing="listing"
                class="my-2"
            />
        </div>
    </div>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
import listing from "@/Pages/Listing/Index/Components/listing.vue";

defineProps({
    listings: {
        type: Array,
    },
});
</script>

<style></style>
