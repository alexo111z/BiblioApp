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

Route::Resource('prestamos','PrestamosController');

Route::post('prestamos', 'PrestamosController@buscarprestamos')->name('buscarprestamos');
Route::get('prestamos/detalles/{folio}/{nombre}/{vigente}', 'PrestamosController@detalles')->name('detalles');
//Route::get('/prestamos/detalles/{id}', 'PrestamosController@detalles')->name('detalles');

