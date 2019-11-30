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
    return redirect('login');
});
Route::get('/login', 'Auth\\LoginController@index')->name('login');
Route::get('/home', 'DashboardController@index')->name('home');
Route::post('/login', 'Auth\\LoginController@logIn');
//Usuarios
Route::get('/usuarios', 'UsersController@index')->name('usuarios');
Route::get('/prestatarios', 'UsersController@indexPrestatarios')->name('prestatarios');
Route::post('/usuarios/all', 'UsersController@getAll');
Route::post('/usuarios', 'UsersController@create');
Route::post('/usuarios/update', 'UsersController@update');
Route::post('/usuarios/remove', 'UsersController@delete');
