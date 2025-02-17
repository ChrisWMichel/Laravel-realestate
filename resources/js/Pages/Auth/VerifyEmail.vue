<template>
    <Head title="Verification" />
    <BoxShadow>
        <h1 class="text-2xl font-bold">Verify Your Email Address</h1>
        <p class="text-2xl">
            Before proceeding, please check your email for a verification link.
            If you did not receive the email,
            <Link
                :href="route('verification.resend')"
                method="post"
                :data="{ email }"
                class="text-blue-500 underline"
            >
                click here to request another </Link
            >.
        </p>
        <div v-if="status" class="mt-4 text-green-500">
            {{ status }}
        </div>
        <div v-if="errorMessage" class="mt-4 text-red-500">
            {{ errorMessage }}
        </div>
    </BoxShadow>
</template>

<script setup>
import { ref } from "vue";
import { Head, Link, usePage } from "@inertiajs/vue3";
import BoxShadow from "@/Components/UI/BoxShadow.vue";

const page = usePage();
const status = ref(page.props.flash?.success || null);
const errorMessage = ref(page.props.flash?.error || null);

// Extract email from URL query parameters
const urlParams = new URLSearchParams(window.location.search);
const email = urlParams.get("email");

status.value = null;
errorMessage.value = null;
</script>

<style></style>
