<script setup>
import { defineProps } from "vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import axios from "axios";
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

dayjs.extend(relativeTime);
const props = defineProps(["lihkg"]);
const formatDateTime = (dateTime) => {
  return dayjs(dateTime).fromNow();
};

const showCommentSection = ref(false);
const editing = ref(false);
const voteCount = ref(props.lihkg.vote_count);
const hasVoted = ref(false);

const form = useForm({
  reply: "",
  message: props.lihkg.message,
  lihkgs_id: props.lihkg.id,
});

const vote = (lihkgId) => {
  axios
    .post(`/vote/${lihkgId}`)
    .then((response) => {
      voteCount.value = response.data.vote_count;
    })
    .catch((error) => {
      console.error(error);
    });
};

console.log("props.lihkg.replies:", props.lihkg.replies);
console.log("form.data:", form.data());
</script>


<script>
import Reply from "@/Components/Reply.vue";

export default {
  components: {
    Reply,
  },
  props: {
    replies: {
      type: Array,
      default: () => [],
      required: true,
    },
  },
  methods: {
    vote(lihkgId) {
      axios
        .post(`/vote/${lihkgId}`)
        .then((response) => {
          const voteCount = response.data.vote_count;
          // Handle the updated vote count in your frontend
        })
        .catch((error) => {
          // Handle any errors that occur during the request
        });
    },
  },
};
</script>

<template>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
  <div>
    <div class="p-6 flex space-x-2">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6 text-gray-600 -scale-x-100"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        stroke-width="2"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
        />
      </svg>
      <div class="flex-1">
        <div class="flex justify-between items-center">
          <div>
            <span class="text-gray-800">{{ lihkg.user.name }}</span>
            <small class="ml-2 text-sm text-gray-600">{{
              dayjs(lihkg.created_at).fromNow()
            }}</small>
            <small
              v-if="lihkg.created_at !== lihkg.updated_at"
              class="text-sm text-gray-600"
            >
              &middot; edited</small
            >
          </div>
          <Dropdown
            v-if="lihkg.user.id === $page.props.auth.user.id"
            class="relative"
          >
            <template #trigger>
              <button>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-4 w-4 text-gray-400"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"
                  />
                </svg>
              </button>
            </template>
            <template #content>
              <button
                class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:bg-gray-100 transition duration-150 ease-in-out"
                @click="editing = true"
              >
                Edit
              </button>
              <DropdownLink
                :href="route('lihkg.destroy', lihkg.id)"
                method="delete"
              >
                Delete
              </DropdownLink>
            </template>
          </Dropdown>
        </div>
      </div>
      <div class="flex items-center space-x-2"></div>
      <form
        v-if="editing"
        @submit.prevent="
          form.put(route('lihkg.update', lihkg.id), {
            onSuccess: () => (editing = false),
          })
        "
      >
        <textarea
          v-model="form.message"
          class="mt-4 w-full text-gray-900 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>
        <InputError :message="form.errors.message" class="mt-2" />
        <div class="space-x-2">
          <PrimaryButton class="mt-4">Save</PrimaryButton>
          <button
            class="mt-4"
            @click="
              editing = false;
              form.reset();
              form.clearErrors();
            "
          >
            Cancel
          </button>
        </div>
      </form>
    </div>
    <div class="flex items-center space-x-2 flex-wrap mb-4">
      <p class="mt-4 text-lg text-gray-900 pl-9 pb-4">{{ lihkg.message }}</p>
    </div>

    <!-- Show/Hide Reply section button -->
    <div class="p-6 flex space-x-2 relative">
      <!-- Voting -->
      <div class="my-4 flex items-center">
        <p class="mb-0 mr-4">Vote Count: {{ voteCount }}</p>
        <button
          @click="vote(lihkg.id)"
          class="btn btn-primary b-0 flex items-center"
        >
          <img
            src="../../pic/thumbups.png"
            alt="LihkgLogo"
            class="h-5 w-auto dark:bg-gray-900 mr-2"
            style="width: 16px; height: 16px"
          />
          <font-awesome-icon :icon="faVoteUp" />
          <i class="fa-solid fa-up-long"></i>
        </button>
      </div>
      <!-- Show/Hide Reply section button -->

      <button
        class="absolute bottom-3 right-5"
        @click="showCommentSection = !showCommentSection"
      >
        <template v-if="showCommentSection">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 text-red-500"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M6 18L18 6M6 6l12 12"
            ></path>
          </svg>
        </template>
        <template v-else>
          <p>Comments</p>
        </template>
      </button>
    </div>

    <div v-if="showCommentSection" class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
      <!-- Number of Comments section -->
      <div
        class="flex-1 text-right text-sm text-gray-600 mt-2"
        v-if="props.lihkg.replies"
      >
        <span v-if="props.lihkg.replies.length === 1">Comment</span>
        <span v-else>{{ props.lihkg.replies.length }} Comments</span>
      </div>
      <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
        <div
          class="p-6 flex space-x-2"
          v-for="reply in props.lihkg.replies"
          :key="reply.id"
        >
          <div class="flex flex-col">
            <!-- Add flex flex-col here -->
            <div>
              <span class="text-gray-800">{{ reply.user.name }}</span>
              <small class="ml-2 text-sm text-gray-600">{{
                formatDateTime(reply.created_at)
              }}</small>
            </div>
            <br />
            <div>
              <p class="mt-2 text-sm text-gray-900">{{ reply.reply }}</p>
            </div>
          </div>
        </div>
      </div>
      <br />
      <form
        @submit.prevent="
          form.post(route('reply.store'), { onSuccess: () => form.reset() })
        "
      >
        <textarea
          v-model="form.reply"
          placeholder="Your thought about the Ideas"
          class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
          type="text"
          name="reply"
        ></textarea>

        <InputError :message="form.errors.reply" class="mt-2" />
        <input type="hidden" name="lihkgs_id" :value="lihkg.id" />
        <div class="text-right">
          <PrimaryButton class="mt-4">Reply</PrimaryButton>
        </div>
      </form>
    </div>
  </div>
</template>
 