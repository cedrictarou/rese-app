const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    light: colors.blue[300],
                    DEFAULT: colors.blue[600],
                    dark: colors.blue[700],
                },
                secondary: {
                    DEFAULT: colors.gray[300],
                },
                accent: {
                    DEFAULT: colors.red[600],
                },
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
