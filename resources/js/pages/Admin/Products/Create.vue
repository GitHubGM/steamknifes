<template>
    <AppLayout>
    <div class="ml-2">
        <h1>Create New Product</h1>
        <a href="/dashboard">Return to main page</a>
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
            <div>
                <label>Image</label>
                <input type="file" @change="handleFileChange" />
                <div v-if="errors.image">{{ errors.image }}</div>
            </div>

            <button type="submit">Save</button>
        </form>
    </div>
    </AppLayout>
</template>

<script>
import { Inertia } from '@inertiajs/inertia'
import { useForm } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue';

export default {
    name: 'AdminProductsCreate',
    components: { AppLayout },
    setup() {
        const form = useForm({
            name: '',
            description: '',
            price: '',
            image: null,
        })

        const handleFileChange = (e) => {
            form.image = e.target.files[0]
            console.log('Selected file:', e.target.files[0])
        }
        const submitForm = () => {
            form.post(route('admin.products.store'),{
                forceFormData: true,
            })
        }

        return {
            form,
            handleFileChange,
            submitForm,
            errors: form.errors,
        }
    }
}
</script>
