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

//Reportes
Route::get('/reportes',function (){
    return view('reportes.reportes');
});
Route::resource('reporte', 'ReportesController',['except' =>'show', 'create', 'edit']);
