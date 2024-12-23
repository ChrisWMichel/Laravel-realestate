<template>
    <div>
        <Head title="Listings" />

        <div>
            <ul>
                <li v-for="listing in listings" :key="listing.id" class="my-4">
                    <Link :href="route('listing.show', listing.id)">
                        <span class="font-extrabold">{{ listing.city }}</span>
                        <ListingAddress :listing="listing" />
                    </Link>
                </li>
            </ul>
        </div>
        <div class="ml-6">
            <Link class="ml-6" :href="route('listing.create')">Create</Link>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { Head, Link, usePage } from "@inertiajs/vue3";
import ListingAddress from "@/Components/ListingAddress.vue";

defineProps({
    listings: {
        type: Array,
    },
});
</script>

<style></style>
