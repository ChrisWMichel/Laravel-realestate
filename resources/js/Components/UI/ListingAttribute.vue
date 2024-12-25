<template>
    <div>
        <span class="text-lg font-bold">
            {{ listings.beds }} bds <span class="text-gray-400">|</span>&nbsp;
            {{ listings.baths }} ba <span class="text-gray-400">|</span>&nbsp;
            {{ listings.area }} sqft
        </span>
    </div>
</template>

<script setup>
defineProps({
    listings: {
        type: Object,
    },
});
</script>

<style></style>
