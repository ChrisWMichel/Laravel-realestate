<template>
    <div>
        <Head title="Welcome" />
        <BoxShadow>
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-400">
                    Welcome to my app!
                </h1>
                <h1 class="text-3xl font-bold text-gray-400">
                    Welcome to my app!
                </h1>
                <p class="text-gray-200">
                    Laravel version is {{ laravelVersion }} and PHP version is
                    {{ phpVersion }}.
                </p>
            </div>
        </BoxShadow>
        <BoxShadow class="mt-4">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-400">
                    What is this app?
                </h2>
                <p class="text-gray-200">
                    This is a simple Laravel app with Inertia.js and Vue 3.
                </p>
            </div>
            <div class="mb-4 text-lg text-center text-gray-100">
                Here are some steps to take to experience all the functionality
                of this app:
            </div>
            <h2 class="text-2xl font-bold text-gray-400">First Step</h2>
            <ul class="text-lg text-gray-100 list-disc list-inside">
                <li class="mt-2">
                    Register a new account. It's important that you use a real
                    email address.
                </li>
                <li class="mt-2">
                    You will be notified to check your email. Do so, and click
                    the link.
                </li>
                <li class="mt-2">
                    You're logged in! Now, create a listing (you don't need to
                    add images).
                </li>
                <li class="mt-2">
                    You can go to 'Listings' on the menu bar to view it (it'll
                    be the first one.)
                </li>
                <li class="mt-2">
                    By clicking on your name in the menu bar, you can then edit
                    your listing.
                </li>
            </ul>
            <h2 class="mt-4 text-2xl font-bold text-gray-400">Second Step</h2>
            <ul class="text-lg text-gray-100 list-disc list-inside">
                <li class="mt-2">Log out of your account.</li>
                <li class="mt-2">
                    Log back in as another user.
                    <span class="mr-2 font-bold text-orange-500"
                        >email: andy@email.com</span
                    ><span class="font-bold text-orange-500"
                        >password: password</span
                    >
                </li>
                <li class="mt-2">
                    As Andy, find the listing that you created and click on it.
                    Make an offer!
                </li>
                <li class="mt-2">
                    Log back in as the original user and check the in-app
                    notification. Also, check your email. Accept the offer.
                </li>
            </ul>
        </BoxShadow>
    </div>
</template>
<script setup>
import BoxShadow from "@/Components/UI/BoxShadow.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>
