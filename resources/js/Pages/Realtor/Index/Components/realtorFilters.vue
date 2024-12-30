<template>
    <form>
        <div class="flex flex-wrap gap-4 my-8">
            <div class="flex items-center gap-2 flex-nowrap">
                <input
                    v-model="filterForm.deleted"
                    id="deleted"
                    type="checkbox"
                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                />
                <label for="deleted">Deleted</label>
            </div>
            <div>
                <select class="w-24 input-filter-l" v-model="filterForm.by">
                    <option value="created_at">Created</option>
                    <option value="price">Price</option>
                </select>
                <select class="w-32 input-filter-r" v-model="filterForm.order">
                    <option
                        v-for="(option, index) in sortOptions"
                        :key="index"
                        :value="option.value"
                    >
                        {{ option.label }}
                    </option>
                </select>
            </div>
        </div>
    </form>
</template>

<script lang="ts" setup>
import { reactive, watch, computed } from "vue";
import { router } from "@inertiajs/vue3";
import { debounce } from "lodash";

const props = defineProps({
    filters: {
        type: Object,
    },
});

const sortLabels = {
    created_at: [
        { label: "Ascending", value: "asc" },
        { label: "Descending", value: "desc" },
    ],
    price: [
        { label: "Ascending", value: "asc" },
        { label: "Descending", value: "desc" },
    ],
};

const sortOptions = computed(() => {
    return sortLabels[filterForm.by];
});

const filterForm = reactive({
    deleted: props.filters.deleted ?? false,
    by: props.filters.by ?? "created_at",
    order: props.filters.order ?? "desc",
});

watch(
    filterForm,
    debounce(() => {
        router.get(route("realtor.listing.index"), filterForm, {
            preserveState: true,
            preserveScroll: true,
        });
    }, 1000)
);
</script>

<style></style>
