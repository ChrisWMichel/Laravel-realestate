<template>
    <filtersListing :filters="filters" />

    <Head title="Listings" />
    <h1>Listings - laravel-realestate</h1>

    <div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-2 lg:grid-cols-3">
        <!-- listing in listings.data -->
        <listing
            v-for="listing in listings.data"
            :key="listing.id"
            :listing="listing"
            :user="user"
        />
    </div>
    <div v-if="listings.data.length > 0" class="flex justify-center my-4">
        <PaginationList :Links="listings.links" />
    </div>
    <div>
        <h1>Listing - public_html</h1>
        {{ listings }}
    </div>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
import listing from "@/Pages/Listing/Index/Components/listing.vue";
import PaginationList from "@/Components/UI/PaginationList.vue";
import filtersListing from "@/Pages/Listing/Index/Components/filtersListing.vue";

const props = defineProps({
    listings: {
        type: Object,
    },
    filters: {
        type: Object,
    },
    user: {
        type: Object,
    },
});
</script>

<style></style>
