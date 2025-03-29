<template>
    <div>
        <h1>Product Details (Admin)</h1>
        <p>Name: {{ product.name }}</p>
        <p>Description: {{ product.description }}</p>
        <p>Price: {{ product.price }}</p>
        <Link :href="route('admin.products.edit', product.id)">Edit Product</Link>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3'
export default {
    name: 'AdminProductShow',
    components: { Link },
    props: {
        product: Object
    }
}
</script>
