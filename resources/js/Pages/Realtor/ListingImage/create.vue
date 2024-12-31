<template>
    <div>
        <Head title="Upload Images" />
        <BoxShadow class="p-4">
            <div class="text-2xl font-semibold text-gray-200">
                Upload Images
            </div>
            <p class="text-gray-400">Upload images for the listing</p>
            <form @submit.prevent="upload">
                <input type="hidden" name="_token" :value="csrfToken" />

                <section class="flex items-center mt-4 space-x-4">
                    <input
                        class="font-semibold border border-gray-200 rounded-md file:px-4 file:py-2 file:border-0 file:bg-gray-100 file:rounded-md file:cursor-pointer file:hover:bg-gray-200 file:hover:cursor-pointer"
                        type="file"
                        required
                        multiple
                        @input="addFiles"
                    />

                    <button
                        type="submit"
                        :disabled="!canUpload"
                        class="btn-outline disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        Upload
                    </button>
                    <button type="reset" @click="reset" class="btn-outline">
                        Reset
                    </button>
                </section>
                <!-- Display Errors -->
                <div
                    v-if="imageErrors.length > 0"
                    class="mt-2 text-red-500 input-error"
                >
                    <div v-for="(error, index) in imageErrors" :key="index">
                        {{ error }}
                    </div>
                </div>
            </form>
        </BoxShadow>

        <BoxShadow v-if="listing.images.length > 0" class="p-4 mt-4">
            <template #header>Current Listing Images</template>
            <section class="grid grid-cols-3 gap-4 mt-4">
                <div
                    v-for="(image, index) in listing.images"
                    :key="index"
                    class="relative flex flex-col justify-between"
                >
                    <img
                        :src="image.path"
                        alt="Listing Image"
                        class="object-cover w-full h-40 rounded-md"
                    />
                    <Link
                        :href="
                            route('realtor.listing.image.destroy', [
                                listing.id,
                                image.id,
                            ])
                        "
                        method="delete"
                        as="button"
                        class="absolute p-1 text-white bg-red-500 rounded-md top-2 right-2"
                    >
                        Delete
                    </Link>
                </div>
            </section>
        </BoxShadow>
    </div>
</template>

<script setup>
import BoxShadow from "@/Components/UI/BoxShadow.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";
import NProgress from "nprogress";

const props = defineProps({
    listing: {
        type: Object,
    },
});

Inertia.on("progress", (event) => {
    if (event.detail.progress.percentage) {
        NProgress.set((event.detail.progress.percentage / 100) * 0.9);
    }
});
const page = usePage();

const csrfToken = computed(() => page.props.csrf);
const form = useForm({
    images: [],
});

const upload = () => {
    form.post(route("realtor.listing.image.store", props.listing.id)),
        {
            onSuccess: () => {
                form.reset();
            },
        };
};
const canUpload = computed(() => form.images.length > 0);
const addFiles = (e) => {
    form.images = e.target.files;
    // for(const image of e.target.files) {
    //     form.images.push(image);
    // }
};
const imageErrors = computed(() => {
    return Object.values(form.errors);
});
const reset = () => {
    form.reset();
};

// const deleteImage = (id) => {
//     if (confirm("Are you sure you want to delete this image?")) {
//         Inertia.delete(
//             route("realtor.listing.image.destroy", [props.listing.id, id])
//         );
//     }
// };
</script>

<style></style>
