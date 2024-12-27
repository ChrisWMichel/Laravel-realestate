<template>
    <div>
        <Head title="Register" />
        <form @submit.prevent="register">
            <div class="w-1/2 mx-auto">
                <div class="flex mb-4 space-x-4">
                    <div class="flex-1">
                        <label class="label-style" for="firstname"
                            >First name</label
                        >
                        <input
                            class="input-style"
                            type="text"
                            id="firstname"
                            v-model="form.firstname"
                        />
                        <InputError
                            :message="form.errors.firstname"
                            class="mt-2 text-red-500"
                        />
                    </div>
                    <div class="flex-1">
                        <label class="label-style" for="lastname"
                            >Last name</label
                        >
                        <input
                            class="input-style"
                            type="text"
                            id="lastname"
                            v-model="form.lastname"
                        />
                        <InputError
                            :message="form.errors.lastname"
                            class="mt-2 text-red-500"
                        />
                    </div>
                </div>
                <div class="mb-4">
                    <label class="label-style" for="email">Email</label>
                    <input
                        class="input-style"
                        type="text"
                        id="email"
                        v-model="form.email"
                    />
                    <InputError
                        :message="form.errors.email"
                        class="mt-2 text-red-500"
                    />
                    <!-- <div v-if="form.errors.email" class="input-error">
                        {{ form.errors.email }}
                    </div> -->
                </div>
                <div class="mb-4">
                    <label class="label-style" for="password">Password</label>
                    <input
                        class="input-style"
                        type="password"
                        v-model="form.password"
                    />
                    <InputError
                        :message="form.errors.password"
                        class="mt-2 text-red-500"
                    />
                </div>

                <div class="mb-4">
                    <label class="label-style" for="password"
                        >Confirm Password</label
                    >
                    <input
                        class="input-style"
                        type="password"
                        v-model="form.password_confirmation"
                    />
                    <InputError
                        :message="form.errors.password"
                        class="mt-2 text-red-500"
                    />
                </div>

                <div class="mt-4">
                    <button type="submit" class="w-full btn-primary">
                        Create Account
                    </button>
                    <div class="mt-4 text-center">
                        <Link
                            class="text-blue-400 hover:text-blue-500"
                            :href="route('login')"
                            >Already have an account? Sign In</Link
                        >
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { Head, useForm, usePage, Link } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";

const form = useForm({
    firstname: null,
    lastname: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const page = usePage();

const register = () => {
    form.post(route("user-account.store"));
};
</script>

<style></style>
