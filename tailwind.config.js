/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#FF7517",
                "primary-dark": "#B75818",
                secondary: "#231f1f",
            },
            fontFamily: {
                'poppins': 'Poppins'
            }
        },

        container: {
            center: true,
        },
    },
    plugins: [require("flowbite/plugin")],
};
