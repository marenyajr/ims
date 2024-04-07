/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                laravel: "#C15D5D",
                laraveld: "#E07E1D",
            },
            scale: {
                101: "1.01",
            },
        },
    },
    plugins: [],
};