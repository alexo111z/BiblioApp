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
//Css general
mix.styles([
    'resources/css/bootstrap.css',
    'resources/css/toastr.css'], 'public/css/app.css');
//editoriales
mix.scripts([
    'resources/js/jquery.js',
    'resources/js/bootstrap.js',
    'resources/js/toastr.js',
    'resources/js/vue.js',
    'resources/js/axios.js',
    'resources/js/login/middleware.js',
    'resources/js/editoriales/app.js'], 'public/js/editoriales/app.js');
//autores
mix.scripts([
    'resources/js/jquery.js',
    'resources/js/bootstrap.js',
    'resources/js/toastr.js',
    'resources/js/vue.js',
    'resources/js/axios.js',
    'resources/js/login/middleware.js',
    'resources/js/autores/app.js'], 'public/js/autores/app.js');
//Dewey
mix.scripts([
    'resources/js/jquery.js',
    'resources/js/bootstrap.js',
    'resources/js/toastr.js',
    'resources/js/vue.js',
    'resources/js/axios.js',
    'resources/js/login/middleware.js',
    'resources/js/dewey/app.js'], 'public/js/dewey/app.js');
//Reportes
mix.scripts([
    'resources/js/jquery.js',
    'resources/js/bootstrap.js',
    'resources/js/toastr.js',
    'resources/js/vue.js',
    'resources/js/axios.js',
    'resources/js/login/middleware.js',
    'resources/js/reportes/app.js'], 'public/js/reportes/app.js');
//Carreras
mix.scripts([
    'resources/js/jquery.js',
    'resources/js/bootstrap.js',
    'resources/js/toastr.js',
    'resources/js/vue.js',
    'resources/js/axios.js',
    'resources/js/login/middleware.js',
    'resources/js/carreras/carrera.js'], 'public/js/appCarrera.js');
//Adeudos
mix.scripts([
    'resources/js/jquery.js',
    'resources/js/bootstrap.js',
    'resources/js/toastr.js',
    'resources/js/vue.js',
    'resources/js/axios.js',
    'resources/js/login/middleware.js',
    'resources/js/adeudos/adeudos.js'], 'public/js/appAdeudos.js');
//Materiales
mix.scripts([
    'resources/js/jquery.js',
    'resources/js/bootstrap.js',
    'resources/js/toastr.js',
    'resources/js/vue.js',
    'resources/js/axios.js',
    'resources/js/login/middleware.js',
    'resources/js/materiales/materiales.js'],
    'public/js/appMateriales.js') ;
//Libros
mix.scripts([
    'resources/js/jquery.js',
    'resources/js/bootstrap.js',
    'resources/js/toastr.js',
    'resources/js/vue.js',
    'resources/js/axios.js',
    'resources/js/login/middleware.js',
    'resources/js/libros/Libros.js'],
    'public/js/appLibros.js') ;

// Login
mix.scripts(
    [
        'resources/js/jquery.js',
        'resources/js/bootstrap.js',
        'resources/js/toastr.js',
        'resources/js/vue.js',
        'resources/js/axios.js',
        'resources/js/login/middleware.js',
        'resources/js/login/app.js',
    ],
    'public/js/login/app.js'
);

// Logout
mix.scripts(
    [
        'resources/js/login/logout.js',
    ],
    'public/js/login/logout.js'
);

//Usuarios
mix.scripts(
    [
        'resources/js/jquery.js',
        'resources/js/bootstrap.js',
        'resources/js/toastr.js',
        'resources/js/vue.js',
        'resources/js/axios.js',
        'resources/js/lodash.js',
        'resources/js/login/middleware.js',
        'resources/js/usuarios/app.js'
    ],
    'public/js/usuarios/app.js'
);

//Prestatarios
mix.scripts(
    [
        'resources/js/jquery.js',
        'resources/js/bootstrap.js',
        'resources/js/toastr.js',
        'resources/js/vue.js',
        'resources/js/axios.js',
        'resources/js/lodash.js',
        'resources/js/login/middleware.js',
        'resources/js/prestatarios/app.js'
    ],
    'public/js/prestatarios/app.js'
);

//
mix.scripts(
    [
        'resources/js/jquery.js',
        'resources/js/bootstrap.js',
        'resources/js/toastr.js',
        'resources/js/vue.js',
    ],
    'public/js/dashboard/app.js'
);
