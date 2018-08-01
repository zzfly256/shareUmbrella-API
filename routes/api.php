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
    Route::get('/user/{id}', 'apiController@getUser')->where('id', '[0-9]+');
    Route::post('/user/{id}', 'apiController@updateUser')->where('id', '[0-9]+');
    Route::get('/user/{id}/items', 'apiController@getUserItems')->where('id', '[0-9]+');

    Route::get('/item', 'apiController@listItem');
    Route::post('/item', 'apiController@createItem');
    Route::get('/item/{id}', 'apiController@getItem')->where('id', '[0-9]+');
    Route::delete('/item/{id}', 'apiController@destroyItem')->where('id', '[0-9]+');
    Route::post('/item/{id}', 'apiController@updateItem')->where('id', '[0-9]+');
    Route::get('/item/search/{target}', 'apiController@searchItem');

    Route::get('/area','apiController@listArea');
    Route::get('/area/{id}','apiController@getArea')->where('id', '[0-9]+');
    Route::get('/area/{id}/items','apiController@getAreaItems')->where('id', '[0-9]+');
});