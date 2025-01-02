<template>
    <div>
        <BoxShadow class="mb-4">
            <template #header>
                <h1 class="text-2xl font-bold">
                    Offer #{{ offer.id }}
                    <span
                        v-if="offer.accepted_at"
                        class="p-1 ml-2 text-lg text-green-100 uppercase bg-green-800 rounded-md"
                        >accepted</span
                    >
                </h1>
            </template>
            <div class="flex items-center gap-4 p-4 border-b border-gray-200">
                <div class="flex items-center justify-between w-full gap-2">
                    <div class="text-xl font-bold">
                        <ListingPrice
                            :price="offer.amount"
                            class="text-2xl font-bold"
                        />
                    </div>
                    <div class="text-gray-400">
                        <span class="mr-2">Difference</span>
                        <span class="mr-2 font-medium">
                            <ListingPrice
                                :price="difference"
                                class="text-xl"
                                :class="
                                    isNegative
                                        ? 'text-red-300'
                                        : 'text-green-300'
                                "
                            />
                        </span>
                    </div>
                    <div class="text-gray-500">
                        <span>Offer Date</span>
                        <span class="ml-2 font-medium text-blue-400">{{
                            madeOn
                        }}</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between w-full gap-2">
                <div>
                    <Link
                        v-if="!isSold"
                        :href="route('realtor.offer.accept', offer.id)"
                        as="button"
                        method="put"
                        class="mt-4 font-medium text-green-500 btn-outline"
                        >Accept</Link
                    >
                </div>
                <div class="mt-2 text-sm text-gray-400">
                    Offer made by {{ offer.user.firstname }}
                    {{ offer.user.lastname }}
                </div>
                <!-- <div>
                    <Link
                        as="button"
                        class="mt-4 font-medium text-orange-500 btn-outline"
                        >Reject</Link
                    >
                </div> -->
            </div>
        </BoxShadow>
    </div>
</template>

<script setup>
import BoxShadow from "@/Components/UI/BoxShadow.vue";
import ListingPrice from "@/Components/UI/ListingPrice.vue";
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    listingPrice: Number,
    offer: Object,
    isSold: Boolean,
});
//console.log("offerMade", props.offer);
const difference = computed(() => {
    return props.offer.amount - props.listingPrice;
});

const madeOn = computed(() => {
    return new Date(props.offer.created_at).toLocaleDateString();
});
const isNegative = computed(() => difference.value < 0);
</script>

<style></style>
