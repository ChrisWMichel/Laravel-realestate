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

            <div
                v-if="user && user.id == listing.by_user_id"
                class="flex justify-between gap-4 mt-4"
            >
                <!-- <Link
                    class="p-1 px-4 py-2 text-blue-700 hover:text-blue-500"
                    :href="route('listing.edit', listing.id)"
                    >Edit</Link
                > -->
                <!-- <Link
                    class="p-1 px-4 py-2 text-red-700 hover:text-red-500"
                    :href="route('listing.destroy', listing.id)"
                    method="DELETE"
                    >Delete</Link
                > -->
            </div>
        </BoxShadow>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
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
const page = usePage();
const user = computed(() => page.props.auth.user);

const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2.5, 25);
</script>

<style></style>
