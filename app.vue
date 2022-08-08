<template>
  <div>
    <body class="bg-slate-600 text-white"></body>

    <div class="cotainer px-5">
      <div class="flex justify-between items-center">
        <img src="~/assets/images/logo.svg" class="mw-100" width="200" alt="" />

        <div class="leading-7">
          <NuxtLink
            v-for="(link, i) of [
              { title: 'Home', url: '/' },
              { title: 'Create', url: '/create' },
              { title: 'About', url: '/about' },
            ]"
            :to="link.url"
            class="px-3 py-5 rounded font-bold text-slate-300 hover:bg-gray-100 hover:text-slate-800"
            :key="i"
            >{{ link.title }}</NuxtLink
          >
        </div>
      </div>

      <div>
        <NuxtPage />
      </div>
    </div>
  </div>
</template>
