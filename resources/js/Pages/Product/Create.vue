<template>
    <Admin>

    <div class="container  ">
    <h1 class="text-4xl font-bold my-10">Create Product</h1>
    <form @submit.prevent="submit" class="space-y-6">
        <div>
            <InputLabel for="name" value="name" />
            <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name"  autofocus />
            <InputError class="mt-2" :message="form.errors.name" />
        </div>

        <div>
            <InputLabel for="price" value="Price" />
            <TextInput id="price" type="number"  class="mt-1 block w-full" v-model="form.price" />
            <InputError class="mt-2" :message="form.errors.price" />
        </div>

        <div>
            <InputLabel for="image" value="Image" />
            <TextInput id="image" type="file" class="mt-1 block w-full" @input="form.image = $event.target.files[0]" />
            <InputError class="mt-2" :message="form.errors.image" />
        </div>

        <div>
            <InputLabel for="description" value="Description" />
            <TextInput id="description" type="text" class="mt-1 block w-full" v-model="form.description" />
            <InputError class="mt-2" :message="form.errors.description" />
        </div>

        <div class="flex items-center gap-x-4">
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Create
            </PrimaryButton>

            <SecondaryButton :href="route('products.index')">
                Cancel
            </SecondaryButton>
        </div>
    </form>
    </div>
    </Admin>
</template>
<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import Admin from '../../Pages/Auth/Admin.vue';
const form = useForm({
    name: null,
    price: null,
    image: null,
    description: null
})

function submit() {
    
    form.post(route('products.admin.create'))

}
</script>
