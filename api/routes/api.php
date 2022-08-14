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

Route::get('/generators/list', 'App\Http\Controllers\API\GeneratorController@list');
Route::get('/generators/show/{id}', 'App\Http\Controllers\API\GeneratorController@details');
Route::get('/generators/generate/{id}', 'App\Http\Controllers\API\GeneratorController@generate');
Route::post('/generators/create', 'App\Http\Controllers\API\GeneratorController@create');

Route::post('/user/auth', 'App\Http\Controllers\API\UserController@auth');
