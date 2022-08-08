<template>
  <textarea class="rounded w-full py-2 px-2 my-2 text-gray-800" :rows="rows" :placeholder="placeholder"></textarea>
</template>

<script setup lang="ts">
const props = defineProps<{
  placeholder?: string;
  rows: {
    type: String;
    default: 3;
  };
}>();
</script>
