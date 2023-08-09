<script>
import { defineProps } from 'vue';

export default {
  props: defineProps(['reply']),
  methods: {
    formatDateTime(dateTime) {
      const options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric' };
      return new Date(dateTime).toLocaleDateString(undefined, options);
    },
  },
};
</script>


<template>
  <div class="p-6  space-x-2">
  <div class="flex">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
    </svg>
    <div class="flex-1">
      <div class="flex justify-between items-center">
        <div> 
          <span class="text-gray-800">{{ reply.user.name }}</span>
          <small class="ml-2 text-sm text-gray-600">{{ formatDateTime(reply.created_at) }}</small>
        </div>
      </div>
      <p class="mt-4 text-lg text-gray-900">{{ reply.reply }}</p>
    </div>
    </div>
  </div>
</template>

