<template>
  <div class="container px-5 mx-auto">
    <div class="flex justify-between items-center">
      <NuxtLink to="/"><img src="~/assets/images/logo.svg" class="mw-100" width="200" alt="" /></NuxtLink>

      <div class="flex items-center">
        <NuxtLink
          v-for="(link, i) of [
            { title: 'Home', url: '/' },
            { title: 'Create', url: '/create' },
            { title: 'About', url: '/about' },
          ]"
          :to="link.url"
          class="px-3 py-2 mx-1 rounded text-slate-300 hover:bg-gray-100 hover:text-slate-800"
          :key="i"
          >{{ link.title }}</NuxtLink
        >
        <GoogleLogin
          client-id="430958642962-124qr16rftpcaeno6519e8r0nb3v6b55.apps.googleusercontent.com"
          :callback="login"
          prompt
          auto-login
        ></GoogleLogin>
      </div>
    </div>

    <div class="my-10">
      <IfYouAddFakeComponent-FetchWillWork />
      <NuxtPage />
    </div>

    <footer class="py-10 text-center text-xs text-slate-300">
      Copyright &copy; 2022 <br />
      <a href="https://www.linkedin.com/in/alex-kotl/" class="underline" target="_blank">Oleksandr Kotliarov</a>
    </footer>
  </div>
</template>

<script setup lang="ts">
import { GoogleLogin, decodeCredential } from "vue3-google-login";

const userId = useState("userId");
const userEmail = useState("userEmail");

async function login(res) {
  const userData = decodeCredential(res.credential);
  console.log("Handle the userData", userData);

  const { data } = await useLazyFetch(useRuntimeConfig().apiUrl + "/user/auth", {
    method: "post",
    body: {
      email: userData.email,
      name: userData.name,
      token: userData.jti,
      picture: userData.picture,
    },
  });
  userId.value = data.value.id;
  userEmail.value = userData.email;
}
</script>
