<template>
    <div>
        <Head title="Home" />

        <div class="container">
            <h1>Show Page</h1>
        </div>
        <Link :href="route('home')">Home Page</Link>
    </div>
</template>

<script lang="ts" setup>
import { Head, Link } from "@inertiajs/vue3";
</script>

<style></style>
