<template>
    <div>
        <Head title="Show" />

        <div class="container">
            <h1>Show Page</h1>
        </div>
        <Link :href="route('index')">Home Page</Link>
    </div>
</template>

<script lang="ts" setup>
import { Head, Link } from "@inertiajs/vue3";
</script>

<style></style>
