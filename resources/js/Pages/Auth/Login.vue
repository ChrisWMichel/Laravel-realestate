<template>
    <div>
        <Head title="Login" />
        <form @submit.prevent="login">
            <div class="w-1/2 mx-auto">
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
                </div>
                <div>
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
                <div class="mt-4">
                    <button type="submit" class="w-full btn-primary">
                        Login
                    </button>
                    <div class="mt-4 text-center">
                        <Link
                            class="text-blue-400 hover:text-blue-500"
                            :href="route('user-account.create')"
                            >Create Account</Link
                        >
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
//import { computed } from "vue";
import { Head, useForm, usePage, Link } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";

const form = useForm({
    email: null,
    password: null,
});

const page = usePage();

const login = () => {
    form.post(route("login.store"));
};
</script>

<style></style>
