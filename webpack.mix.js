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

mix.ts("resources/js/app.ts", "public/js")
    .ts("resources/js/index.ts", "public/js")
    .ts("resources/js/detail.ts", "public/js")
    .ts("resources/js/mypage.ts", "public/js")
    .ts("resources/js/edit-reserve.ts", "public/js")
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
