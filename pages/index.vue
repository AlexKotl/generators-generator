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
          <div v-if="generator.user_id === userId">
            <Button @click.prevent.stop="remove(generator.id)">Delete</Button>
          </div>
          <div class="text-center">
            <img src="~/assets/images/rocket.svg" class="inline-block" alt="" width="16" />
            <br />
            {{ generator.rating }}
          </div>
        </div>
      </NuxtLink>
    </div>
  </div>
</template>

<script setup lang="ts">
const userId = useState("userId");

const { pending, error, refresh, data: generators } = useLazyFetch(useRuntimeConfig().apiUrl + "/generators/list");

async function remove(id) {
  if (confirm("Are you sure you want to delete your generator? This operation cannot be undone.")) {
    const { data } = await useFetch(useRuntimeConfig().apiUrl + "/generators/delete/" + id, {
      method: "delete",
    });
    refresh();
  }
}
</script>
