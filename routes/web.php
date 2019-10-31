<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/autores', function () {
    return view('autores.index');
});
Route::get('/editoriales', function () {
    return view('editoriales.index');
});

Route::resource('autors', 'AutoresController',['except' =>'show', 'create', 'edit']);
Route::resource('editorials', 'EditorialesController',['except' =>'show', 'create', 'edit']);
