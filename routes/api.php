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
Route::group(['namespace' => 'Api'], function() {
    Route::get('/user/login', 'apiController@login');
    Route::get('/user/loginCallback', 'apiController@loginCallback');
    Route::get('/user/{id}', 'apiController@getInfo');
    Route::get('/user/{id}/edit', 'apiController@editInfo');
    Route::patch('/user/{id}/edit', 'apiController@updateInfo');
});