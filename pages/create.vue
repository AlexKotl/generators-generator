<template>
  <div>
    <h1>Create your own generator</h1>
    <div v-if="!userClientId" class="font-bold">Please login using Google Login to be able to add new generator.</div>
    <form v-else>
      <div>
        <TextInput v-model="form.title" placeholder="Enter generator title" />
      </div>
      <div>
        <TextareaInput v-model="form.description" placeholder="Short description..."></TextareaInput>
      </div>
      <div class="flex items-center content-center">
        <div>Number of generators parts:</div>
        <div class="px-2">
          <TextInput type="number" :min="2" :max="5" v-model="parts" />
        </div>
      </div>
      <div class="flex justify-center">
        <div class="px-2 flex-1" v-for="(n, i) in Array(5)" :key="i" v-show="i <= parts - 1">
          <TextareaInput v-model="form.variants[i]" :placeholder="'Variants List ' + (i + 1)" rows="10"></TextareaInput>
        </div>
      </div>
      <div>
        <Button @click.prevent="submit">Create!</Button>
      </div>
    </form>
  </div>
</template>

<script setup lang="ts">
const userClientId = useState("userClientId");
const parts = ref(2);
const form = reactive({
  title: "",
  description: "",
  variants: ["", "", "", "", ""],
});

async function submit() {
  const { data, pending, error } = await useFetch(useRuntimeConfig().apiUrl + "/generators/create", {
    method: "post",
    body: form,
    key: Date(), // enable resubmitting
  });
}
</script>
