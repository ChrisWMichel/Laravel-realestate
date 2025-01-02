<template>
    <div>
        <Head :title="listing.city" />

        <div class="flex flex-col gap-4 md:grid md:grid-cols-12">
            <div class="flex flex-col gap-4 md:col-span-5">
                <BoxShadow>
                    <template #header>
                        <h1 class="text-2xl font-bold">Basic info</h1>
                    </template>
                    <ListingPrice
                        :price="listing.price"
                        class="text-2xl font-bold"
                    />
                    <ListingAttribute :listings="listing" />
                    <ListingAddress :listing="listing" class="text-gray-500" />
                </BoxShadow>
                <BoxShadow>
                    <template #header> Monthly Payment </template>
                    <div>
                        <label class="label-style"
                            >Interest Rate ({{ intrestRate }}%)</label
                        >
                        <input
                            v-model.number="intrestRate"
                            type="range"
                            class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-500"
                            min="0.1"
                            max="30"
                            step="0.1"
                        />
                        <label class="label-style"
                            >Duration ({{ duration }} years)</label
                        >
                        <input
                            v-model.number="duration"
                            type="range"
                            class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-500"
                            min="5"
                            max="35"
                            step="5"
                        />
                    </div>
                    <div class="mt-2 text-gray-600 dark:text-gray-400">
                        <div class="text-gray-400">Your monthly payment</div>
                        <ListingPrice
                            :price="monthlyPayment"
                            class="text-2xl font-bold"
                        />
                    </div>
                    <div class="mt-2 text-gray-400">
                        <div class="flex justify-between">
                            <div>Total Paid</div>
                            <ListingPrice
                                :price="totalPaid"
                                class="text-2xl font-bold"
                            />
                        </div>
                        <div class="flex justify-between">
                            <div>Principal Paid</div>
                            <ListingPrice
                                :price="listing.price"
                                class="text-2xl font-bold"
                            />
                        </div>
                        <div class="flex justify-between">
                            <div>Total Interest</div>
                            <ListingPrice
                                :price="totalInterest"
                                class="text-2xl font-bold"
                            />
                        </div>
                    </div>
                </BoxShadow>

                <MakeOffer
                    v-if="user && !offerMade"
                    @offer-updated="offer = $event"
                    :price="listing.price"
                    :listingId="listing.id"
                />
                <OfferMade v-if="user && offerMade" :offerMade="offerMade" />
            </div>
            <BoxShadow
                v-if="listing.images.length > 0"
                class="flex items-center w-full md:col-span-7"
            >
                <div class="grid w-full grid-cols-1 gap-1 md:grid-cols-2">
                    <img
                        v-for="(image, index) in listing.images"
                        :key="index"
                        :src="image.path"
                        :alt="listing.city"
                        class="object-cover w-full h-96"
                    />
                </div>
            </BoxShadow>
            <EmptyState v-else class="flex items-center w-full md:col-span-7">
                No images available
            </EmptyState>
        </div>
    </div>
</template>

<script setup>
import BoxShadow from "@/Components/UI/BoxShadow.vue";
import ListingAddress from "@/Components/UI/ListingAddress.vue";
import ListingAttribute from "@/Components/UI/ListingAttribute.vue";
import ListingPrice from "@/Components/UI/ListingPrice.vue";
import MakeOffer from "@/Pages/Listing/Show/Components/makeOffer.vue";
import OfferMade from "@/Pages/Listing/Show/Components/offerMade.vue";
import { Head, usePage } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import { useMonthlyPayment } from "@/Composables/useMonthlyPayment";
import EmptyState from "@/Components/UI/emptyState.vue";

const intrestRate = ref(2.5);
const duration = ref(25);

const props = defineProps({
    listing: {
        type: Object,
    },
    offerMade: {
        type: Object,
    },
});
const offer = ref(props.listing.price);

const { monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(
    offer,
    intrestRate,
    duration
);

// TODO: Comment out the following code for production. Remove 'user' from the v-if in the MakeOffer component
const page = usePage();
const user = computed(() => page.props?.auth?.user || null);
</script>

<style></style>
