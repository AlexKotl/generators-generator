import vue3GoogleLogin, { decodeCredential } from "vue3-google-login";

export default defineNuxtPlugin((nuxtApp) => {
  console.log("IMPORTED");
  nuxtApp.vueApp.use(vue3GoogleLogin, {
    property: {},
  });
});
