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

Route::get('create', 'UserController@create');

Route::get('produc/list','UserController@listProduct');
Route::get('produc/list/{id}','UserController@getById');
Route::post('product/add','UserController@add');
Route::delete('product/{id}','UserController@delete');
Route::put('product/update/{id}','UserController@update');