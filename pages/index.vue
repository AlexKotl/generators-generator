<template>
  <div>
    <h1>Generators</h1>
    {{ generators }}
    <Loading v-if="pending" />
    <div v-else>
      <div v-for="generator of generators" :key="generator.id" class="rounded px-3 py-2 my-1 bg-slate-300">
        <h2 class="font-bold">
          {{ generator.title }}
        </h2>
        <div>
          {{ generator.description }}
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
const { pending, data: generators } = useLazyFetch(useRuntimeConfig().apiUrl + "/generators/list");
watch(generators, (newGenerators) => {
  console.log(newGenerators);
});
</script>
