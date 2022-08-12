<template>
  <div>
    <Loading v-if="pending" />
    <div v-else>
      <h1>{{ generator.title }}</h1>
      <div>{{ generator.description }}</div>
    </div>
  </div>
</template>

<script setup lang="ts">
const route = useRoute();
const { pending, data: generator } = useLazyFetch(useRuntimeConfig().apiUrl + "/generators/show/" + route.params.id);
</script>
