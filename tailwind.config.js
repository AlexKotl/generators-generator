/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./components/**/*.{js,vue,ts}", "./app.vue"],
  darkMode: "class",
  theme: {
    extend: {},
  },
  plugins: [],
  safelist: ["flex-1"],
};
