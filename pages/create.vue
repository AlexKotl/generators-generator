<template>
  <div>
    <h1>Create your own generator</h1>
    <Alert v-if="false && !userEmail" class="font-bold">Please login using Google Login to be able to add new generator.</Alert>
    <Alert v-else-if="pending">Submitting form...</Alert>
    <Alert v-else-if="isSubmitted">Generator created!</Alert>
    <form v-else>
      <Alert v-if="errorMessage">Oops... {{ errorMessage }}</Alert>

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
      <div class="flex justify-center -mx-2">
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
const userEmail = useState("userEmail");
const parts = ref(2);
const errorMessage = ref("");
const isSubmitted = ref(false);
const form = reactive({
  title: "",
  description: "",
  variants: ["", "", "", "", ""],
});

async function submit() {
  const { data, pending, error } = await useFetch(useRuntimeConfig().apiUrl + "/generators/create", {
    method: "post",
    body: form,
    headers: {
      email: userEmail,
    },
    key: Date(), // enable resubmitting
  });

  if (data.value?.error) {
    errorMessage.value = data.value.error;
  } else {
    isSubmitted.value = true;
  }
}
</script>
