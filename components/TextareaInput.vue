<template>
  <textarea
    class="rounded w-full py-2 px-2 my-2 text-gray-800"
    :rows="rows"
    :placeholder="placeholder"
    @input="$emit('update:modelValue', $event.target.value)"
  ></textarea>
</template>

<script setup lang="ts">
const props = defineProps<{
  placeholder?: string;
  rows?: string;
}>();
</script>
