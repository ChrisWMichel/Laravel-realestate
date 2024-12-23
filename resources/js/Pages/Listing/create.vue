<template>
    <div>
        <Head title="Create Listing" />
        <form @submit.prevent="create">
            <div>
                <div>
                    <label>Beds</label>
                    <input type="text" v-model="form.beds" />
                    <span v-if="errors.beds" class="text-red-500">{{
                        errors.beds
                    }}</span>
                </div>

                <div>
                    <label>Baths</label>
                    <input type="text" v-model="form.baths" />
                    <span v-if="errors.baths" class="text-red-500">{{
                        errors.baths
                    }}</span>
                </div>

                <div>
                    <label>Area</label>
                    <input type="text" v-model="form.area" />
                    <span v-if="errors.baths" class="text-red-500">{{
                        errors.area
                    }}</span>
                </div>

                <div>
                    <label>City</label>
                    <input type="text" v-model="form.city" />
                    <span v-if="errors.baths" class="text-red-500">{{
                        errors.city
                    }}</span>
                </div>

                <div>
                    <label>Area Code</label>
                    <input type="text" v-model="form.area_code" />
                    <span v-if="errors.baths" class="text-red-500">{{
                        errors.area_code
                    }}</span>
                </div>

                <div>
                    <label>Street</label>
                    <input type="text" v-model="form.street" />
                    <span v-if="errors.baths" class="text-red-500">{{
                        errors.street
                    }}</span>
                </div>

                <div>
                    <label>Address</label>
                    <input type="text" v-model="form.street_nr" />
                    <span v-if="errors.baths" class="text-red-500">{{
                        errors.street_nr
                    }}</span>
                </div>

                <div>
                    <label>Price</label>
                    <input type="text" v-model="form.price" />
                    <span v-if="errors.baths" class="text-red-500">{{
                        errors.price
                    }}</span>
                </div>

                <div class="mt-4">
                    <button type="submit">Create</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import { computed } from "vue";

const form = useForm({
    beds: "",
    baths: "",
    area: "",
    city: "",
    area_code: "",
    street: "",
    street_nr: "",
    price: "",
});
const errors = computed(() => form.errors);

const create = () => {
    form.post("/listing");
};
</script>

<style>
label {
    margin-right: 2em;
}

div {
    padding: 2px;
}
</style>
