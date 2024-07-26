<template>
<AuthenticatedLayout>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <div v-for="product in products" :key="product.id" class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <img class="w-full h-48 object-cover" :src="product.image" alt="">
            <div class="p-4">
                <h2 class="text-lg font-bold">{{ product.name }}</h2>
                <p class="text-gray-600 mt-2">{{ product.description }}</p>
                <p class="text-gray-600 mt-2">{{ product.price }} €</p>
                <Link class="inline-block bg-blue-500 text-white font-bold py-2 px-4 rounded mt-4">View Details</Link>
            </div>
        </div>


    </div>
</AuthenticatedLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
defineProps({ products: Object });

</script>

<style>

</style>
