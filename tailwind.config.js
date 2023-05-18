/** @type {import('tailwindcss').Config} */
export default {
    important: true,
    content: ["*.php", "component/*.php", "./src/main.ts"],
    theme: {
        extend: {},
    },
    plugins: [],
    safelist: ["bg-block"],
};
