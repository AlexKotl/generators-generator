<template>
  <div>
    <Loading v-if="pending" />
    <Alert v-else-if="error">Error loading data from the server</Alert>
    <div v-else>
      <NuxtLink v-for="generator of generators" :key="generator.id" :to="'generator-' + generator.id">
        <div class="rounded px-3 py-2 my-1 bg-slate-600 hover:bg-slate-500 flex justify-between">
          <div>
            <h2 class="font-bold">
              {{ generator.title }}
            </h2>
            <div class="text-sm">
              {{ generator.description }}
            </div>
          </div>
          <div>
            <img src="~/assets/images/thumbs-up.svg" alt="" />
            {{ generator.rating }}
          </div>
        </div>
      </NuxtLink>
    </div>
  </div>
</template>

<script setup lang="ts">
const { pending, error, data: generators } = useLazyFetch(useRuntimeConfig().apiUrl + "/generators/list");
</script>
