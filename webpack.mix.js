const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.cdn_select_2
 |
 */

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/select2.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .css("resources/css/app.css", "public/css")
    .css("resources/css/select2.css", "public/css")
    .css("resources/css/cdn_select_2.css", "public/css")
    .sourceMaps();
