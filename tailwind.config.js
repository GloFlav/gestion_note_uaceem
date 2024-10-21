/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/**/*.blade.php",
        "./resources/**/**/**/*.blade.php",
        "./resources/**/**/**/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "node_modules/preline/dist/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
            poppins: ['Poppins', 'sans-serif'],
          },
        },
    },
    plugins: [require("preline/plugin"), require("@tailwindcss/forms")],
};
