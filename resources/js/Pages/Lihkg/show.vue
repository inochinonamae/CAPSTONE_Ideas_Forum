<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Lihkg from '@/Components/Lihkg.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
import Pageslayout from '@/Layouts/Pageslayout.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    
    lihkgsshow:Object
});

const form = useForm({
    message: '',
});
</script>
<template>
    <Head title="Post Your Ideas here" />
    <Pageslayout>

    
        
        <h2  class=" flex items-center space-x-4 w-full p-3 border-b border-gray-200 border-solid mb-1 ">
            <span class="flex-1 min-w-0" style="font-size: 25px; ">{{ lihkgsshow.message }}</span>
            </h2>




            <div class=" mb-2 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none  motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500" >
      
      <div class="flex items-center space-x-4">
         <div class="flex-shrink-0">
             <div
                                class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full"
                            >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            
                                
                            </div>
         </div>
         <div class="flex-1 min-w-0">
            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
              {{ lihkgsshow.message }}
            </p>
            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
              Vote count :  {{ lihkgsshow.vote_count }}
            </p>
         </div>
         </div>
         
        <div class="mt-4" v-if="lihkgsshow.replies">
        <span v-if="lihkgsshow.replies.length === 1">Comment</span>
        <span v-else>{{ lihkgsshow.replies.length }} Comments</span>

         <div class="w-full mt-3 " v-for="reply in lihkgsshow.replies"
          :key="reply.id">
          <div class=" items-center justify-between p-4 text-sm text-gray-700 bg-gray-100  dark:bg-gray-800 dark:text-white hover:bg-gray-200 rounded">
          <p class="text-gray-600 text-sm">Comment by name {{reply.user.name}}</p>
              <p class="mt-2 text-lg text-gray-900">{{ reply.reply }}</p>
            </div>
         
      </div>
      </div>
     
   </div>
    
    </Pageslayout>
</template>