<template>
    <div>
        <Head title="Create Listing" />
        <form @submit.prevent="create">
            <!-- <input type="hidden" name="_token" :value="csrfToken" /> -->
            <div class="grid grid-cols-1 gap-4 md:grid-cols-4 lg:grid-cols-6">
                <div class="col-span-2">
                    <label class="label-style">Beds</label>
                    <input
                        type="text"
                        class="input-style"
                        v-model="form.beds"
                    />
                    <InputError
                        :message="form.errors.beds"
                        class="mt-2 text-red-500"
                    />
                </div>

                <div class="col-span-2">
                    <label class="label-style">Baths</label>
                    <input
                        type="text"
                        class="input-style"
                        v-model="form.baths"
                    />
                    <InputError
                        :message="form.errors.baths"
                        class="mt-2 text-red-500"
                    />
                </div>

                <div class="col-span-2">
                    <label class="label-style">Sqft</label>
                    <input
                        type="text"
                        class="input-style"
                        v-model="form.area"
                    />
                    <InputError
                        :message="form.errors.area"
                        class="mt-2 text-red-500"
                    />
                </div>

                <div class="col-span-4">
                    <label class="label-style">City</label>
                    <input
                        type="text"
                        class="input-style"
                        v-model="form.city"
                    />
                    <InputError
                        :message="form.errors.city"
                        class="mt-2 text-red-500"
                    />
                </div>

                <div class="col-span-2">
                    <label class="label-style">Area Code</label>
                    <input
                        type="text"
                        class="input-style"
                        v-model="form.area_code"
                    />
                    <InputError
                        :message="form.errors.area_code"
                        class="mt-2 text-red-500"
                    />
                </div>

                <div class="col-span-4">
                    <label class="label-style">Street</label>
                    <input
                        type="text"
                        class="input-style"
                        v-model="form.street"
                    />
                    <InputError
                        :message="form.errors.street"
                        class="mt-2 text-red-500"
                    />
                </div>

                <div class="col-span-2">
                    <label class="label-style">Address</label>
                    <input
                        type="text"
                        class="input-style"
                        v-model="form.street_nr"
                    />
                    <InputError
                        :message="form.errors.street_nr"
                        class="mt-2 text-red-500"
                    />
                </div>

                <div class="col-span-6">
                    <label class="label-style">Price</label>
                    <input
                        type="text"
                        class="input-style"
                        v-model="form.price"
                    />
                    <InputError
                        :message="form.errors.price"
                        class="mt-2 text-red-500"
                    />
                </div>

                <div class="col-span-6">
                    <button type="submit" class="w-full btn-primary">
                        Create
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import { computed, onMounted, ref } from "vue";
import InputError from "@/Components/InputError.vue";

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

// const csrfToken = ref(null);
// onMounted(() => {
//     csrfToken.value = document
//         .querySelector('meta[name="csrf-token"]')
//         .getAttribute("content");
// });

const create = () => {
    //console.log(form);

    form.post(route("listing.store"), {
        onFinish: () => {
            console.log("Form submission finished");
        },
        onError: (error) => {
            console.error("Error during form submission:", error);
        },
    });
};
</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px;
}
</style>
