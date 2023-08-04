<script setup>
import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';
 

// const props = defineProps({
//   href: {
//     type: String,
//     required: true,
//   },
//   sentence: String, // 'sentence' prop of type String (optional)
// });

const props = defineProps(['highestVotedLihkgs']);

 
</script>

<!-- <script>
export default {
  props: {
    highestVotedLihkgs: Array, // Array of highest voted lihkgs passed from the controller
  },
  mounted() {
  if (!this.highestVotedLihkgs || this.highestVotedLihkgs.length === 0) {
    console.log("highestVote is null or empty");
  } else {
    console.log(this.highestVotedLihkgs);
  }
 
},
};
</script> -->


<!-- <template>
  <div class="card">
    <div class="card-header">
      Highest Voted Lihkgs
    </div>
    <div class="card-body">
      <li class="list-group-item">{{ sentence }}</li>
      <ul class="list-group">
        <li v-for="lihkg in highestVotedLihkgs" :key="lihkg.id" class="list-group-item">
          <div>{{ lihkg.vote_count }}</div>
          {{ lihkg.message }}
        </li>
      </ul>
    </div>
  </div>
</template> -->

<template>
  <div>
    <h2>Highest Voted Lihkgsdddd</h2>
    <ul>
      <li v-for="item in highestVotedLihkgs" :key="item.id">
        {{ item.vote_count }} - {{ item.message }}
      </li>
    </ul>
  </div>
</template>
