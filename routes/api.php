<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/getallitems', 'App\Http\Controllers\ItemsController@index');
Route::post('/searchitem', 'App\Http\Controllers\ItemsController@search');
Route::get('/item/{code}', 'App\Http\Controllers\ItemsController@show');
Route::post('/item', 'App\Http\Controllers\ItemsController@store');
Route::put('/item/{code}', 'App\Http\Controllers\ItemsController@update');
Route::delete('/item/{code}', 'App\Http\Controllers\ItemsController@destroy');