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

Route::get('/autors', function () {
    return view('crudAutores');
});

Route::resource('autores', 'AutoresController',['except' =>'show', 'create', 'edit']);


//Adeudos
Route::resource('adeudos', 'AdeudoController', ['except' => 'create', 'edit', 'show']);
;


Route::get('/', function(){
    return view('Carreras.carreras');
});

Route::resource('carreras', 'CarreraController', ['except' => 'create', 'edit', 'show']);
