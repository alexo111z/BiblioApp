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

//Adeudos
Route::resource('adeudo', 'AdeudoController', ['except' => 'create', 'edit', 'show']);

Route::get('/adeudos', function (){
    return view('Adeudos.principal');
});

//Carreras
Route::resource('carreras', 'CarreraController', ['except' => 'create', 'edit', 'show']);

Route::get('/carrera', function(){
    return view('Carreras.carreras');
});

//Materiales
Route::resource('material', 'MaterialesController', ['except' =>'show','create', 'edit']);

Route::get('/materiales', function (){
    return view('Materiales.principal');
});

Route::get('material/carreras','MaterialesController@getCarreras')->name('getCarreras');

Route::get('materiales', 'MaterialesController@cla')->name('clavesCarreras');

//Libros
Route::resource('libro', 'LibrosController', ['except' =>'show','create', 'edit']);

Route::get('/libros', function (){
    return view('Libros.principal');
});

Route::get('libros', 'LibrosController@selects')->name('varios');

//Usuarios
Route::get('/usuarios', 'UsersController@index')->name('usuarios');

Route::post('/usuarios/all', 'UsersController@getAll');

Route::post('/usuarios', 'UsersController@create');

Route::post('/usuarios/update', 'UsersController@update');

Route::post('/usuarios/remove', 'UsersController@delete');
