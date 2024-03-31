<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Carousel from 'primevue/carousel';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
        <Head title="Welcome" />
        <nav class="shadow-md text-primary text-lg font-semibold bg-accent py-2 px-10 flex" v-if="canLogin">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')">
                Dashboard
            </Link>
            <template v-else>
                <div class="w-full flex justify-between items-center">
                    <div>
                        <Link href="/">
                            <ApplicationLogo />
                        </Link>
                    </div>
                    <div>
                        <Link class="me-5" :href="route('login')">
                            <span class="hover:text-dark transition-colors duration-300">Log in</span>
                        </Link>
                        <Link v-if="canRegister" :href="route('register')">
                            <span class="hover:text-dark transition-colors duration-300">Register</span>
                        </Link>
                    </div>
                </div>
            </template>
        </nav>
        <main class="mx-10 flex flex-col justify-center items-center">
            <div class="flex mx-20">
                <section class="w-1/2 flex flex-col">
                    <h1 class="text-5xl font-bold">Welcome to GradMaster</h1>
                    <p class="text-md">GradMaster is a web-based thesis management system designed to streamline the
                        process of
                        managing student
                        theses for professors. This application provides a centralized platform for professors to
                        efficiently
                        supervise, track progress, and evaluate theses of their students.</p>
                </section>
                <section class="w-1/2 flex flex-col">
                    <img src="/img/gradmaster.png" alt="GradMaster" class="w-96 h-96" />
                </section>
            </div>
        </main>
</template>