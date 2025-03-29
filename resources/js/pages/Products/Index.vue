<template>
    <div>
        <h1>All Products</h1>
        <div v-for="product in products" :key="product.id">
            <!-- Use Inertia's <Link> to navigate to the Show page -->
            <Link :href="route('products.show', product.id)">
                {{ product.name }}
            </Link>
        </div>
    </div>
</template>

<script>
import { Link, usePage } from '@inertiajs/vue3';

export default {
    name: 'IndexPage',
    components: { Link },
    props: {
        products: {
            type: Array,
            required: true,
        },
    },
};
</script>
