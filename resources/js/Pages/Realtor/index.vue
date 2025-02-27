<template>
    <div>
        <Head title="Resource" />

        <h1 class="mb-4 text-3xl font-bold">Your Listings</h1>
        <section>
            <realtorFilters :filters="filters" />
        </section>
        <section
            v-if="listings.data.length > 0"
            class="grid grid-cols-1 gap-4 lg:grid-cols-2"
        >
            <BoxShadow
                v-for="listing in listings.data"
                :key="listing.id"
                :class="{ 'border-dashed': listing.deleted_at }"
            >
                <div
                    class="flex flex-col items-center justify-between gap-2 md:flex-row"
                >
                    <div :class="{ 'opacity-50': listing.deleted_at }">
                        <div
                            class="inline-block p-1 mb-2 text-xs font-bold text-green-500 uppercase border border-green-300 border-dashed rounded-md"
                            v-if="listing.sold_at"
                        >
                            sold
                        </div>
                        <div
                            class="items-center gap-2 text-xl font-bold xl:flex"
                        >
                            <ListingPrice
                                :price="listing.price"
                                class="text-2xl font-medium"
                            />
                        </div>
                        <ListingAttribute :listings="listing" />
                        <ListingAddress
                            :listing="listing"
                            class="text-gray-400"
                        />
                    </div>
                    <section>
                        <div class="flex items-center gap-4">
                            <a
                                target="_blank"
                                :href="route('listing.show', listing.id)"
                                class="text-gray-400 hover:text-gray-100 btn-outline"
                            >
                                Preview
                            </a>
                            <Link
                                v-if="!listing.sold_at"
                                :href="
                                    route('realtor.listing.edit', listing.id)
                                "
                                class="text-green-700 hover:text-green-400 btn-outline"
                            >
                                Edit
                            </Link>
                            <Link
                                v-if="!listing.deleted_at"
                                :href="
                                    route('realtor.listing.destroy', listing.id)
                                "
                                as="button"
                                method="delete"
                                class="text-red-700 hover:text-red-400 btn-outline"
                            >
                                Delete
                            </Link>
                            <Link
                                v-else
                                :href="
                                    route('realtor.listing.restore', listing.id)
                                "
                                as="button"
                                method="put"
                                class="text-yellow-500 hover:text-yellow-300 btn-outline"
                                >Restore</Link
                            >
                        </div>
                        <div class="mt-4">
                            <Link
                                class="block w-full text-center text-blue-500 hover:text-blue-200 btn-outline"
                                :href="
                                    route(
                                        'realtor.listing.image.create',
                                        listing.id
                                    )
                                "
                            >
                                ({{ listing.images_count || 0 }}) Images
                            </Link>
                        </div>
                        <div class="mt-4">
                            <Link
                                class="block w-full text-center text-blue-500 hover:text-blue-200 btn-outline"
                                :href="
                                    route('realtor.listing.show', listing.id)
                                "
                            >
                                ({{ listing.offers_count || 0 }}) Offers
                            </Link>
                        </div>
                    </section>
                </div>
            </BoxShadow>
        </section>
        <EmptyState v-else>
            You have no listings. Create a new listing by clicking the 'New
            Listing' button.
        </EmptyState>
        <section
            v-if="listings.data.length > 0"
            class="flex justify-center w-full my-4"
        >
            <PaginationList :Links="listings.links" />
        </section>
    </div>
</template>

<script setup>
import BoxShadow from "@/Components/UI/BoxShadow.vue";
import ListingAddress from "@/Components/UI/ListingAddress.vue";
import ListingAttribute from "@/Components/UI/ListingAttribute.vue";
import ListingPrice from "@/Components/UI/ListingPrice.vue";
import realtorFilters from "@/Pages/Realtor/Index/Components/realtorFilters.vue";
import PaginationList from "@/Components/UI/PaginationList.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import EmptyState from "@/Components/UI/emptyState.vue";

const props = defineProps({
    user: {
        type: Object,
    },
    listings: {
        type: Object,
    },
    filters: {
        type: Object,
    },
});
</script>

<style></style>
