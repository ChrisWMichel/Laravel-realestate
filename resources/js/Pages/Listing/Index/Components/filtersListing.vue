<template>
    <div>
        <form @submit.prevent="filter">
            <div class="mb=8 mt-4 flex flex-wrap gap-2">
                <div class="flex items-center flex-nowrap">
                    <input
                        v-model.number="filterForm.price_from"
                        class="input-filter-l"
                        type="text"
                        placeholder="Price from"
                    />
                    <input
                        v-model.number="filterForm.price_to"
                        class="input-filter-r"
                        type="text"
                        placeholder="Price to"
                    />
                </div>
                <div class="flex items-center flex-nowrap">
                    <select
                        class="w-22 input-filter-l"
                        v-model="filterForm.beds"
                    >
                        <option :value="null">Beds</option>
                        <option v-for="i in 5" :key="i" :value="i">
                            {{ i }}
                        </option>
                        <option :value="6">6+</option>
                    </select>
                    <select
                        class="w-22 input-filter-r"
                        v-model="filterForm.baths"
                    >
                        <option :value="null">Baths</option>
                        <option v-for="i in 5" :key="i" :value="i">
                            {{ i }}
                        </option>
                        <option :value="6">6+</option>
                    </select>
                </div>
                <div class="flex items-center flex-nowrap">
                    <input
                        v-model.number="filterForm.area_from"
                        type="text"
                        class="input-filter-l"
                        placeholder="Sqft from"
                    />
                    <input
                        v-model.number="filterForm.area_to"
                        type="text"
                        class="input-filter-r"
                        placeholder="Sqft to"
                    />
                </div>
                <button type="submit" class="text-green-600 btn-normal">
                    Filter
                </button>
                <button
                    type="reset"
                    @click="clear"
                    class="hover:text-orange-300"
                >
                    Clear
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    filters: {
        type: Object,
    },
});

const filterForm = useForm({
    price_from: props.filters.price_from ?? null,
    price_to: props.filters.price_to ?? null,
    beds: props.filters.beds ?? null,
    baths: props.filters.baths ?? null,
    area_from: props.filters.area_from ?? null,
    area_to: props.filters.area_to ?? null,
});

const filter = () => {
    Inertia.visit(route("listing.index"), {
        method: "get",
        data: filterForm,
        preserveState: true,
        preserveScroll: true,
    });
};

const clear = () => {
    filterForm.price_from = null;
    filterForm.price_to = null;
    filterForm.beds = null;
    filterForm.baths = null;
    filterForm.area_from = null;
    filterForm.area_to = null;
    filter();
};
</script>
