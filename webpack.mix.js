const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");
require("dotenv").config();
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/detail.js", "public/js")
    .js("resources/js/like-shop.js", "public/js")
    .js("resources/js/cancel-reserve.js", "public/js")
    .js("resources/js/search-btn.js", "public/js")
    .js("resources/js/review.js", "public/js")
    .sass("resources/sass/app.scss", "public/css", [])
    .sass("resources/sass/reset.scss", "public/css", [])
    .options({
        postCss: [
            require("postcss-import"),
            tailwindcss("./tailwind.config.js"),
        ],
    })
    .version();

mix.browserSync({
    proxy: "laravel.test",
    port: process.env.MIX_PORT,
    open: false,
});
