import { defineNuxtConfig } from "nuxt";

// https://v3.nuxtjs.org/api/configuration/nuxt.config
export default defineNuxtConfig({
  //   buildModules: ["@nuxt/postcss8"],
  build: {
    postcss: {
      postcssOptions: {
        plugins: {
          tailwindcss: {},
          autoprefixer: {},
        },
      },
    },
  },
  css: ["@/assets/css/main.css"],
  ssr: false,
  generate: {
    subFolders: false,
  },
  app: {
    head: {
      bodyAttrs: {
        class: "bg-gray-800 text-white",
      },
      title: "Generators Generator",
      meta: [
        { charset: "utf-8" },
        { name: "viewport", content: "width=device-width, initial-scale=1" },
        {
          hid: "description",
          name: "description",
          content: "Generates ideas, drawings, names and much more.",
        },
      ],
      link: [{ rel: "icon", type: "image/x-icon", href: "/favicon.ico" }],
    },
  },
  publicRuntimeConfig: {
    apiUrl: process.env.API_URL,
  },
});
