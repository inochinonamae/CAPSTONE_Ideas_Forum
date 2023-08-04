<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import HighestVotedLihkgs from "@/Components/HighestVotedLihkgs.vue";

  // Import the Inertia shared data
  import { usePage } from '@inertiajs/inertia-vue3';

  // Access the shared data
  const { highestVotedLihkgs } = usePage().props;

// defineProps({
//   canLogin: {
//     type: Boolean,
//   },
//   canRegister: {
//     type: Boolean,
//   },
//   laravelVersion: {
//     type: String,
//     required: true,
//   },
// });
 
</script>

<script>
export default {
  props: {
    highestVotedLihkgs: {
      type: Array,
      default: () => [],
    },},
    mounted() {
    // Log the value to the console if the data is available
    if (this.highestVotedLihkgs && this.highestVotedLihkgs.length > 0) {
      console.log("Highest Vote Count:", this.highestVotedLihkgs[0].vote_count);
    }
    else {
      console.log("no");
    }
  },
};
</script>
 

 

<template>
  <Head title="Welcome" />
  <div>
    <!-- Your other content for the OtherPage component -->
  </div>

  

  <div
    class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
      <Link v-if="$page.props.auth.user" :href="route('dashboard')"
        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
      Dashboard</Link>

      <template v-else>
        <Link :href="route('login')"
          class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
        Log in</Link>

        <Link v-if="canRegister" :href="route('register')"
          class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
        Register</Link>
      </template>
    </div>

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
      <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
          <a href="/lihkg"> <!-- Add the URL you want to navigate to here -->
            <img src="../../pic/icon-forum-line.svg" alt="LihkgLogo" class="h-64 w-auto bg-gray-100 dark:bg-gray-900"
              style="width: auto;" />
          </a>
        </div>
      </div>
    </div>
  </div>

  <component :is="HighestVotedLihkgs" :highestVotedLihkgs="highestVotedLihkgs" />
  <div>
    <h1>Welcome to My App</h1>
    <p>Click the link below to view highest voted lihkgs:</p>
    <a @click.prevent="viewHighestVotedLihkgs">View Highest Voted Lihkgs</a>
    <div v-if="highestVotedLihkgs">
      <h2>Highest Voted Lihkgs</h2>
      <ul>
        <li v-for="item in highestVotedLihkgs" :key="item.id">
          {{ item.vote_count }} - {{ item.message }}
        </li>dfdfd
      </ul>
    </div>
  </div>
 


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
