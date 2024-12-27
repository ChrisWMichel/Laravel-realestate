<template>
    <div>
        <Head title="Welcome" />

        <div class="container mx-auto">
            <h1 class="text-center">Index Page</h1>
        </div>
        <Link :href="route('hello')">Show Page</Link>
    </div>
</template>
<script setup>
import { Head, Link } from "@inertiajs/vue3";

// defineProps({
//     canLogin: {
//         type: Boolean,
//     },
//     canRegister: {
//         type: Boolean,
//     },
//     laravelVersion: {
//         type: String,
//         required: true,
//     },
//     phpVersion: {
//         type: String,
//         required: true,
//     },
// });
</script>
