const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js(['resources/js/app.js', 'node_modules/jquery/dist/jquery.js'], 'public/js/app.js').version()
    .js('resources/js/register.js', 'public/js').version();
mix.sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/pictures.scss', 'public/css')
    .sass('resources/sass/blog.scss', 'public/css')
    .sass('resources/sass/register.scss', 'public/css')
    .sass('resources/sass/trial.scss', 'public/css');