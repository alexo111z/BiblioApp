<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user/all', 'Dashboard\UsersController@index');
Route::get('user/{user}', 'Dashboard\UsersController@show');
Route::post('user', 'Dashboard\UsersController@store');
Route::put('user/{id}', 'Dashboard\UsersController@update');
Route::delete('user/{id}', 'Dashboard\UsersController@delete');
