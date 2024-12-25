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
            </div>
            <BoxShadow class="flex items-center w-full md:col-span-7">
                <div class="w-full font-medium text-center text-gray-500">
                    no images
                    <!-- <img
                    :src="listing.image"
                    :alt="listing.city"
                    class="object-cover w-full h-96"
                /> -->
                </div>
            </BoxShadow>
        </div>
    </div>
</template>

<script setup>
import BoxShadow from "@/Components/UI/BoxShadow.vue";
import ListingAddress from "@/Components/UI/ListingAddress.vue";
import ListingAttribute from "@/Components/UI/ListingAttribute.vue";
import ListingPrice from "@/Components/UI/ListingPrice.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";
import { useMonthlyPayment } from "@/Composables/useMonthlyPayment";

const intrestRate = ref(2.5);
const duration = ref(25);

const props = defineProps({
    listing: {
        type: Object,
    },
});
const { monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(
    props.listing.price,
    intrestRate,
    duration
);
</script>

<style></style>
