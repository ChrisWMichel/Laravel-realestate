<template>
    <filtersListing :filters="filters" />

    <Head title="Listings" />

    <div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-2 lg:grid-cols-3">
        <!-- listing in listings.data -->
        <listingItem
            v-for="listing in listings.data"
            :key="listing.id"
            :listing="listing"
        />
    </div>
    <div v-if="listings.data.length > 0" class="flex justify-center my-4">
        <PaginationList :Links="listings.links" />
    </div>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
import listingItem from "@/Pages/Listing/Index/Components/listingItem.vue";
import PaginationList from "@/Components/UI/PaginationList.vue";
import filtersListing from "@/Pages/Listing/Index/Components/filtersListing.vue";

const props = defineProps({
    listings: {
        type: Object,
        required: true,
    },
    filters: {
        type: Object,
    },
});
</script>

<style></style>
