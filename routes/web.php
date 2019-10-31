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
Route::get('/reportes','ReportesController@show');

Route::resource('reporte', 'ReportesController',['except' =>'show']);

Route::resource('autores', 'AutoresController',['except' =>'show', 'create', 'edit']);
