<template>
  <div>
    <Alert v-if="!savedList">Here we will store your saved ideas. Start any generator and save ideas.</Alert>
    <div v-else>
      <h1>My saved ideas</h1>
      <div v-for="item of savedList" :key="item" class="rounded my-1 py-2 px-5 text-lg bg-slate-700 flex justify-between">
        <div>
          {{ item }}
        </div>
        <div class="underline text-sm cursor-pointer" @click="remove(item)">Remove</div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
const savedList = useState("savedList");

function remove(word): void {
  if (process.client) {
    savedList.value = savedList.value?.filter((el) => el !== word);
    localStorage.setItem("saved", JSON.stringify(savedList.value));
  }
}
</script>
