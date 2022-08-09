<script setup lang="ts">
const { pending, data: generators } = useLazyFetch(useRuntimeConfig().apiUrl + "/generators/list");
watch(generators, (newGenerators) => {
  console.log(newGenerators);
});
</script>

<template>
  <div>
    <h1>Generators</h1>

    <div v-if="pending">Loading generators...</div>
    <div v-else>
      <div v-for="generator of generators" :key="generator.id" class="rounded px-3 py-2">
        <h2>
          {{ generator.title }}
        </h2>
        <div>
          {{ generator.description }}
        </div>
      </div>
    </div>
  </div>
</template>
