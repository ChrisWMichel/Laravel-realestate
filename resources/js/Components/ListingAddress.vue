<template>
    <span>
        {{ listing.street }} {{ listing.street_nr }} for ${{ listing.price }}
    </span>
</template>

<script setup>
defineProps({
    listing: {
        type: Object,
    },
});
</script>
