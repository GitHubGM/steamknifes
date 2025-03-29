<template>
    <div>
        <h1>Admin: Products</h1>

        <!-- Link to create a new product -->
        <Link :href="route('admin.products.create')">Create New Product</Link>

        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in products" :key="product.id">
                <td>{{ product.name }}</td>
                <td>{{ product.price }}</td>
                <td><img :src="product.image_url" alt="Product image" width="160" height="90"/></td>
                <td>
                    <Link :href="route('admin.products.edit', product.id)">Edit</Link>
                    |
                    <form @submit.prevent="deleteProduct(product.id)" style="display:inline;">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { Link} from '@inertiajs/vue3'
import {Inertia} from '@inertiajs/inertia'
export default {
    name: 'AdminProductsIndex',
    components: { Link },
    props: {
        products: Array,
    },
    methods: {
        deleteProduct(productId) {
            if (confirm('Are you sure you want to delete this product?')) {
                Inertia.delete(route('admin.products.destroy', productId))
            }
        }
    }
}
</script>
