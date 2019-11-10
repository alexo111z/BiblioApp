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

Route::get('/prestamos', function () {
    return view('prestamos/index');
});

Route::get('/prestamos/filter', function () {
    return view('prestamos/filter');
});


//Route::Resource('prestamos','PrestamosController');

Route::post('prestamos', 'PrestamosController@buscarprestamos')->name('buscarprestamos');
Route::get('prestamos/detalles/{folio}/{nombre}/{vigente}', 'PrestamosController@detalles')->name('detalles');

Route::Resource('tasks','TaskController');
Route::get('prestamos/array/', 'TaskController@array')->name('array');
Route::get('prestamos/getdetails/{folio}', 'TaskController@getdetails')->name('getdetails');
Route::get('prestamos/getlistbooks/{codigolibro}', 'TaskController@getlistbooks')->name('getlistbooks');
Route::get('prestamos/getselectedbook/{codigolibro}', 'TaskController@getselectedbook')->name('getselectedbook');


//Route::get('/prestamos/detalles/{id}', 'PrestamosController@detalles')->name('detalles');

