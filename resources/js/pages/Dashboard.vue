<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const props = defineProps<{
    products: Array<{
        id: number
        name: string
        price: number
        image?: string
        image_url?: string
    }>
}>()


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div
                    v-for="product in products"
                    :key="product.id"
                    class="relative rounded-xl border border-sidebar-border/70 dark:border-sidebar-border p-4"
                >
                    <!-- If you have an image_url accessor: -->
                    <img
                        v-if="product.image_url"
                        :src="product.image_url"
                        alt="Product image"
                        class="mb-2 h-32 w-full object-cover"
                    />
                    <h3 class="font-semibold">{{ product.name }}</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        ${{ product.price }}
                    </p>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
