<template>
  <div>
    <Loading v-if="pending" />
    <div v-else>
      <h1>{{ generator.title }}</h1>
      <p>{{ generator.description }}</p>

      <div class="flex rounded justify-around bg-slate-600 border-slate-500 border-2 border-solid my-5">
        <div v-if="pendingGenerate || !generatedWords">Generating...</div>
        <div v-else v-for="(word, i) of generatedWords.words" :key="word" class="px-5 py-5 text-center text-xl font-bold">
          <div class="shake" :style="'--order:' + (i + 1)">
            {{ word }}
          </div>
        </div>
      </div>

      <div>
        <Button @click="generate" class="py-4 px-10">
          <img src="~/assets/images/rocket.svg" alt="" width="20" class="mr-2 inline-block" />
          {{ pendingGenerate ? "Running..." : "Generate" }}
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

<style>
.shake {
  animation: shake 1s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
  animation-delay: calc(var(--order) * 0.5s);
  transform: translate3d(0, 0, 0);
  opacity: 0;
}

@keyframes shake {
  10%,
  90% {
    transform: translate3d(-1px, 0, 0);
  }

  20%,
  80% {
    transform: translate3d(2px, 0, 0);
  }

  30%,
  50%,
  70% {
    transform: translate3d(-4px, 0, 0);
  }

  40%,
  60% {
    transform: translate3d(4px, 0, 0);
  }

  100% {
    opacity: 1;
  }
}
</style>
