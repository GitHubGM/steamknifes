
<template>
    <AppLayout>
    <div class="ml-2">
        <h1>{{ product.name }}</h1>
        <p>Price: {{ product.price }}</p>
        <p>{{ product.description }}</p>
        <img v-if="product.image_url" :src="product.image_url" alt="Product Image" />

        <!-- Possibly link back to admin index or dashboard -->
        <Link :href="route('admin.products.index')">Back to Products</Link>
    </div>
    </AppLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue';

// Accept the product prop from the controller
const props = defineProps({
    product: Object
})
</script>
