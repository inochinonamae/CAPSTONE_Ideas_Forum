<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

import HighestVotedLihkgs from '@/Components/HighestVotedLihkgs.vue';
import Pageslayout from '@/Layouts/Pageslayout.vue';
const lihkgs = ref([
  { id: 1, message: 'First lihkg', vote_count: 10 },
  { id: 2, message: 'Second lihkg', vote_count: 8 },
  // Add more "lihkgs" data as needed
]);

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
   highestVotedLihkgs:Object
});


</script>
<script>
console.log(HighestVotedLihkgs);
</script>

<template>

    <Head title="Welcomedddddddd" />

    <Pageslayout>
     

        <div class="relative sm:flex sm:justify-center sm:items-center minh-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            
        </div>
        <section class=" dark:bg-gray-900 ">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative">
                
                <h1 class="my-4 py-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Welcome to The Money-Making Forum</h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">Where all money matters matter</p>
            </div>
        </section>
            <div>

                <div class="max-w-7xl mx-auto p-6 lg:p-8">
                 <h2  class=" flex items-center space-x-4 w-full p-3 border-b border-gray-200 border-solid mb-1 ">
    <span class="flex-1 min-w-0" style="font-size: 25px; ">Top 10 Highest Voted</span>
    <a :href="route('highest-voted-lihkgs')" class="ml-2 inline-flex items-center justify-center px-6 py-2 text-sm font-medium text-white transition duration-150 border border-transparent shadow-sm rounded-2xl bg-[#f15048] hover:bg-[#f15048] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cool-indigo-500">View All</a></h2>

                    <HighestVotedLihkgs :highestVotedLihkgs="highestVotedLihkgs" />
                    
                </div>
            </div>

            <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                    <div class="flex items-center gap-4">
                        <a
                            href="/"
                            class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400"
                                    >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                                    />
                                </svg>
                                All rights reserved
                        </a>
                    </div>
                </div>

                
            </div>
            </Pageslayout>
       
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
