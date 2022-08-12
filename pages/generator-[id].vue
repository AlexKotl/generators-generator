<template>
  <div>
    <Loading v-if="pending" />
    <div v-else>
      <h1>{{ generator.title }}</h1>
      <p>{{ generator.description }}</p>

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

function generate() {
  console.log("generating");
}
</script>
