<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Lihkg from '@/Components/Lihkg.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';

defineProps(['lihkgs']);

 
const form = useForm({
    message: '',
});
</script>
 
<template>
    <Head title="Post Your Ideas here" />

    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('lihkg.store'), { onSuccess: () => form.reset() })">
                <textarea
                    v-model="form.message"
                    placeholder="What's on your mind?"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                </textarea>
                <InputError :message="form.errors.message" class="mt-2" />
                <PrimaryButton class="mt-4">Post</PrimaryButton>
            </form>

            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                <Lihkg
                    v-for="lihkg in lihkgs"
                    :key="lihkg.id"
                    :lihkg="lihkg"
                    :replies="lihkg.replies"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>