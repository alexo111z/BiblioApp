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

mix.scripts(['resources/js/Jquery.js',
'resources/js/Bootstrap.js',
'resources/js/Toastr.js',
'resources/js/vue.js',
                'resources/js/axios.js',
                'resources/js/prestamos/app.js',
            ], 'public/js/prestamos/app.js')
            .styles([
                'resources/css/Bootstrap.css',
                'resources/css/Toastr.css',                
            ],'public/css/app.css');
