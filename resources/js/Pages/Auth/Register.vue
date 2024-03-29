<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputText from 'primevue/inputtext';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Card from 'primevue/card';
import { ref } from 'vue';
const currentStep = ref(1);
const form = useForm({
    user_type: '',
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

function nextStep(selectedRole) {
    console.log(selectedRole);
    form.user_type = selectedRole;
    currentStep.value = 2;
}
</script>

<template>
    <GuestLayout>
        <Head title="Register" />
        <h1 class="text-xl">Register</h1>
        <form @submit.prevent="submit">
            <div class="flex flex-col text-center" v-if="currentStep === 1">
                <h1 class="text-2xl">I am a</h1>
                <div class="flex justify-center mt-4">
                    <button class="hover:bg-slate-100 me-2 cursor-pointer transition-colors duration-200" type="button" @click="nextStep('student')">
                        <Card class="p-2">
                            <template #title> Student </template>
                            <template #content>
                                <img class="p-2" :src="'/icons/student.svg'" alt="professor icon">
                            </template>
                        </Card>
                    </button>
                    <button class="hover:bg-slate-100 cursor-pointer transition-colors duration-200" type="button" @click="nextStep('student')">
                        <Card class="p-2">
                            <template #title> Professor </template>
                            <template #content>
                                <img class="p-2" :src="'/icons/professor.svg'" alt="professor icon">
                            </template>
                        </Card>
                    </button>
                </div>
            </div>
            <div v-else>
                <div class="flex">
                    <div class="me-2">
                        <InputText class="w-full mt-3 mb-2" placeholder="First Name" type="text" id="first_name" v-model="form.first_name"
                            required autofocus />
                        <InputError class="mt-2" :message="form.errors.first_name" />
                    </div>
                    <div>
                        <InputText class="w-full mt-3 mb-2" placeholder="Last Name" type="text" id="last_name" v-model="form.last_name"
                            required autofocus />
                        <InputError class="mt-2" :message="form.errors.last_name" />
                    </div>
                </div>
                <div>
                    <InputText class="w-full mt-3 mb-2" placeholder="Email" type="email" id="email" v-model="form.email"
                        required autofocus />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <div>
                    <InputText class="w-full my-2" placeholder="Password" type="password" id="password" v-model="form.password"
                        required autofocus />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>
                <div>
                    <InputText class="w-full my-2" placeholder="Confirm Password" type="password" id="password_confirmation" v-model="form.password_confirmation"
                        required autofocus />
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                    <Link :href="route('login')"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Already registered?
                    </Link>
                </div>
                <div class="mt-4 flex justify-between">
                    <SecondaryButton @click="currentStep=1">
                        Previous
                    </SecondaryButton>
                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Register
                    </PrimaryButton>
                </div>
            </div>
        </form>
    </GuestLayout>
</template>