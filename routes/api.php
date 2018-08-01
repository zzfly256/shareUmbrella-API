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
    Route::get('/user/{id}', 'apiController@getUser');
    Route::post('/user/{id}/edit', 'apiController@updateUser');

    Route::get('/item', 'apiController@listItem');
    Route::post('/item', 'apiController@createItem');
    Route::get('/item/{id}', 'apiController@getItem');
    Route::delete('/item/{id}', 'apiController@destroyItem');
    Route::post('/item/{id}/edit', 'apiController@updateItem');
});