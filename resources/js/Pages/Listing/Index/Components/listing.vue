<template>
    <div>
        <BoxShadow class="my-2">
            <Link :href="route('listing.show', listing.id)">
                <div class="flex justify-between">
                    <ListingPrice
                        :price="listing.price"
                        class="text-2xl font-bold"
                    />
                    <div class="text-xs text-gray-500">
                        <ListingPrice :price="monthlyPayment" /> / month
                    </div>
                </div>
                <ListingAttribute :listings="listing" />
                <ListingAddress :listing="listing" class="text-gray-500" />
            </Link>

            <div>
                <Link :href="route('listing.edit', listing.id)">Edit</Link>
                <Link
                    :href="route('listing.destroy', listing.id)"
                    method="DELETE"
                    >Delete</Link
                >
            </div>
        </BoxShadow>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import ListingAddress from "@/Components/UI/ListingAddress.vue";
import BoxShadow from "@/Components/UI/BoxShadow.vue";
import ListingAttribute from "@/Components/UI/ListingAttribute.vue";
import ListingPrice from "@/Components/UI/ListingPrice.vue";
import { useMonthlyPayment } from "@/Composables/useMonthlyPayment";

const props = defineProps({
    listing: {
        type: Object,
    },
});

const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2.5, 25);
</script>

<style></style>
