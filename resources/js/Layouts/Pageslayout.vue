<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
<nav class="  border-b border-slate-900/10 lg:px-8  dark:border-slate-300/10 bg-[#0f172a] border-gray-200 dark:bg-gray-900 w-full d sticky top-0 sm:top-0 z-30">
    <div class="flex flex-wrap sm:justify-between items-center mx-auto max-w-screen-xl p-2">
        <Link href="/" class="flex max-[600px]:w-full max-[600px]:items-center max-[600px]:justify-center">
            <ApplicationLogo class="w-8 h-14 text-white fill-current mr-2" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap logotext">Money-Making Forum</span>
         </Link>
        <div class="flex items-center max-[600px]:w-full max-[600px]:justify-center ">
           
            
            <div  class="sm:right-0 p-6 text-right">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Dashboard</Link
                >

                <template v-else>
                    <Link
                        :href="route('login')"
                        class="font-semibold text-white  dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Log in</Link
                    >

                    <Link
                        
                        :href="route('register')"
                        class=" ml-2 inline-flex items-center justify-center px-6 py-2 text-sm  font-medium text-white transition duration-150 border border-transparent shadow-sm rounded-2xl bg-[#C92228]  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cool-indigo-500"
                        >Register</Link
                    >
                </template>
            </div>
        </div>
    </div>
</nav>
    <div class="min-h-screen flex flex-col bg-[#f4f5ff] sm:justify-center items-center pt-0 sm:pt-0 ">
       

        <div
            class="bg-transparent w-full px-8 container "
        >
            <slot />
        </div>
    </div>
</template>

<style>
.logotext{
    -webkit-background-clip: text;
    color: transparent;
    --tw-gradient-from: #6366f1;
    --tw-gradient-to: #e2e8f0;
    --tw-gradient-stops: var(--tw-gradient-from), #7dd3fc, var(--tw-gradient-to);
background-image: linear-gradient(to top right,var(--tw-gradient-stops));
}
</style>
