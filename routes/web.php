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


//Adeudos
Route::resource('adeudos', 'AdeudoController', ['except' => 'create', 'edit', 'show']);

//Carreras
Route::resource('carreras', 'CarreraController', ['except' => 'create', 'edit', 'show']);

Route::get('/carrera', function(){
    return view('Carreras.carreras');
});

//Autores
Route::get('/autores', function () {
    return view('autores.index');
});

Route::resource('autors', 'AutoresController',['except' =>'show', 'create', 'edit']);
