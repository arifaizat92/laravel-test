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

Route::get('q1', 'TestController@q1');
Route::get('q2', 'TestController@q2');
Route::get('q3', 'TestController@q3');
Route::get('q4', 'TestController@q4');
Route::get('q5', 'TestController@q5');

