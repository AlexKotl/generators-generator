<template>
  <input
    class="rounded w-full py-2 px-2 my-2 text-gray-800 bg-slate-200"
    :type="type"
    :min="min"
    :max="max"
    :value="modelValue"
    :placeholder="placeholder"
    @input="$emit('update:modelValue', $event.target.value)"
  />
</template>

<script setup lang="ts">
const props = defineProps<{
  placeholder?: string;
  min?: number;
  max?: number;
  modelValue: string;
  type?: string;
}>();
</script>
