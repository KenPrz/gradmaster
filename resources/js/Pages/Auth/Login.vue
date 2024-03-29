<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Checkbox from '@/Components/Checkbox.vue';
import InputText from 'primevue/inputtext';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <h1 class="text-xl">Log in</h1>
        <form @submit.prevent="submit">
            <div>
                <InputText class="w-full mt-3 mb-2" placeholder="Email" type="email" id="email" v-model="form.email"
                    required autofocus />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>
            <div>
                <InputText class="w-full my-2" placeholder="Password" type="password" id="password" v-model="form.password"
                    required autofocus />
                <InputError class="mt-2" :message="form.errors.email" />
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="mt-4 flex justify-between">
                <Link v-if="canResetPassword" :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Forgot your password?
                </Link>
                <PrimaryButton class="mx-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>