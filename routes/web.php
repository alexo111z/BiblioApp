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

Route::get('/carreras', 'CarreraController@show')->name('carrera.show');

Route::get('/carreras/agregar', 'CarreraController@formAdd')->name('carrera.nueva');
Route::post('/carreras/add', 'CarreraController@add')->name('carrera.add');

Route::get('/carreras/{carrera}/edit', 'CarreraController@formEdit')->name('carrera.formEdit');
Route::put('/carreras/{carrera}', 'CarreraController@update')->name('carrera.edit');

Route::delete('/carreras/{carrera}','CarreraController@softDelete')->name('carrera.eliminar');
