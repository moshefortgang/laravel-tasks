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


Route::get('tasks', 'App\Http\Controllers\ApiController@getAllTasks');
Route::get('tasks/{id}', 'App\Http\Controllers\ApiController@getTask');
Route::post('tasks', 'App\Http\Controllers\ApiController@createTask');
Route::patch('tasks/{id}', 'App\Http\Controllers\ApiController@updateTask');
Route::delete('tasks/{id}','App\Http\Controllers\ApiController@deleteTask');