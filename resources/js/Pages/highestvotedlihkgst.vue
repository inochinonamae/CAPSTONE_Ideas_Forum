<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Lihkg from '@/Components/Lihkg.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
import Pageslayout from '@/Layouts/Pageslayout.vue';
import HighestVotedLihkgs from '@/Components/HighestVotedLihkgs.vue';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    
    highestVotedLihkgs:Object
});

const form = useForm({
    message: '',
});
</script>
<template>
    <Head title="Post Your Ideas here" />
    <Pageslayout>
        
        <h2  class=" flex items-center space-x-4 w-full p-3 border-b border-gray-200 border-solid mb-1 ">
            <span class="flex-1 min-w-0" style="font-size: 25px; ">Money making Ideas</span>
            </h2>
        <HighestVotedLihkgs :highestVotedLihkgs="highestVotedLihkgs" />
    
    </Pageslayout>
</template>