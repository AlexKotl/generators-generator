<template>
  <div>
    <div class="cotainer px-5">
      <div class="flex justify-between items-center">
        <NuxtLink to="/"><img src="~/assets/images/logo.svg" class="mw-100" width="200" alt="" /></NuxtLink>

        <div class="leading-7">
          <NuxtLink
            v-for="(link, i) of [
              { title: 'Home', url: '/' },
              { title: 'Create', url: '/create' },
              { title: 'About', url: '/about' },
            ]"
            :to="link.url"
            class="px-3 py-5 rounded text-slate-300 hover:bg-gray-100 hover:text-slate-800"
            :key="i"
            >{{ link.title }}</NuxtLink
          >
          <GoogleLogin client-id="430958642962-124qr16rftpcaeno6519e8r0nb3v6b55.apps.googleusercontent.com" :callback="login"></GoogleLogin>
        </div>
      </div>

      <div>
        <NuxtPage />
      </div>

      <footer class="py-10 text-center text-xs text-slate-300">
        Copyright &copy; 2022 <br />
        <a href="https://www.linkedin.com/in/alex-kotl/" class="underline" target="_blank">Oleksandr Kotliarov</a>
      </footer>
    </div>
  </div>
</template>

<script setup lang="ts">
import { GoogleLogin } from "vue3-google-login";

function login(res) {
  console.log("login:", res);
}
</script>
