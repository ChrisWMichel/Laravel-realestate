<template>
    <div>
        <Head title="Edit Listing" />
        <form @submit.prevent="updateListing">
            <div>
                <div>
                    <label>Beds</label>
                    <input type="text" v-model="form.beds" />

                    <InputError :message="form.errors.beds" class="mt-2" />
                </div>

                <div>
                    <label>Baths</label>
                    <input type="text" v-model="form.baths" />

                    <InputError :message="form.errors.baths" class="mt-2" />
                </div>

                <div>
                    <label>Area</label>
                    <input type="text" v-model="form.area" />

                    <InputError :message="form.errors.area" class="mt-2" />
                </div>

                <div>
                    <label>City</label>
                    <input type="text" v-model="form.city" />

                    <InputError :message="form.errors.city" class="mt-2" />
                </div>

                <div>
                    <label>Area Code</label>
                    <input type="text" v-model="form.area_code" />

                    <InputError :message="form.errors.area_code" class="mt-2" />
                </div>

                <div>
                    <label>Street</label>
                    <input type="text" v-model="form.street" />

                    <InputError :message="form.errors.street" class="mt-2" />
                </div>

                <div>
                    <label>Address</label>
                    <input type="text" v-model="form.street_nr" />

                    <InputError :message="form.errors.street_nr" class="mt-2" />
                </div>

                <div>
                    <label>Price</label>
                    <input type="text" v-model="form.price" />

                    <InputError :message="form.errors.price" class="mt-2" />
                </div>

                <div class="mt-4">
                    <button type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import InputError from "@/Components/InputError.vue";
import { Head, useForm } from "@inertiajs/vue3";

const props = defineProps({
    listing: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    beds: props.listing.beds,
    baths: props.listing.baths,
    area: props.listing.area,
    city: props.listing.city,
    area_code: props.listing.area_code,
    street: props.listing.street,
    street_nr: props.listing.street_nr,
    price: props.listing.price,
});

const updateListing = () => form.put(`/listing/${props.listing.id}`);
</script>

<style></style>
