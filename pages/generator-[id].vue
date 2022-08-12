<template>
  <div>
    <Loading v-if="pending" />
    <div v-else>
      <h1>{{ generator.title }}</h1>
      <p>{{ generator.description }}</p>

      <div class="flex rounded justify-around bg-slate-600 border-slate-500 border-2 border-solid my-5">
        <div v-if="pendingGenerate || !generatedWords">Generating...</div>
        <div v-else v-for="word of generatedWords.words" :key="word" class="px-5 py-5 text-center text-xl font-bold">
          {{ word }}
        </div>
      </div>

      <div>
        <Button @click="generate" class="py-4 px-10">
          <img src="~/assets/images/rocket.svg" alt="" width="20" class="mr-2 inline-block" />
          Generate
        </Button>
      </div>
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
