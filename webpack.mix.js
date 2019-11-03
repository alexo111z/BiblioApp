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
//General
mix.styles([
    'resources/css/bootstrap.css',
    'resources/css/toastr.css',
    ], 'public/css/app.css');
//reportes
mix.scripts([
    'resources/js/jquery.js',
    'resources/js/bootstrap.js',
    'resources/js/toastr.js',
    'resources/js/vue.js',
    'resources/js/axios.js',
    'resources/js/reportes/app.js'], 'public/js/reportes/app.js')

