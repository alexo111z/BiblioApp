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

//Prestamos
Route::get('/prestamos', function () {
    return view('prestamos/index');
});
Route::get('/prestamos/filter', function () {
    return view('prestamos/filter');
});
//Route::Resource('prestamos','PrestamosController');
Route::post('prestamos/nuevoprestamo/', 'PrestamosController@nuevoprestamo')->name('nuevoprestamo');
Route::post('prestamos', 'PrestamosController@buscarprestamos')->name('buscarprestamos');
Route::get('prestamos/detalles/{folio}/{nombre}/{vigente}', 'PrestamosController@detalles')->name('detalles');

Route::Resource('tasks','PrestamosController');
Route::get('prestamos/array/', 'PrestamosController@array')->name('array');
Route::get('prestamos/getdetails/{folio}', 'PrestamosController@getdetails')->name('getdetails');
Route::get('prestamos/getlistbooks/{codigolibro}', 'PrestamosController@getlistbooks')->name('getlistbooks');
Route::get('prestamos/getlistcontrol/{codigolibro}', 'PrestamosController@getlistcontrol')->name('getlistcontrol');
Route::get('prestamos/getselectedbook/{codigolibro}', 'PrestamosController@getselectedbook')->name('getselectedbook');
Route::get('prestamos/getselectedbook/', 'PrestamosController@getselectedbook1')->name('getselectedbook1');
Route::get('prestamos/endprestamo/{folio}', 'PrestamosController@endprestamo')->name('endprestamo');
//Route::get('/prestamos/detalles/{id}', 'PrestamosController@detalles')->name('detalles');

