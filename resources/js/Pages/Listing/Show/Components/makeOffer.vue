<template>
    <div>
        <BoxShadow>
            <template #header>
                <h1 class="text-2xl font-bold">Make Offer</h1>
            </template>
            <div>
                <form @submit.prevent="makeOffer">
                    <input
                        v-model.number="form.amount"
                        type="text"
                        class="w-full p-2 text-gray-600 border border-gray-600 rounded-lg"
                        placeholder="Enter your offer"
                    />
                    <input
                        v-model.number="form.amount"
                        type="range"
                        class="w-full h-4 mt-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-500"
                        :min="min"
                        :max="max"
                        step="10000"
                    />
                    <button
                        type="submit"
                        class="w-full p-2 mt-2 text-white bg-blue-500 rounded-lg"
                    >
                        Make Offer
                    </button>
                </form>
            </div>
            <div class="flex justify-between mt-2 text-gray-500">
                <div>Difference</div>
                <div>
                    <ListingPrice
                        :price="difference"
                        class="text-2xl font-bold"
                    />
                </div>
            </div>
        </BoxShadow>
    </div>
</template>

<script setup>
import BoxShadow from "@/Components/UI/BoxShadow.vue";
import ListingPrice from "@/Components/UI/ListingPrice.vue";
import { useForm } from "@inertiajs/vue3";
import { debounce } from "lodash";
import { computed, watch } from "vue";

const props = defineProps({
    listingId: Number,
    price: Number,
});

const form = useForm({
    amount: props.price,
});

const makeOffer = () =>
    form.post(route("listing.offer.store", { listing: props.listingId }), {
        preserveScroll: true,
        preserveState: true,
    });

const difference = computed(() => form.amount - props.price);
const min = computed(() => Math.round(props.price / 2));
const max = computed(() => Math.round(props.price * 2));

const emit = defineEmits(["offerUpdated"]);

watch(
    () => form.amount,
    debounce((value) => {
        emit("offerUpdated", value);
    }, 1000)
);
</script>

<style></style>
