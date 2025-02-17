<template>
    <div>
        <Head title="Notifcations" />
        <h1 class="mb-4 text-3xl font-bold">Your Notifications</h1>

        <section v-if="notifications.data.length > 0" class="test-gray-700">
            <div
                v-for="notification in notifications.data"
                :key="notification.id"
                class="flex items-center justify-between py-4 border-b border-gray-200"
            >
                <div class="flex items-center gap-4">
                    <!-- {{ notification }} -->
                    <span
                        v-if="
                            notification.type ===
                            'App\\Notifications\\OfferMade'
                        "
                    >
                        Offer of
                        <ListingPrice :price="notification.data.offer_amount" />
                        was made on {{ formatDate(notification.created_at) }} by
                        {{ notification.data.user_firstname }}
                        {{ notification.data.user_lastname }}.
                        <Link
                            :href="
                                route(
                                    'realtor.listing.show',
                                    notification.data.listing_id
                                )
                            "
                            class="ml-4 text-indigo-600 hover:text-indigo-400"
                            >View Listing</Link
                        >
                    </span>
                </div>
                <div>
                    <Link
                        :href="route('notification.seen', notification.id)"
                        v-if="!notification.read_at"
                        class="text-xs font-medium uppercase btn-outline"
                        as="button"
                        method="put"
                    >
                        Mark as Read
                    </Link>
                </div>
            </div>
        </section>
        <emptyState v-else> No notifications available </emptyState>

        <section
            v-if="notifications.data.length > 0"
            class="flex justify-center w-full my-8 text-gray-700"
        >
            <PaginationList :Links="notifications.links" />
        </section>
    </div>
</template>

<script setup>
import ListingPrice from "@/Components/UI/ListingPrice.vue";
import PaginationList from "@/Components/UI/PaginationList.vue";
import emptyState from "@/Components/UI/emptyState.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    notifications: Object,
});

const formatDate = (date) => {
    return new Date(date).toLocaleDateString();
};
</script>

<style></style>
