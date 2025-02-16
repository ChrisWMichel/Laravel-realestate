<template>
    <BoxShadow>
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
    </BoxShadow>
</template>

<script setup>
//import { computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
import ListingAddress from "@/Components/UI/ListingAddress.vue";
import BoxShadow from "@/Components/UI/BoxShadow.vue";
import ListingAttribute from "@/Components/UI/ListingAttribute.vue";
import ListingPrice from "@/Components/UI/ListingPrice.vue";
import { useMonthlyPayment } from "@/Composables/useMonthlyPayment";

const props = defineProps({
    listing: {
        type: Object,
        required: true,
    },
});
const page = usePage();
//const user = computed(() => page.props.auth.user);

const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2.5, 25);
</script>

<style></style>
