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
//Ruta default
Route::get('/', function () {
    return view('welcome');
});
//Autores
Route::get('/autores', function () {
    return view('autores.index');
});
Route::resource('autors', 'AutoresController',['except' =>'show', 'create', 'edit']);
//Editoriales
Route::get('/editoriales', function () {
    return view('editoriales.index');
});
Route::resource('editorials', 'EditorialesController',['except' =>'show', 'create', 'edit']);
//DEWEY
Route::get('/dewey', function () {
    return view('dewey.index');
});
Route::resource('cdewey', 'DeweyController',['except' =>'create', 'edit', 'store', 'update', 'destroy']);
//Reportes
Route::get('/reportes',function (){
    return view('reportes.reportes');
});
Route::resource('reporte', 'ReportesController',['except' =>'show', 'create', 'edit']);
