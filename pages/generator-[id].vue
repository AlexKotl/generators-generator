<template>
  <div>
    <Loading v-if="pending" />
    <div v-else>
      <h1>{{ generator.title }}</h1>
      <p>{{ generator.description }}</p>

      <div class="flex rounded justify-between bg-slate-200">
        <div v-if="pendingGenerate">Generating...</div>
        <div v-else v-for="word of generatedWords.words" :key="word">
          {{ word }}
        </div>
      </div>

      <Button @click="generate">
        <img src="~/assets/images/rocket.svg" alt="" width="20" class="mr-2" />
        Generate
      </Button>
    </div>
  </div>
</template>

<script setup lang="ts">
const generatorId = useRoute().params.id;
const { pending, data: generator } = useLazyFetch(useRuntimeConfig().apiUrl + "/generators/show/" + generatorId);
const { pendingGenerate, data: generatedWords, refresh } = useFetch(useRuntimeConfig().apiUrl + "/generators/generate/" + generatorId);

function generate() {
  refresh();
}
</script>
