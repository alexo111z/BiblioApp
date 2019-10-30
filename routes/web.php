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

Route::get('/carreras', 'pCarreraController@show')->name('carrera.show');

Route::get('/carreras/agregar', 'pCarreraController@formAdd')->name('carrera.nueva');
Route::post('/carreras/add', 'pCarreraController@add')->name('carrera.add');

Route::get('/carreras/{carrera}/edit', 'pCarreraController@formEdit')->name('carrera.formEdit');
Route::put('/carreras/{carrera}', 'pCarreraController@update')->name('carrera.edit');

Route::delete('/carreras/{carrera}','pCarreraController@softDelete')->name('carrera.eliminar');

Route::get('/', function(){
    return view('Carreras.carreras');
});
