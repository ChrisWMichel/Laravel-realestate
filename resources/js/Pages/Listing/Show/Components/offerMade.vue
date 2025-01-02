<template>
    <div>
        <BoxShadow>
            <template #header>
                <h1 class="text-2xl font-bold">Offer Made</h1>
            </template>
            <ListingPrice
                :price="offerMade.amount"
                class="text-3xl font-bold"
            />
            <section
                class="flex flex-col items-center justify-between gap-4 mt-2 text-gray-500 md:flex-row"
            >
                <div>Offer Date</div>
                <div class="font-medium">{{ offerMadeOn }}</div>
            </section>
        </BoxShadow>
    </div>
</template>

<script lang="ts" setup>
import BoxShadow from "@/Components/UI/BoxShadow.vue";
import ListingPrice from "@/Components/UI/ListingPrice.vue";
import { computed } from "vue";

const props = defineProps({
    offerMade: Object,
});

const offerMadeOn = computed(() => {
    return new Date(props.offerMade.created_at).toLocaleDateString();
});
</script>

<style></style>
