<script setup>
import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';


defineProps({
    href: {
        type: String,
        required: true,
    },
});
</script>

<script>
export default {
  props: {
    highestVotedLihkgs: Array, // Array of highest voted lihkgs passed from the controller
  },
};
</script>

<template>
  <div class="card">
    <div class="card-header">
      Highest Voted Lihkgs
    </div>
    <div> ffdf</div>
    <div class="card-body">
      <ul class="list-group">
        <li v-for="lihkg in highestVotedLihkgs" :key="lihkg.id" class="list-group-item">
          <div>{{ lihkg.vote_count }}</div>
          {{ lihkg.message }}
        </li>
      </ul>
    </div>
  </div>
</template>