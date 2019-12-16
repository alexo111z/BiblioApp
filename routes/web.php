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

Route::get('/autores/all', 'AutoresController@all');

Route::resource('autors', 'AutoresController',['except' =>'show', 'create', 'edit']);

//Editoriales
Route::get('/editoriales', function () {
    return view('editoriales.index');
});

Route::get('/editoriales/all', 'EditorialesController@all');

Route::resource('editorials', 'EditorialesController',['except' =>'show', 'create', 'edit']);

//DEWEY
Route::get('/dewey', function () {
    return view('dewey.index');
});
Route::get('cdewey/select/{id}', 'DeweyController@obtenerTopico')->name('obtenerTopico');
Route::resource('cdewey', 'DeweyController',['except' =>'create', 'edit', 'store', 'update', 'destroy']);

//Reportes
Route::get('/reportes',function (){
    return view('reportes.reportes');
});
Route::resource('reporte', 'ReportesController',['except' =>'show', 'create', 'edit']);
Route::get('reporte/carreras', 'ReportesController@getCarreras')->name('getCarreras');
Route::post('reporte/consultaprestamos','ReportesController@getReportes')->name('getReportes');
Route::post('reporte/consultaRegistrados', 'ReportesController@getRegistros')->name('getRegistros');
Route::get('reportes/imprimirreporte','ReportesController@imprimirReporte')->name('printreporte');
Route::get('reportes/imprimirreporteRegistros','ReportesController@imprimirReporteRegistros')->name('printreporteRegistros');
Route::get('reporte/consultaCatalogo', 'ReportesController@getCatalogo')->name('getCatalogo');
Route::get('reportes/imprimirreporteCatalogo','ReportesController@imprimirCatalogo')->name('printCatalogo');
Route::post('reporte/consultaPrestatarios', 'ReportesController@getAdministrativos')->name('getAdministrativos');
Route::get('reportes/imprimirreportePrestatarios', 'ReportesController@imprimirPrestatarios')->name('printPrestatarios');
Route::post('reporte/consultaMultas', 'reportesController@getMultas')->name('getMultas');
Route::get('reportes/imprimirMultas', 'ReportesController@imprimirMultas')->name('printMultas');
//Libros
Route::resource('libros','LibrosController');
//Adeudos
Route::resource('adeudo', 'AdeudoController', ['except' => 'create', 'edit','destroy']);
Route::post('adeudo/{adeudo}/{monto}', 'AdeudoController@delete');
Route::get('adeudo/det/{folio}', 'AdeudoController@show');

Route::get('/adeudos', function (){
    return view('Adeudos.principal');
});

//Carreras
Route::resource('carrera', 'CarreraController', ['except' => 'create', 'edit', 'show']);
Route::get('/carreras', function(){
    return view('Carreras.carreras');
});

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

Route::get('/libros/imprimir/{isbn}', 'PrintBookBarcodeController@index');

Route::get('/libros/descargar/{isbn}', 'PrintBookBarcodeController@downloadPdf');

Route::get('libros', 'LibrosController@selects')->name('varios');

//Materiales
Route::resource('material', 'MaterialesController', ['except' =>'show','create', 'edit']);
Route::get('/materiales', function (){
    return view('Materiales.principal');
});
Route::get('material/carreras','MaterialesController@getCarreras')->name('getCarreras');

Route::get('materiales', 'MaterialesController@cla')->name('clavesCarreras');

//Usuarios
Route::get('/usuarios', 'UsersController@index')->name('usuarios');

Route::get('/prestatarios', 'UsersController@indexPrestatarios')->name('prestatarios');

Route::post('/usuarios/all', 'UsersController@getAll');

Route::post('/usuarios', 'UsersController@create');

Route::post('/usuarios/update', 'UsersController@update');

Route::post('/usuarios/remove', 'UsersController@delete');
