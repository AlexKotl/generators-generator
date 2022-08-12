/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./components/**/*.{js,vue,ts}", "./pages/**/*.{js,vue,ts}", "./app.vue"],
  darkMode: "class",
  theme: {
    extend: {},
  },
  plugins: [],
  safelist: ["flex-1", "bg-gray-800", "text-white", "bg-slate-600", "bg-slate-500"],
};
