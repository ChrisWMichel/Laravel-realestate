<template>
    <div>
        <Head :title="listing.city" />

        <div>
            <h1>{{ listing.city }}</h1>
            <ListingAddress :listing="listing" />
            <p>Bedrooms: {{ listing.beds }}</p>
            <p>Baths: {{ listing.baths }}</p>
            <p>Sqft: {{ listing.area }}</p>
        </div>
    </div>
</template>

<script setup>
import ListingAddress from "@/Components/ListingAddress.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
    listing: {
        type: Object,
    },
});
</script>

<style></style>
