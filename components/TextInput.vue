<template>
  <input type="text" class="rounded w-full py-2 px-2 my-2 text-gray-800" :placeholder="placeholder" />
</template>

<script setup lang="ts">
const props = defineProps<{
  placeholder: string;
}>();
</script>
