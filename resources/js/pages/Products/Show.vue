<template>
    <div>
        <h1>{{ product.name }}</h1>
        <p>Price: {{ product.price }}</p>
        <p>{{ product.description }}</p>

        <form @submit.prevent="addToCart">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
    name: 'ProductsShow',
    props: {
        product: {
            type: Object,
            required: true
        }
    },
    methods: {
        addToCart() {
            // Example of a POST request to the cart
            Inertia.post(route('cart.store'), {
                product_id: this.product.id,
                quantity: 1,
            });
        }
    }
};
</script>
