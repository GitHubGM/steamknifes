<template>
    <div>
        <h1>Edit Product</h1>

        <form @submit.prevent="submitForm">
            <div>
                <label>Name</label>
                <input v-model="form.name" type="text">
                <div v-if="errors.name">{{ errors.name }}</div>
            </div>

            <div>
                <label>Description</label>
                <textarea v-model="form.description"></textarea>
                <div v-if="errors.description">{{ errors.description }}</div>
            </div>

            <div>
                <label>Price</label>
                <input v-model="form.price" type="number" step="0.01">
                <div v-if="errors.price">{{ errors.price }}</div>
            </div>

            <button type="submit">Update</button>
        </form>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3'
import { Inertia } from '@inertiajs/inertia'

export default {
    name: 'AdminProductsEdit',
    props: {
        product: Object
    },
    setup(props) {
        const form = useForm({
            name: props.product.name,
            description: props.product.description || '',
            price: props.product.price
        })

        const submitForm = () => {
            form.put(route('admin.products.update', props.product.id))
        }

        return {
            form,
            errors: form.errors,
            submitForm
        }
    }
}
</script>
