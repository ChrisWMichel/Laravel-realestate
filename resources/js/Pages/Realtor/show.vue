<template>
    <div>
        <Head title="Offers Made" />
        <div class="mb-4">
            <Link :href="route('realtor.listing.index')">
                << Go back to listings</Link
            >
        </div>
        <section class="flex flex-col-reverse gap-4 md:grid md:grid-cols-12">
            <BoxShadow
                v-if="!hasOffers"
                class="flex items-center gap-4 md:col-span-7"
            >
                <div class="w-full font-medium text-center text-gray-400">
                    No Offers Made
                </div>
            </BoxShadow>
            <div v-else class="items-center w-full md:col-span-7">
                <make-offer
                    v-for="(offer, index) in listing.offers"
                    :key="index"
                    :offer="offer"
                    :listing-price="listing.price"
                    :is-sold="listing.sold_at !== null"
                />
                <span class="text-lg text-gray-400"
                    >Sorry, 'accepting' an offer is not working right now.</span
                >
            </div>
            <div class="md:col-span-5">
                <BoxShadow>
                    <template #header>
                        <h1 class="text-2xl font-bold">Listing Details</h1>
                    </template>

                    <ListingPrice
                        :price="listing.price"
                        class="text-2xl font-bold"
                    />

                    <ListingAttribute :listings="listing" class="text-lg" />

                    <ListingAddress :listing="listing" class="text-gray-500" />
                </BoxShadow>
            </div>
        </section>
    </div>
</template>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import BoxShadow from "@/Components/UI/BoxShadow.vue";
import makeOffer from "@/Pages/Realtor/Show/Components/makeOffer.vue";
import ListingPrice from "@/Components/UI/ListingPrice.vue";
import ListingAttribute from "@/Components/UI/ListingAttribute.vue";
import ListingAddress from "@/Components/UI/ListingAddress.vue";
import { computed } from "vue";

const props = defineProps({
    listing: Object,
    user: Object,
});
//console.log("listing", props.listing);

const hasOffers = computed(() => {
    return props.listing.offers.length > 0;
});
</script>

<style></style>
