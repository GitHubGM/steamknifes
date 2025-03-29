<template>
    <AppLayout>
    <div>
        <h1>All Products</h1>
        <div v-for="product in products" :key="product.id">
            <!-- Use Inertia's <Link> to navigate to the Show page -->
            <Link :href="route('products.show', product.id)">
                {{ product.name }}
            </Link>
        </div>
    </div>
    </AppLayout>
</template>

<script>
import { Link, usePage } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';

export default {
    name: 'IndexPage',
    components: { AppLayout, Link },
    props: {
        products: {
            type: Array,
            required: true,
        },
    },
};
</script>
