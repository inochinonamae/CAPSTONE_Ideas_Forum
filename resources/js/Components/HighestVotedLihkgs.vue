<template>
  
 
   
    <ul class="w100 maxw-md bg-transparent">
   <li class=" mb-2 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none  motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500" v-for="item in highestVotedLihkgs" :key="item.id">
      <a   :href="route('lihkg.show',item.id)">
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
              {{ item.message }}
            </p>
            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
              Vote count :  {{ item.vote_count }}
            </p>
         </div>
         <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"
                            />
                        </svg>
         </div>
      </div>
      </a>
   </li>
   </ul>
</template>



<script setup>
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'


const props = defineProps({
    highestVotedLihkgs: Object
})


</script>