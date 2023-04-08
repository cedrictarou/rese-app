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
    .ts("resources/js/shop-admin/show.ts", "public/js/shop-admin")
    .ts("resources/js/shop-admin/create.ts", "public/js/shop-admin")
    .ts("resources/js/shop-admin/edit.ts", "public/js/shop-admin")
    .sass("resources/sass/app.scss", "public/css", [])
    .sass("resources/sass/reset.scss", "public/css", [])
    .options({
        postCss: [tailwindcss("./tailwind.config.js"), require("autoprefixer")],
    })
    .version();

mix.browserSync({
    proxy: "laravel.test",
    port: process.env.MIX_PORT,
    open: false,
});
